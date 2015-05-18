<?php /* Smarty version 2.6.18, created on 2014-05-12 18:06:59
         compiled from information_detail.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>   

			<!-- BEGIN PAGE CONTAINER-->        
        <div class="mypage-content">
			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

				<div class="row-fluid">

					<div class="span12">						 

						<!-- BEGIN PAGE TITLE & BREADCRUMB-->

						<h3 class="page-title">

						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="">首页</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li>
                                
                                <a href="index.php?module=information&action=informationManage">信息管理</a>
                            
                                <i class="icon-angle-right"></i>
                                
                            </li>
                            
                            <li><a href="#">信息详情</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid profile">

					<div class="span12">
                    
                        <div class="tabbable tabbable-custom tabbable-full-width">
                    
                            <div>

					           <div class="tab-pane profile-classic row-fluid" id="tab_1_2">

									<ul class="unstyled span10">

										<li><span>姓名：</span> <?php echo $this->_tpl_vars['detail']['MemberUserName']; ?>
</li><br />

										<li><span>Email：</span> <a href="mailto:<?php echo $this->_tpl_vars['detail']['MemberEmail']; ?>
" target="_blank"><?php echo $this->_tpl_vars['detail']['MemberEmail']; ?>
</a></li><br />

										<li>
                                            <span>博客地址：</span> 
                                            <?php $_from = $this->_tpl_vars['detail']['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['em']):
?>
                                                <a href="<?php echo $this->_tpl_vars['em']; ?>
" target="_blank"><?php echo $this->_tpl_vars['em']; ?>
</a>;
                                            <?php endforeach; endif; unset($_from); ?>
                                        </li><br />

										<li><span>转发类型：</span> <?php echo $this->_tpl_vars['sendTypeOne'][$this->_tpl_vars['detail']['share_type']]; ?>
</li><br />

										<li><span>提交日期:</span> <?php echo $this->_tpl_vars['detail']['gmt_create']; ?>
</li><br />

										<li><span>信息内容:</span> <?php echo $this->_tpl_vars['detail']['description']; ?>
</li>
                                        
									</ul>

								</div>
                                
                                <div><input style="float: right;" type="button" value=" 返    回 " onclick="javascript:history.back(-1);" /></div>
    
						      </div>
                        
                        </div>

					</div>

				</div>

			</div>
   </div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer_div.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<style type="text/css">
.profile-classic li span {
    color: #666666;
    font-size: 15px;
    margin-right: 7px;
    margin-left:340px;
}
</style>

</body>
    
</html>