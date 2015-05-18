<?php
date_default_timezone_set('Asia/Chongqing');
ini_set('memory_limit', '500M');
function convert($size) {
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}
if(isset($argv[2]) ){
   $handle = popen("tail -{$argv[2]}f {$argv[1]}", "r");
}else{
	$handle = @fopen($argv[1], "r");
}
if (!$handle)  die('不能打开日志文件'); 

///////开始
$frist = true;
$redis = new Redis();
$redis->connect ( 'localhost', 6379, 2.5 ) or die ( "redis 连接失败\r\n" ); // 先把redis脸连上
//获取前缀后缀
function getPrefix($var,$mode=1) {
	if($mode ==1) return strstr($var,'_',true);
	else return substr(strstr($var,'_'),1);
}
//定义IP
function defineIP($ip,$dayTime,$mode='min') {
   global $IPCache;
   $allowMode = array('day' => 86400,
   'hour'=>3600,
   'min' =>60);
   $dayTime = str_replace( "/",":",$dayTime);
   $key=intval(strtotime(getPrefix($dayTime,2))/$allowMode[$mode]);
   if (isset($IPCache[$key][$ip])) return 0;
   $IPCache[$key][$ip] = 1;
   return 1;
}
//清楚IP判定缓存
function clearIP($dayTime,$mode='min') {
	global $IPCache;
	$dayTime = str_replace( "/",":",$dayTime);
	$allowMode = array(
		'day' => intval(strtotime(getPrefix($dayTime,2))/86400),
		'hour'=>intval(strtotime(getPrefix($dayTime,2))/3600),
		'min' =>intval(strtotime(getPrefix($dayTime,2))/60));
	unset($IPCache[$allowMode[$mode]-1]);
}
//定义UV
function defineUV($uid,$new,$ip,$dayTime) {
  global $UVCache,$debug,$IPCache;
  $day=intval(strtotime(getPrefix($dayTime,2))/86400);
  if (isset($UVCache[$day][$uid])) {
        if ($new == 1) $UVCache[$day][$uid] = 2;  //这是新访客
        return 0;
  }
  if (isset($UVCache[$day-1]) && (isset($UVCache[$day-1][$uid]))) {
		//检查昨天的
		return 0;
	}
  //TODO check from Redis 
  if($new == 1) $UVCache[$day][$uid] = 2; //这是新访客
  else $UVCache[$day][$uid] = 1;
  return 1;
}
//定义新访客
function defineNewUv($uid,$ip,$dayTime) {
  global $UVCache,$IPCache;
  $day=intval(strtotime(getPrefix($dayTime,2))/86400);
  if (isset($UVCache[$day][$uid]) && $UVCache[$day][$uid] == 2  ) {
        $UVCache[$day][$uid] = 1;
        return 1;
  }
  return 0;
  
}
function clearUVCache($dayTime) {
	global $UVCache;
	$day=intval(strtotime(getPrefix($dayTime,2))/86400);
	unset($UVCache[$day-2]);
}
//缓存每个Session的存活时间
function defineTimeOnSite($SessionId,$timeOnLog,$lang='all',$domain) {
	global $timeOnSiteC,$timeOnSite;
	if (!isset($timeOnSiteC[$domain][$lang][$SessionId])) {
		$timeOnSiteC[$domain][$lang][$SessionId] = $timeOnLog;
	}else{
		$timeOnSite[$domain][$lang][$SessionId] = $timeOnLog - $timeOnSiteC[$domain][$lang][$SessionId];
	}
}
//清楚Session On Site信息缓存
function clearTimeOnSite() {
	global $timeOnSiteC;
	$timeOnSiteC=array();
}
//计算平均On Site时间
function calTimeOnSite($key,&$result) {
	global $timeOnSite;
	$times=$allTime=array();   
	foreach ($timeOnSite as $domain => $items) {
		foreach ($items as $lang => $perSession) {
			foreach ($perSession as $val ) {
				if ( isset($times[$domain][$lang])) $times[$domain][$lang]++;
				else $times[$domain][$lang] = 1;
				if ( isset($allTime[$domain][$lang])) $allTime[$domain][$lang]+= $val;
				else $allTime[$domain][$lang] = $val;
				$result[$domain][$lang][getPrefix($key)][getPrefix($key,2)]['total']['timeOnSite'] = round($allTime[$domain][$lang]/$times[$domain][$lang]);
			}
		}
		
	}
}
//线上Session 缓存时间(当前在线)
function onlineSession($sessionId,$time,$lang='all',$domain) {
	global $sessionOnline;
	$sessionOnline[$domain][$lang][$sessionId]=$time;
	
}
//线上session 清除垃圾(当前在线)
function gcOnlineSession($gcTime) {
	global  $sessionOnline;
	foreach ( $sessionOnline as $domain => $items ) {
		foreach ( $items as $keyz => $valz ) {
			foreach ( $valz as $key => $val){
				if ($gcTime > $val) unset($sessionOnline[$domain][$keyz][$key]);
			}
		}
		
	}
}

//获得线上Session数量(当期在线）
function onlineSessionCount($key,&$result) {
  global  $sessionOnline;
  foreach ( $sessionOnline as $domain => $items ) {
	  foreach ( $items as $lang => $val ) {
		$result[$domain][$lang][getPrefix($key)][getPrefix($key,2)]['total']['onlineSession'] = count( array_keys( $val ) );
	  }
	  
  }
}
//检查一致性LOG完全一致的丢弃
function checkDupliateLog($buffer,$now) {
  global $dupliateLog;
  $bufferKey=md5($buffer);
  if ( isset($dupliateLog[$bufferKey])) return true;
  $dupliateLog[$bufferKey]=$now;
  return false;
}
function clearDumpliateLog($now) {
  global $dupliateLog;
  foreach ($dupliateLog as $key => $val) {
          if ($val < ($now - 120)) unset($dupliateLog[$key]); //2分钟之前的清除
  } 
}
//计算referer相关信息
function getRefererHost($refererInfo) {
  if (strlen($refererInfo) < 1) return "direct";
  $hostInfo=parse_url($refererInfo);
  if ( isset($hostInfo['host'])) {
  		//if(substr($hostInfo['host'],0,11)=='www.google.
  		return $hostInfo['host'];
  }
  return "direct";
}
//屏幕宽高
function screenwh($sw,$sh) {
  if ( $sw < 100 || $sh < 100 ) return 'other';
  return "{$sw}x{$sh}";
}
function defineRefererKeywords($refererInfo) {
}

function getCommand() {
	$fileName='/var/run/phpFx'.$GLOBALS['myPid'].'.pid';
	if(file_exists($fileName))
			$command=file_get_contents($fileName);
	file_put_contents('/tmp/phpFxDebug',print_r($GLOBALS,true));
	unlink($fileName);
}
//返回浏览器
function browerVer($brInfo) {
        if( preg_match('/msie ([\d.]+)/i',$brInfo,$return) ) { $return[1]= strstr($return[1],'.',true); return "IE ".$return[1]; }
        if( preg_match('/firefox\/([\d.]+)/i',$brInfo,$return) ) { $return[1]= strstr($return[1],'.',true); return "Firefox ".$return[1]; }
        if( preg_match('/chrome\/([\d.]+)/i',$brInfo,$return) ) { $return[1]= strstr($return[1],'.',true);return "Chrome ".$return[1]; }
        if( preg_match('/opera.([\d.]+)/i',$brInfo,$return) ) { $return[1]= strstr($return[1],'.',true);return "Opera ".$return[1]; }
        if( preg_match('/version\/([\d.]+).*safari/i',$brInfo,$return) ) { $return[1]= strstr($return[1],'.',true);return "Safari ".$return[1]; }
        return 'other';
}
/*
Array
(
    [0] => 178.121.82.174                   //客户IP
    [1] => ru-ru                            //访问语言
    [2] => 2217FE771792CF4EBE5F266B02950D03 //用户唯一UID Cookie保存365天
    [3] => 26/Nov/2011:15:55:07 +0800      //LOG时间
    [4] => http://www.milanoo.com/ru/c628/11.html             //调用URL milanoo.fr   
    [5] => ref=http%3A%2F%2Fwww.milanoo.com%2Fru%2Fc628%2F10.html&sw=1920&sh=1080 //前端传递数据
    [6] => ru    // 浏览器语言
    [7] => Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.121 Safari/535.2 //浏览器类型
    [8] => BY //用户IP所在国
    [9] => d/4XIk7Qm1WAYXZzAwttAg==  //SessionId
    [10] => 0    //是否是新用户
	[11] => en20120629
    [12] => http://www.milanoo.com/Womens-Clothing-c535?Promotion=en20120629&utm_source=emarsys
    [13] => 1280x1024
    [14] => c1324#1
    [15] => list
    [16] => /en/c1-2750/c2-535/c3-1324#1
	[17] => 1 	//站点id，手机站是111
	[18] => jp //国家 写入和展示时候国家和语言一对一，暂时不考虑国家选择。IP.PV（暂时不参加计算，域名的选取标准还是第二个参数）（暂时取消）
) 
*/
$GLOBALS['myPid']=getmyuid();
$acceptLangCookie = array ( 'en-uk' => 'EN', 'ja-jp' => 'JP', 'fr-fr' => 'FR', 'es-sp' => 'ES', 'de-ge' => 'DE', 'it-it' => 'IT', 'ru-ru' => 'RU','pt-pt'=>'PT','ar-ar'=>'AR');
$domainInWebsiteId = array ( '1'=> 'milanoo', '2' => 'dressinwedding', '3' => 'lolitashow', '4' => 'cosplay', '5'=> 'costumeslive', '111' => 'wap','7'=> 'milanoo.fr');
global $_result;
$baseData=array();
while (!feof($handle)) {
	$buffer = fgets($handle);
	$buffer=str_replace("\n",'',$buffer);
	$baseData = explode(" ^-^ ",$buffer);
	//echo '<pre>';print_r($baseData);	die;
	$baseData[17]=isset($baseData['17'])?$baseData['17']:'1';	
	$baseData[17]=$domainInWebsiteId[$baseData[17]];//站点	
	$notCal = false;
	$baseData[3] = strtotime($baseData[3]);

	$baseData[1] = isset ( $acceptLangCookie[$baseData[1]] )?$acceptLangCookie[$baseData[1]]:'EN';
	//$baseData[1] = $acceptLangCookie[$baseData[1]] ;
	//$baseData[18] = isset ( $acceptLangCookie[$baseData[1]] ) ?   strtolower($acceptLangCookie[$baseData[1]]):'en';
	if ( checkDupliateLog($baseData[0].'||'.$baseData[4].'||'.$baseData[5],$baseData[3]) ) $notCal = true; //对1分钟内完全一样的log请求，丢弃不统计
	if ( checkDupliateLog($baseData[0].'||'.$baseData[3],$baseData[3]) ) $notCal = true; //对1秒钟一个IP完成2次请求，第二次不计算
	$baseData[10] = isset($baseData[10]) ? $baseData[10] : 0;
	$_c['dateKey'] = 'day_'.date("Y-m-d", mktime(0,0,0,date("m",$baseData[3]),date("d",$baseData[3]),date("Y",$baseData[3])));
	$_c['hourKey'] = 'hour_'.date("Y-m-d H", mktime(date("H",$baseData[3]),0,0,date("m",$baseData[3]),date("d",$baseData[3]),date("Y",$baseData[3])));
	$_c['minKey'] = 'minutes_'.date("Y-m-d H/i", mktime(date("H",$baseData[3]),date("i",$baseData[3]),0,date("m",$baseData[3]),date("d",$baseData[3]),date("Y",$baseData[3])));
	 // echo '<pre>';print_r($_c);die;
	$nowDay=mktime(0,0,0,date("m"),date("d"),date("Y"));
	if ($frist) {
		$frist = false;
		$_c['dateKeyO'] = $_c['dateKey'] ;
		$_c['hourKeyO'] = $_c['hourKey'] ;
		$_c['minKeyO'] = $_c['minKey'] ;
	}
	/* if ( $_c['hourKeyO'] !=  $_c['hourKey'] ) {
		//更新前一个小时的 timtOnSite
		calTimeOnSite($_c['hourKeyO'],$_result);
	} */
	if ( $_c['minKeyO'] !=  $_c['minKey'] ) {
		//minutes cange
		//clearn dupliate log cache
		clearDumpliateLog( $baseData[3]);
		//onlineSessionCount($_c['minKeyO'],$_result);
		//if ( $nowDay < $baseData[3] ) { //分析到了今天的数据
		saveInRedis($_result,getPrefix($_c['minKeyO'],2), 5);
		saveInRedis($_result,getPrefix($_c['hourKeyO'],2),5);
		//      }
		clearIP($_c['minKeyO'],'min');
		$_c['minKeyO'] =  $_c['minKey'] ;
		//gcOnlineSession($baseData[3]-15*60);
	}
	if ( $_c['hourKeyO'] !=  $_c['hourKey'] ) {
		//hour change
		echo "Hour Change==========".strstr($_c['hourKey'],'_')."==================\r\n";
		//if ( $nowDay < $baseData[3] ) {
		saveInRedis($_result,getPrefix($_c['dateKeyO'],2),5); //每小时刷新一次当天数据
		//}
		$_c['hourKeyO'] =  $_c['hourKey'] ;        
		echo convert(memory_get_usage())."\r\n";
	}
	if ( $_c['dateKeyO'] !=  $_c['dateKey'] ) {
		//day change || clear IP Cache || save visterUid
		echo "Day Change =============".strstr($_c['dateKey'],'_')."==============\r\n";
		//saveInRedis($_result,substr(strstr($_c['dateKeyO'],'_'),1),3);
		clearUVCache($_c['dateKeyO']);//清楚两天前的uv记录
		$_c['dateKeyO'] =  $_c['dateKey'] ;
		clearGlobal();//清除所有记录
		file_put_contents('/tmp/phpFxDebug',print_r($GLOBALS,true));
	}
	if(!isset($baseData[9]))$baseData[9]='';
	if(!isset($baseData[8]))$baseData[8]='';
	if(!isset($baseData[7]))$baseData[7]='';
	if(!isset($baseData[6]))$baseData[6]='';
	if(!isset($baseData[5]))$baseData[5]='';
	if(!isset($baseData[4]))$baseData[4]='';
	if(!isset($baseData[3]))$baseData[3]='';
	if(!isset($baseData[2]))$baseData[2]='';
	if(!isset($baseData[1]))$baseData[1]='';
	/* //计算Time On Site
	defineTimeOnSite(trim($baseData[9]),$baseData[3],$baseData[1],$baseData[17]);
	defineTimeOnSite(trim($baseData[9]),$baseData[3],'all',$baseData[17]); 
	//计算
	onlineSession(trim($baseData[9]),$baseData[3],'all',$baseData[17]);
	onlineSession(trim($baseData[9]),$baseData[3],$baseData[1],$baseData[17]);*/
	//计算来路（计算一天的需要汇总) 15分钟可以列表
	//TODO
	//计算停留页面 （计算一天的需要汇总/考虑使用PageName汇总) 15分钟可列表
	//TODO
	//搜索引擎每日汇总
	//搜索关键字每日汇总/没小时汇总
	//referer域名汇总
	parse_str ( $baseData[5], $pageData );
	$refererInfo = !empty($pageData['ref'])?$pageData['ref']:'';
	$UV =  defineUV ( $baseData[2], $baseData[10], $baseData[0] ,$_c['dateKey']);
	//
	$IP =  array(
		'dateKey'=>defineIP ( $baseData[0] , $_c['minKey'],'day'),
		'hourKey'=>defineIP ( $baseData[0] , $_c['minKey'],'hour'),
		'minKey'=>defineIP ( $baseData[0] , $_c['minKey'],'min')
	);
	$newUV =  defineNewUV ( $baseData[2], $baseData[0],$_c['dateKey']);
	if ( $notCal ) { $UV=0; $IP=0; $newUV = 0; }   //不计算UV IP 因为访问在2分钟内完全一致
	if(!isset($pageData['sh']))$pageData['sh']='';
	if(!isset($pageData['sw']))$pageData['sw']='';
	
	
	//所有站点下各个语言站数据
	saveResult ( $_result['ALL']['all'], 'total' ) ;  //记录IP UV 信息
	/* saveResult ( $_result['ALL']['all'], 'referer:'. getRefererHost( $refererInfo ), array('dateKey') );  //统计referer来源国家，天为最小单位
	saveResult ( $_result['ALL']['all'], 'screen:'. screenwh ( $pageData['sw'], $pageData['sh'] ), array('dateKey') ); //统计屏幕大小，天为最小单位
	saveResult ( $_result['ALL']['all'], 'brower:'. browerVer ( $baseData[7] ), array('dateKey') );  //统计浏览器类型
	saveResult ( $_result['ALL']['all'], 'lang:'. $baseData[8], array('dateKey') );                //记录IP国家，天为最小单位 */
	//所有站点下各个语言站数据
	saveResult ( $_result['ALL'][$baseData[1]], 'total' ) ;  //记录IP UV 信息
	/* saveResult ( $_result['ALL'][$baseData[1]], 'referer:'. getRefererHost( $refererInfo ), array('dateKey') );  //统计referer来源国家，天为最小单位
	saveResult ( $_result['ALL'][$baseData[1]], 'screen:'. screenwh ( $pageData['sw'], $pageData['sh'] ), array('dateKey') ); //统计屏幕大小，天为最小单位
	saveResult ( $_result['ALL'][$baseData[1]], 'brower:'. browerVer ( $baseData[7] ), array('dateKey') );  //统计浏览器类型
	saveResult ( $_result['ALL'][$baseData[1]], 'lang:'. $baseData[8], array('dateKey') );                //记录IP国家，天为最小单位 */
	
	 //各个站点下所有语言站数据
	saveResult ( $_result[$baseData[17]]['all'], 'total' ) ;  //记录IP UV 信息
	//saveResult ( $_result[$baseData[17]][$baseData[18]]['all'], 'total' ) ;  //记录IP UV 信息
	/* saveResult ( $_result[$baseData[17]][$baseData[18]]['all'], 'referer:'. getRefererHost( $refererInfo ), array('dateKey') );  //统计referer来源国家，天为最小单位
	saveResult ( $_result[$baseData[17]][$baseData[18]]['all'], 'screen:'. screenwh ( $pageData['sw'], $pageData['sh'] ), array('dateKey') ); //统计屏幕大小，天为最小单位
	saveResult ( $_result[$baseData[17]][$baseData[18]]['all'], 'brower:'. browerVer ( $baseData[7] ), array('dateKey') );  //统计浏览器类型
	saveResult ( $_result[$baseData[17]][$baseData[18]]['all'], 'lang:'. $baseData[8], array('dateKey') );                //记录IP国家，天为最小单位  */
	//各个站点下各个语言站数据
	saveResult ( $_result[$baseData[17]][$baseData[1]], 'total' );  //记录IP UV 信息
	/* saveResult ( $_result[$baseData[17]][$baseData[18]][$baseData[1]], 'referer:'. getRefererHost($refererInfo), array('dateKey') );  //统计referer来源国家，天为最小单位
	saveResult ( $_result[$baseData[17]][$baseData[18]][$baseData[1]], 'screen:'. screenwh($pageData['sw'], $pageData['sh']), array('dateKey') ); //统计屏幕大小，天为最小单位
	saveResult ( $_result[$baseData[17]][$baseData[18]][$baseData[1]], 'brower:'. browerVer($baseData[7]), array('dateKey') );  //统计浏览器类型
	saveResult ( $_result[$baseData[17]][$baseData[18]][$baseData[1]], 'lang:'. $baseData[8], array('dateKey') );                //记录IP国家，天为最小单位    */
}

//存入相关信息
function saveResult ( &$_result, $keyPath, $saveTime = array ('minKey' , 'hourKey' , 'dateKey' ) ) {
	global $_c,$IP,$UV,$newUV;
	foreach ( $saveTime as $mainKey ) {
		//===================TIME FOR MINUTES================
		$tmpPath=explode(":",$keyPath);      
		eval("\$_re = &\$_result['".getPrefix($_c[$mainKey])."']['".getPrefix($_c[$mainKey],2)."']['".implode("']['",$tmpPath)."'];");
		$_re['pv'] = !isset ( $_re['pv'] ) ? 1 : ++$_re['pv'];
		$_re['ip'] = !isset ( $_re['ip'] ) ? $IP[$mainKey] : $_re['ip'] + $IP[$mainKey];
		$_re['uv'] = !isset ( $_re['uv'] ) ? $UV : $_re['uv'] + $UV;
		$_re['newUv'] = !isset ( $_re['newUv'] ) ? $newUV : $_re['newUv'] + $newUV;
	}
}
//从data中找到$keyName 并把整条key结构都存入redis Keyname的最大搜索层级为searchlvl层
function saveInRedis($findData,$keyName,$searchLvl,$keyz='',$notFind = true) {
	global $redis;
	if(!is_array($findData)) return;
	if ($notFind && $searchLvl < 0)  return;
	foreach ( $findData as $key => $val ) {
		if ($key == $keyName ) $notFind = false;
		$tmp = strlen($keyz)>0 ? $keyz.":".$key :$key;
		if(!is_array($val)) {
			$keyNameExplode=explode(":",$tmp);
			if(in_array($keyName,$keyNameExplode)) {
				$redisKey = array_pop ($keyNameExplode);
				$redis->hSet ( implode (":",$keyNameExplode), $redisKey, $val);
				//echo " $tmp ===> $val \r\n";
			}
		}
		else {
			$lvlNow=$searchLvl-1;
			$p = saveInRedis($val,$keyName,$lvlNow,$tmp,$notFind);
		}
	}
}
function clearGlobal() {
	$clearKeys=array('_result','IPCache','timeOnSiteC','timeOnSite','sessionOnline','dupliateLog');
	foreach($clearKeys as $key => $val) {
   	$GLOBALS[$val]=array();
		unset($GLOBALS[$val]);
	}
}
function clearByKey(&$data,$keyName,$maxSearch) {
	$maxSearch--;
	if ($maxSearch < 0) return;
	foreach ( $data as $key => &$val ) {
			if ( $key == $keyName ) {
				unset ($data[$key]);
			}
			elseif ( is_array ($val) ) {				
					clearByKey($val,$keyName,$maxSearch);
			}
	}
}
