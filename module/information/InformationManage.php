<?php

  namespace Module\information;

  use Helper\RequestUtil as R;
  use Helper\ResponseUtil as rew;

  /**
   * 信息管理
   * 
   * @author tanjiang
   *         @sinc 2014-04-18
   * @param
   *        	int
   * @param
   *        	int
   */
  class InformationManage extends \Lib\common\Application
  {
  		public function __construct()
  		{       
  		        $tpl = \Lib\common\Template::getSmarty();
                 //引入转发类型配置  
                $sendTypeOne = \config\snsConfig::$sendTypeOne; 
                $tpl->assign('sendTypeOne',$sendTypeOne);
                              
  				$params = R::getParams();
  				$act = $params->act; //取得动作参数
  				$db = \Lib\common\Db::get_db();
  				//$db->debug=1;
                $base_url = "index.php?module=information&action=InformationManage";
  				/*
  				*此处根据动作参数不同进行获取预约信息，删除功能等
  				*/
  				switch ( $act )
  				{         
  				        
                          //单独删除      
                        case 'delSingle':
                                $params_del = R::getParams();
                                $ajaxDel = array('status'=>0);
                                $id = $params_del->id;
                                if(!empty($id)){                                                                            
                                        $sql_del_s = "UPDATE milanoo.milanoo_sns_event_detail SET data_status = 1 WHERE id = '{$id}' ";
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
                                        $sql_del = "UPDATE milanoo.milanoo_sns_event_detail SET data_status = 1 WHERE id in({$idStr}) ";
                                        if($db->Execute( $sql_del )){
                                        $this->jumpTo($base_url );                                        
                                    }
                                }
                                break;
                        
                        //查看详细
                        case 'infoDetail':
                            $params_detail = R::getParams();
                            $infoId = $params_detail->info_id;
                            $sql = "SELECT a.MemberId,a.MemberContact,a.MemberEmail,b.* FROM milanoo.milanoo_member a
                                    INNER JOIN milanoo.milanoo_sns_event_detail b ON a.MemberId=b.memberid
                                    WHERE a.MemberType='FashionBlogger'
                                    AND b.data_status=0
                                    AND b.id='{$infoId}'
                                    ORDER BY b.id DESC ";
                            $detail = $db->GetRow($sql);
                            $detail['content'] = explode("|",$detail['content']);
                            $blogs = array();
                            $pattern = '/^https?\:\/\//iu';
                            foreach($detail['content'] as $key=>$val){
                                if($val=trim($val)) {
                                    if(!preg_match($pattern,$val)){
                                        $blogs[] = "http://".$val;
                                    }else{
                                        $blogs[] = $val;
                                    }
                                }
                            }
                            $detail['content'] = $blogs;
                            $tpl->assign('detail',$detail);
                            $tpl->display('information_detail.htm');
                            exit();
                            break;
  				}
                
                //搜索
                $so_array['suname'] = $params->suname;
                $so_array['suid'] = $params->suid;
                $so_array['semail'] = $params->semail;
                $tpl->assign ( 'so_array', $so_array );
  				/*
  				*以下是取得列表数据
  				*/
  				$sql = "SELECT a.MemberId,a.MemberContact,a.MemberEmail,b.* FROM milanoo.milanoo_member a
                        INNER JOIN milanoo.milanoo_sns_event_detail b ON a.MemberId=b.memberid
                        WHERE a.MemberType='FashionBlogger'
                        AND b.data_status=0
                        AND b.share_type<>0 ";
                        
                if(!empty($so_array['suname']) && $so_array['suname']!='输入用户姓名进行搜索'){                    
                        $sql.=" AND a.MemberContact LIKE '%{$so_array['suname']}%' ";
                }
                
                if ( ! empty( $so_array['suid'] ) && $so_array['suid'] != '输入用户ID进行搜索' )
  				{
  						$sql .= " AND a.MemberId = '{$so_array['suid']}' ";
  				}
                
                if ( ! empty( $so_array['semail'] ) && $so_array['semail'] != '输入用户邮箱进行搜索' )
  				{
  						$sql .= " AND a.MemberEmail LIKE '%{$so_array['semail']}%' ";
  				}
                //$sql.=" GROUP BY tname ";
  				$sql .= "ORDER BY b.id DESC";
  				$query = $db->execute( $sql );
  				$total_results = $query->MaxRecordCount( $query );
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

  				$reload = $_SERVER['PHP_SELF'] . "?module=information&action=InformationManage";
               
                if(!empty($so_array['suname'])){
                    $reload.="&suname={$so_array['suname']}";
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
  				$i = $i - PAGE;
  				$rs = $db->SelectLimit( $sql, PAGE, $i );
  				//print_r($rs);
  				$infoData = array();
  				if ( $rs->RecordCount() )
  				{
  						while ( ! $rs->EOF )
  						{
  								$row = $rs->fields;
  								$infoData[] = $row;
  								$rs->MoveNext();
  						}
  				}
                
  				//print_r($infoData);
  				$tpl->assign( 'information', $infoData );
  				$tpl->display( 'information_list.htm' );
  		}
  }
?>