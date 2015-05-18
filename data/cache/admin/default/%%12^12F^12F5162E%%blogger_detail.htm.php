<?php /* Smarty version 2.6.18, created on 2014-05-14 16:29:52
         compiled from blogger_detail.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<style type="text/css">
.profile-classic li span,.active li span {
    color: #666666;
    font-size: 15px;
    margin-right: 7px;
    margin-left:340px;
}
label{
    float: left;
    width: 80px;
    }
    form{margin:0px}
    input{
    width: 160px;
    border:1px solid #808080;
    padding:0px 0px;
    }
    
    select{
    padding:0px 0px;
    width: 230px;
    }
    
    textarea{
    width: 230px;
    height: 80px;
    }
    
    #sbutton{
    margin-left: 80px;
    margin-top: 5px;
    width:80px;
    }
    
    br{
    clear: left;
    }
    .hidesize{
        display: none;
    }
</style>
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

							<li><a href="#">用户详情</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid profile">

					<div class="span12">

						<!-- BEGIN EXAMPLE TABLE PORTLET-->

						<div class="tabbable tabbable-custom tabbable-full-width">

							<ul class="nav nav-tabs">

								<li <?php if ($this->_tpl_vars['isActive'] == 'base'): ?>class="active"<?php endif; ?>><a href="#tab_1_1" data-toggle="tab">基本信息</a></li>

								<li><a href="#tab_1_2" data-toggle="tab">体型信息</a></li>

								<li><a href="#tab_1_3" data-toggle="tab">收货地址</a></li>

								<li <?php if ($this->_tpl_vars['isActive'] == 'memScore'): ?>class="active"<?php endif; ?>><a href="#tab_1_4" data-toggle="tab">积分记录</a></li>

								<li><a href="#tab_1_5" data-toggle="tab">所选商品</a></li>
                                
                                <li <?php if ($this->_tpl_vars['isActive'] == 'memInfo'): ?>class="active"<?php endif; ?>><a href="#tab_1_6" data-toggle="tab">所发信息</a></li>

							</ul>

							<div class="tab-content">
                            
                                <div class="tab-pane <?php if ($this->_tpl_vars['isActive'] == 'base'): ?>active<?php else: ?>profile-classic<?php endif; ?> row-fluid" id="tab_1_1">

									<ul class="unstyled span10">

										<li><span>姓名:</span><?php echo $this->_tpl_vars['baseInfo']['MemberUserName']; ?>
</li><br />

										<li><span>Email:</span><?php if ($this->_tpl_vars['baseInfo']['MemberEmail']): ?><?php echo $this->_tpl_vars['baseInfo']['MemberEmail']; ?>
<?php else: ?><font color='red'>尚未完善</font><?php endif; ?></li><br />

										<li><span>性别:</span><?php if ($this->_tpl_vars['baseInfo']['MemberSex'] == 'Women'): ?>女<?php else: ?>男<?php endif; ?></li><br />

										<li><span>职业:</span><?php if ($this->_tpl_vars['baseInfo']['job']): ?><?php echo $this->_tpl_vars['baseInfo']['job']; ?>
<?php else: ?><font color='red'>尚未完善</font><?php endif; ?></li><br />

										<li><span>爱好:</span><?php if ($this->_tpl_vars['baseInfo']['interests']): ?><?php echo $this->_tpl_vars['baseInfo']['interests']; ?>
<?php else: ?><font color='red'>尚未完善</font><?php endif; ?></li><br />

										<li><span>博客地址:</span>
                                        <?php if ($this->_tpl_vars['baseInfo']['blogs']): ?>
                                            <?php $_from = $this->_tpl_vars['baseInfo']['blogs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['blogs']):
?>
                                                <a href="http://<?php echo $this->_tpl_vars['blogs']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['blogs']['url']; ?>
</a>;
                                            <?php endforeach; endif; unset($_from); ?>
                                        <?php else: ?><font color='red'>尚未完善</font><?php endif; ?>
                                        </li>

									</ul>

								</div>
                                
                                <div class="tab-pane profile-classic row-fluid" id="tab_1_2">

									<ul class="unstyled span10">

										<li><span>胸围:</span><?php if ($this->_tpl_vars['bwhInfo']['chest']): ?><?php echo $this->_tpl_vars['bwhInfo']['chest']; ?>
<?php echo $this->_tpl_vars['bwhInfo']['unit']; ?>
<?php else: ?><font color='red'>尚未完善</font><?php endif; ?></li><br />

										<li><span>腰围:</span> <?php if ($this->_tpl_vars['bwhInfo']['waist']): ?><?php echo $this->_tpl_vars['bwhInfo']['waist']; ?>
<?php echo $this->_tpl_vars['bwhInfo']['unit']; ?>
<?php else: ?><font color='red'>尚未完善</font><?php endif; ?></li><br />

										<li><span>臀围:</span><?php if ($this->_tpl_vars['bwhInfo']['hips']): ?> <?php echo $this->_tpl_vars['bwhInfo']['hips']; ?>
<?php echo $this->_tpl_vars['bwhInfo']['unit']; ?>
<?php else: ?><font color='red'>尚未完善</font><?php endif; ?></li><br />

										<li><span>身高:</span><?php if ($this->_tpl_vars['bwhInfo']['height']): ?> <?php echo $this->_tpl_vars['bwhInfo']['height']; ?>
<?php echo $this->_tpl_vars['bwhInfo']['unit']; ?>
<?php else: ?><font color='red'>尚未完善</font><?php endif; ?></li>

									</ul>

								</div>
                                
                                <div class="tab-pane profile-classic row-fluid" id="tab_1_3">

									<ul class="unstyled span10">

										<li><span>Recipient Country/Region:</span><?php if ($this->_tpl_vars['addressInfo']['country']): ?><?php echo $this->_tpl_vars['addressInfo']['country']; ?>
<?php else: ?><font color='red'>尚未完善</font><?php endif; ?></li><br />

										<li><span>State/Province/Region:</span><?php if ($this->_tpl_vars['addressInfo']['MemberUrbanAreas']): ?><?php echo $this->_tpl_vars['addressInfo']['MemberUrbanAreas']; ?>
<?php else: ?><font color='red'>尚未完善</font><?php endif; ?></li><br />
                                        
                                        <li><span>City:</span><?php if ($this->_tpl_vars['addressInfo']['ConsigneeCity']): ?><?php echo $this->_tpl_vars['addressInfo']['ConsigneeCity']; ?>
<?php else: ?><font color='red'>尚未完善</font><?php endif; ?></li><br />
                                        
                                        <li><span>Zip/Postal Code:</span><?php if ($this->_tpl_vars['addressInfo']['ConsigneePostalcode']): ?><?php echo $this->_tpl_vars['addressInfo']['ConsigneePostalcode']; ?>
<?php else: ?><font color='red'>尚未完善</font><?php endif; ?></li><br />
                                        
                                        <li><span>Phone Number:</span><?php if ($this->_tpl_vars['addressInfo']['ConsigneePhone']): ?><?php echo $this->_tpl_vars['addressInfo']['ConsigneePhone']; ?>
<?php else: ?><font color='red'>尚未完善</font><?php endif; ?></li>

									</ul>

								</div>


								<div class="tab-pane <?php if ($this->_tpl_vars['isActive'] == 'memScore'): ?>active<?php else: ?>profile-classic<?php endif; ?> row-fluid" id="tab_1_4">

									<div class="span9">

										<!--end row-fluid-->

										<div class="tabbable tabbable-custom tabbable-custom-profile">

											<div class="tab-content">

												<div class="tab-pane active" id="tab_1_11">

													<div class="portlet-body" style="display: block;">
                                                        
                                                        <div>
                                                            
                                                            <span style="float: left;"><font color='green'>当前积分:</font><?php if ($this->_tpl_vars['memberScore']): ?><?php echo $this->_tpl_vars['memberScore']; ?>
<?php else: ?>0<?php endif; ?></span>
                                                            
                                                            <span style="float: right;">
                                                                <a lid='0' class="thickbox editTk" href="#TB_inline?&width=300&height=150&inlineId=editTask">

                            										<button class="btn green">
                            
                            										分配积分
                            
                            										</button>
                                                                    
                                                                </a>
                                                                
                                                            </span>
                                                            
                                                        </div><br /><br />

														<table class="table table-striped table-bordered table-advance table-hover">

															<thead>

																<tr>

																	<th>获取积分方式</th>

																	<th>积分</th>

																	<th>日期</th>

																</tr>

															</thead>

															<tbody>
                                                                <?php if ($this->_tpl_vars['scoreRecord']): ?>
                                                                    <?php $_from = $this->_tpl_vars['scoreRecord']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['record']):
?>
    																<tr>
    
    																	<td><?php echo $this->_tpl_vars['record']['actionName']; ?>
</td>
    
    																	<td><?php echo $this->_tpl_vars['record']['score']; ?>
</td>
    
    																	<td><?php echo $this->_tpl_vars['record']['gmt_create']; ?>
</td>
    
    																</tr>
                                                                    <?php endforeach; endif; unset($_from); ?>
                                                                <?php else: ?>
                                                                    <tr>
                                                                        <td colspan="3" style="text-align: center;"><font color='red'>该用户暂时没有积分记录</font></td>
                                                                    </tr>
                                                                <?php endif; ?>

															</tbody>

														</table>

													</div>

												</div>

												<!--tab-pane-->

											</div>

										</div>

									</div>

									<!--end span9-->

								</div>
                                
                                <div class="tab-pane profile-classic row-fluid" id="tab_1_5">

									<div class="span9">

										<!--end row-fluid-->

										<div class="tabbable tabbable-custom tabbable-custom-profile">

											<div class="tab-content">

												<div class="tab-pane active" id="tab_1_11">

													<div class="portlet-body" style="display: block;">

														<table class="table table-striped table-bordered table-advance table-hover">

															<thead>

																<tr>

																	<th><i class="icon-briefcase"></i> Company</th>

																	<th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>

																	<th><i class="icon-bookmark"></i> Amount</th>

																	<th></th>

																</tr>

															</thead>

															<tbody>

																<tr>

																	<td><a href="#">Pixel Ltd</a></td>

																	<td class="hidden-phone">Server hardware purchase</td>

																	<td>52560.10$ <span class="label label-success label-mini">Paid</span></td>

																	<td><a class="btn mini green-stripe" href="#">View</a></td>

																</tr>

															</tbody>

														</table>

													</div>

												</div>

												<!--tab-pane-->

											</div>

										</div>

									</div>

									<!--end span9-->

								</div>
                                
                                <div class="tab-pane <?php if ($this->_tpl_vars['isActive'] == 'memInfo'): ?>active<?php else: ?>profile-classic<?php endif; ?> row-fluid" id="tab_1_6">

									<div class="span9">

										<!--end row-fluid-->

										<div class="tabbable tabbable-custom tabbable-custom-profile">

											<div class="tab-content">

												<div class="tab-pane active" id="tab_1_11">

													<div class="portlet-body" style="display: block;">

														<table class="table table-striped table-bordered table-advance table-hover">

															<thead>

																<tr>

																	<th>用户姓名</th>

																	<th>信息内容</th>

																	<th>提交日期</th>

																	<th>操作</th>

																</tr>

															</thead>

															<tbody>
                                                                <?php if ($this->_tpl_vars['information']): ?>
                                                                <?php $_from = $this->_tpl_vars['information']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
																<tr>

																	<td><?php echo $this->_tpl_vars['info']['MemberUserName']; ?>
</td>

																	<td><?php echo $this->_tpl_vars['info']['description']; ?>
</td>

																	<td><?php echo $this->_tpl_vars['info']['gmt_create']; ?>
</td>

																	<td><a class="btn mini green" href="index.php?module=information&action=InformationManage&act=infoDetail&info_id=<?php echo $this->_tpl_vars['info']['id']; ?>
"><i class="icon-list"></i> 查看</a></td>

																</tr>
                                                                <?php endforeach; endif; unset($_from); ?>
                                                                <?php else: ?>
                                                                    <tr>
                                                                        <td colspan="3" style="text-align: center;"><font color='red'>没有相关记录</font></td>
                                                                    </tr>
                                                                <?php endif; ?>

															</tbody>

														</table>
                                                        <div class="row-fluid">
                                                            <div class="pagination"><?php echo $this->_tpl_vars['infoPage']; ?>
</div>
                                                        </div>

													</div>

												</div>

												<!--tab-pane-->

											</div>

										</div>

									</div>

									<!--end span9-->

								</div>

								<!--end tab-pane-->

							</div>

						</div>

						<!-- END EXAMPLE TABLE PORTLET-->

					</div>
                    
                    <div><input style="float: right;" type="button" value=" 返    回 " onclick="javascript:history.back(-1);" /></div>

				</div>

			</div>
   </div>
   
   <!--分配积分弹出层 start-->
   <div id="editTask" style="display:none;">
        <p style="text-align: center;color:orange;"><b>分配积分</b></p>
        <div style="text-align:center;" class="tappend">
            <form action='' method='post' id='score_form'>
                <input type="hidden" value="<?php echo $this->_tpl_vars['memberid']; ?>
" class="memberId" />
                <label for='score'>*分值:</label>
                <input type='text' id='score' name='score' value='' /><br />
                <input type='button' id='sbutton' value='提交' />
            </form>
        </div>
   </div>
        <!--分配积分弹出层 end-->
   
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

<script type="text/javascript">
                $(function(){
                    //ajax提交验证
                     $("#sbutton").click(function(){
                         var memId = $(".memberId").val();
                         var score = $("input[name='score']").val();
                         if(/^[\s]*$/.test(score)){
                            alert('请填写分配分值！');
                            return false;
                          }
                          if(!(/^[\d]*$/.test(score))){
                            alert('分值必须为数字！');
                            return false;
                          }                          
                          if(confirm('确定要提交吗？')){
                                //ajax提交信息并验证
                                $.post(
                                    "index.php?module=blogger&action=BloggerManage&act=ajax_subScore",
                                    {memId:memId,score:score},
                                    function(data){
                                        if(data.status==1){
                                            window.parent.mainFrame.location.href = 'index.php?module=blogger&action=BloggerManage&act=memberDetail&isactive=memScore&memberId='+memId;
                                        }else{
                                            alert('提交失败');
                                        }
                                    },
                                    'json'
                                );                                
                          }
                     })        
                })
</script>
</body>
    
</html>