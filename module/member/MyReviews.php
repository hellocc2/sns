<?php
namespace Module\member;
use Helper\RequestUtil as R;
use Helper\ResponseUtil as rew;
/**
 * 会员注册
 * @author wujianjun<wujianjun127@163.com>
 * @sinc 2012-05-15
 * @param int 
 * @param int 
 */
class MyReviews extends \Lib\common\Application {
	public function __construct() {
		$tpl = \Lib\common\Template::getSmarty ();	
		$tpl->display('my_reviews.htm');
	}
}



