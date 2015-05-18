<?php /* Smarty version 2.6.18, created on 2014-03-12 16:04:20
         compiled from wish_detail.htm */ ?>
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

							后台管理系统 <small>商品详情</small>

						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.php?module=appointment&action=AppointManage">首页</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="#">商品详情</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span12">

						<!-- BEGIN GALLERY MANAGER PORTLET-->

						<div class="portlet box purple">

							<div class="portlet-title">

								<div class="caption"><i class="icon-reorder"></i>Gallery Manager</div>

								<div class="tools">

									<a href="javascript:;" class="collapse"></a>

								</div>

							</div>

							<div class="portlet-body">

								<!-- BEGIN GALLERY MANAGER PANEL-->

								<div class="row-fluid">

									<div class="span4">

										<h4>顾客：<font color='green' size='6'><?php echo $this->_tpl_vars['username']; ?>
</font>&nbsp;选择的商品</h4>

									</div>

								</div>

								<!-- END GALLERY MANAGER PANEL-->

								<hr class="clearfix" />

								<!-- BEGIN GALLERY MANAGER LISTING-->

								<div class="row-fluid">
                                    
                                    <?php $_from = $this->_tpl_vars['detail_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['detail']):
?>

									<div class="span3">

										<div class="item">	
                                        									
                                            <a title="查看详情" href="<?php echo $this->_tpl_vars['detail']['front_url']; ?>
" target="_blank">
                                            
												<div class="zoom">

													<img src="<?php echo $this->_tpl_vars['detail']['img_url']; ?>
" style="width:250px;height:350px;" />
                                                    
                                                    <div class="zoom-icon"></div>
                                                    
												</div>
                                                
                                            </a>
                                                <div style="text-align: center;text-size:16px;">
                                                
                                                    <span>商品ID:<?php echo $this->_tpl_vars['detail']['id']; ?>
</span>
                                                    
                                                </div>

										</div>

									</div>
                                    <?php endforeach; endif; unset($_from); ?>
                                    
								<!-- END GALLERY MANAGER LISTING-->
							</div>

						</div>

						<!-- END GALLERY MANAGER PORTLET-->

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
</body>
    
</html>