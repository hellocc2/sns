<?php
namespace Module\Index;
use Helper\RequestUtil as R;
use Helper\CheckLogin as CheckLogin;

class Index extends \Lib\common\Application {
	public function __construct() {
		$tpl = \Lib\common\Template::getSmarty ();
        $db = \Lib\common\Db::get_db();
        //$db->debug=1;

        if(!empty($_POST['act'])){
            switch ($_POST['act'])
            {
                //提交问题
                case 'qa_add':
                    $qa_content= $_POST['qa_content'];
                    $time=time();
                    $member='游客';
                    $ajaxRes['status']=0;
                    $sql="INSERT INTO ".DB_PRE."question (question,submiter,time) values ('".$qa_content."','".$member."','".$time."')";
                    $db->Execute( $sql );
                    $sql ="SELECT id,question,submiter,time FROM co_question";
                    $rs = $db->SelectLimit($sql);
                    if ( $rs->RecordCount())
                    {
                        while ( ! $rs->EOF )
                        {
                            $row = $rs->fields;
                            $infoData[] = $row;
                            $rs->MoveNext();
                        }
                    }
                    $tpl->assign( 'infoData', $infoData );
                    $tpl->display ( 'index.htm' );
                    break;
            }
        }else{
            $sql = "SELECT id,question,submiter,time FROM co_question";
            $rs = $db->SelectLimit( $sql);
            if ( $rs->RecordCount())
            {
                while ( ! $rs->EOF )
                {
                    $row = $rs->fields;
                    $infoData[] = $row;
                    $rs->MoveNext();
                }
            }
            $tpl->assign( 'infoData', $infoData );
            $tpl->display ( 'index.htm' );
        }

	}
}