<?php

  namespace Module\product;

  use Helper\RequestUtil as R;
  use Helper\ResponseUtil as rew;

  /**
   * 商品管理
   * 
   * @author tanyujiang
   *         @sinc 2014-05-14
   * @param
   *        	int
   * @param
   *        	int
   */
  class ProductManage extends \Lib\common\Application
  {
  		public function __construct()
  		{
  		        $commonFun = new \Lib\common\commonFunction();  //引入公共方法
  				$tpl = \Lib\common\Template::getSmarty();
                
  				$params = R::getParams();
  				$act = $params->act; //取得动作参数
  				$db = \Lib\common\Db::get_db();
  				//$db->debug=1;
                $base_url = "index.php?module=product&action=ProductManage";
  				/*
  				*此处根据动作参数不同进行获取商品信息，删除功能等
  				*/
  				switch ( $act )
  				{         
  				          //编辑时取得商品信息
  						case 'ajax_getProduct':
  								$ajaxRes = array( 'status' => 0 );
  								$params_ajax = R::getParams();
  								$id = $params_ajax->id;
  								$sql_info = "SELECT * FROM milanoo.milanoo_sns_product WHERE id={$id} ";
  								if ( $info = $db->GetRow( $sql_info ) )
  								{
  										$ajaxRes = array( 'status' => 1, 'detail' => $info );
  								}
  								echo json_encode( $ajaxRes );
  								exit();
                                break;
                         //提交更新商品信息       
                        case 'sub_product':
                                $ajaxRes = array('status'=>0);
                                $params_sub = R::getParams();
                                $id = $params_sub->id;
                                $productIds = trim($params_sub->productId,',');
                                $credits = $params_sub->credits;
                                if(!is_numeric($credits)){
                                    $ajaxRes = array('status'=>5);
                                    echo json_encode($ajaxRes);exit();
                                }
                                $nowTime = date("Y-m-d H:i:s");                                
                                if(!empty($id)){
                                    //更新
                                    $sql = "UPDATE milanoo.milanoo_sns_product SET score = '{$credits}' WHERE id = {$id} ";
                                    if($db->Execute( $sql )){
                                        $ajaxRes['status']=1;
                                    }
                                }else{
                                    //新建
                                    $ckFlag = true;
                                    $productIdArr = explode(",",$productIds);
                                    foreach($productIdArr as $v){
                                        if(!is_numeric($v)){
                                                $ajaxRes = array('status'=>3);
                                                echo json_encode($ajaxRes);exit();
                                        }
                                        $productid = intval($v);
                                                                               
                                        //检查productid是否合法
                                        $data = array(
                                            'productIds'=>$productid,
                                            'languageCode'=>'en-uk',
                                            'websiteId'=>1
                                        );
                                        //调用java商品详细接口
                                        $productDetail = $commonFun->getServiceData('product','htProductIsActiver',$data,'GET','sns');
                                        if($productDetail['code']=='0'){
                                            if((!$productDetail["{$productid}"]) || ($productDetail["{$productid}"]==0)){
                                                $ckFlag = false;
                                                $ajaxRes = array('status'=>2,'reproId'=>$productid);
                                                echo json_encode($ajaxRes);exit();
                                            }
                                        }
                                        
                                        //检查id是否已添加
                                         $sql_ck = "SELECT id FROM milanoo.milanoo_sns_product WHERE product_id='{$productid}' ";
                                            if($db->GetOne($sql_ck)){
                                                $ckFlag = false;
                                                $ajaxRes = array('status'=>4,'reproId'=>$productid);
                                                echo json_encode($ajaxRes);exit();
                                         }
                                    }
                                    
                                    if($ckFlag==true){
                                        foreach($productIdArr as $v){
                                            $productid = intval($v);
                                            $sql = "INSERT INTO milanoo.milanoo_sns_product 
                                                        (product_id,score,gmt_create) VALUES
                                                        ({$productid},{$credits},'{$nowTime}') ";
                                            $rs = $db->Execute($sql);
                                        }
                                        $ajaxRes['status']=1;
                                    }  
                                                                     
                                    
                                }
                                echo json_encode($ajaxRes);exit();
                                
                                break;
                          
                          //单独删除      
                        case 'delSingle':
                                $params_del = R::getParams();
                                $ajaxDel = array('status'=>0);
                                $id = $params_del->id;
                                if(!empty($id)){                                                                            
                                        $sql_del_s = "DELETE FROM milanoo.milanoo_sns_product WHERE id = '{$id}' ";
                                        if($db->Execute( $sql_del_s )){
                                            $ajaxDel = array('status'=>1);
                                            echo json_encode( $ajaxDel);
                                            exit();
                                    }
                                }
                                break;
                         
                         //批量删除       
                        case 'delChoosed':
                                $idarray = $_POST["idarray"];
                                if(!empty($idarray)){
                                        $idStr = implode( ",", $idarray );                                    
                                        $sql_del = "DELETE FROM milanoo.milanoo_sns_product WHERE id in({$idStr}) ";
                                        if($db->Execute( $sql_del )){
                                        $this->jumpTo($base_url );                                        
                                    }
                                }
                                break;
                                
                        //批量导入商品数据（exel）
                        case 'ajax_importExcel':
                                require ROOT_PATH.'lib/common/Classes/PHPExcel/IOFactory.php';//引入phpExcel导入类
                                $ajaxRes = array('flag'=>0);
                                $nowTime = date("Y-m-d H:i:s"); 
                                $excel = $_FILES['importFile'];
                                $extentison = $commonFun->getExt($excel['name']);
                                if(($extentison!=='xls')&&($extentison!=='xlsx')){    //检查是否exel文件
                                    $ajaxRes = array('flag'=>'2');
                                    echo json_encode($ajaxRes);exit();
                                }
                                $excelObj = new \PHPExcel_IOFactory();
                                $objReader =$excelObj::createReader('Excel5');
                                $WorksheetInfo = $objReader->listWorksheetInfo($excel['tmp_name']);
                                $maxRows = $WorksheetInfo[0]['totalRows'];
                                $maxColumn = $WorksheetInfo[0]['totalColumns'];    
                                //设置只读，可取消类似"3.08E-05"之类自动转换的数据格式，避免写库失败
                                $objReader->setReadDataOnly(true);                               
                                $objPHPExcel = $objReader->load($excel['tmp_name']);
                                $sheetData = $objPHPExcel->getSheet(0)->toArray(null,true,true,true);
                                //print_r($excel);
                                foreach ( $sheetData as $key => $words ){
                                	$productId = trim($words['A']);
                               		$score = trim($words['B']);
                                    //检查ID是否是合法数字
                                    if(!is_numeric($productId)){
                                        continue; //过滤非法的productId;
                                    }
                                    //检查id是否已添加
                                    $sql_ck = "SELECT id FROM milanoo.milanoo_sns_product WHERE product_id='{$productId}' ";
                                    if($db->GetOne($sql_ck)){
                                        continue;   //过滤已存在的productId;
                                    }
                                    
                                    //检查productid是否合法
                                    $data = array(
                                            'productIds'=>$productId,
                                            'languageCode'=>'en-uk',
                                            'websiteId'=>1
                                        );
                                        //调用java商品详细接口
                                        $productDetail = $commonFun->getServiceData('product','htProductIsActiver',$data,'GET','sns');
                                        if($productDetail['code']=='0'){
                                            if((!$productDetail["{$productId}"]) || ($productDetail["{$productId}"]==0)){
                                                continue; //过滤不存在或未上架的productId;
                                            }
                                        }
                                     $sql_in = "INSERT INTO milanoo.milanoo_sns_product 
                                                        (product_id,score,gmt_create) VALUES
                                                        ({$productId},{$score},'{$nowTime}')"; 
                                     $db->Execute($sql_in);                       
                                }
                                $ajaxRes = array('flag'=>1);
                                echo json_encode( $ajaxRes);
                                exit();
                                break;


  				}
                //搜索
                $so_array['categoryId'] = $params->categoryId;
                $so_array['productId'] = $params->productId;
                $tpl->assign ( 'so_array', $so_array );  
                //通过接口取得商品二级分类列表
                $cateData = array(
                                'languageCode'=>'en-uk',
                                'websiteId'=>1
                            );
                 //调用java商品二级分类列表接口
                $category = $commonFun->getServiceData('product','htProductCategoryList',$cateData,'GET','sns');
                $categoryData = array();
				foreach($category['categories'] as $key=>$val){
					$categoryData[$key]['categoryId'] = $val['categoryId'];
					$categoryData[$key]['categoryName'] = stripslashes($val['categoryName']);
				}
  				$tpl->assign( 'category', $categoryData );
                
                //通过接口调用商品列表
                //获得当前页
                if ( !isset( $_GET['page'] ) ){
                    $page = 1;
                }else{
                    $page =  $_GET['page'];
                }
                $proData = array(
                                'websiteId' => 1,
                                'languageCode'=>'en-uk',
                                'pageNo'=>$page,
                                'pageSize'=>PAGE
                            );
                 if(!empty($so_array['categoryId'])){
                     $proData['categoryId'] = $so_array['categoryId'];
                 }
                 if(!empty($so_array['productId']) && $so_array['productId']!='输入商品ID搜索'){
                        $proData['productId'] = $so_array['productId'];
                    }
                 //通过接口获取商品列表
                $product = $commonFun->getServiceData('product','htProductList',$proData,'GET','sns');		
                $total_results = $product['totalCount'];
                $total_pages = ceil( $total_results / PAGE );
  				if ( isset( $_GET['page'] ) )
  				{
  						$show_page = $_GET['page'];
  						if ( $show_page > 0 && $show_page <= $total_pages )
  						{
  								$start = ( $show_page - 1 ) * PAGE;
  								$end = $start + PAGE;
  						} else
  						{
  								$start = 0;
  								$end = PAGE;
  						}
  				} else
  				{

  						$start = 0;
  						$end = PAGE;
  				}

  				$page = intval( $_GET['page'] );

  				$tpages = $total_pages;
  				if ( $page <= 0 )
  						$page = 1;

  				$reload = $_SERVER['PHP_SELF'] . "?module=product&action=ProductManage";
               
                if(!empty($so_array['productId'])){
                    $reload.="&productId='{$so_array['productId']}'";
                }
                if(!empty($so_array['categoryId'])){
                    $reload.="&categoryId='{$so_array['categoryId']}'";
                }
  				$reload .= "&tpages=" . $tpages;
  				for ( $i = $start; $i < $end; $i++ )
  				// {
  						// if ( $i == $total_results )
  						// {
  								// break;
  						// }
  				// }

  				if ( $total_pages > 1 )
  				{
						  $page_html = \Lib\common\Page::paginate( $reload, $page, $tpages );
						  $tpl->assign( 'page', $page_html );
  				}
				foreach($product['products'] as $key=>$val){
					$product['products'][$key]['categoryName'] = stripslashes($val['categoryName']);

				}
                $tpl->assign('productList',$product['products']);
  				$tpl->display( 'product_list.htm' );
  		}
        
       
  }
?>