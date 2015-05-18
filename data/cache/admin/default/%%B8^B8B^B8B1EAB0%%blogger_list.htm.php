<?php /* Smarty version 2.6.18, created on 2014-05-13 09:44:56
         compiled from blogger_list.htm */ ?>
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

							<li><a href="#">用户管理</a></li>

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>

				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->

				<div class="row-fluid">

					<div class="span12">

						<!-- BEGIN EXAMPLE TABLE PORTLET-->

						<div class="portlet box light-grey">							

							<div class="portlet-body">

								<div class="clearfix">
                                        
                                        <div style="float: right;">
                                        
                                            <form action="index.php?module=blogger&action=BloggerManage" method="post">
                                                
                                                <input type="text" <?php if ($this->_tpl_vars['so_array']['suname']): ?> value="<?php echo $this->_tpl_vars['so_array']['suname']; ?>
" <?php else: ?> value="输入姓名进行搜索" <?php endif; ?> name="suname" style="width:200px;" onfocus="if(this.value=='输入姓名进行搜索'){this.value='';}"  onblur="if(this.value==''){this.value='输入姓名进行搜索';}"/>
                                                
                                                <input type="submit" name="sub" value="搜索"/>
                                            
                                            </form>
                                        
                                        </div>                                        
                                        
								</div>
                                <form method="post" action="index.php?module=blogger&action=BloggerManage&act=delChoosed"  name="form" id="del_form">
								<table class="table table-striped table-bordered table-hover" id="sample_1">

									<thead>

										<tr>

											<th style="width:8px;"><input type="checkbox" class="checkall"  /></th>

											<th>姓名</th>
                                            
                                            <th class="hidden-480">性别</th>

											<th class="hidden-480">博客地址</th>

											<th class="hidden-480">当前积分</th>

											<th >操作</th>

										</tr>

									</thead>

									<tbody>
                                        <?php if ($this->_tpl_vars['member_info']): ?>
                                        <?php $_from = $this->_tpl_vars['member_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['minfo']):
?>
										<tr class="odd gradeX">

											<td><input type="checkbox" name="idarray[]" value="<?php echo $this->_tpl_vars['minfo']['MemberId']; ?>
" class="idarray"  /></td>

											<td><?php echo $this->_tpl_vars['minfo']['MemberUserName']; ?>
</td>
                                            
                                            <td class="hidden-480">
                                                <?php if ($this->_tpl_vars['minfo']['MemberSex'] == 'Women'): ?>
                                                    女                                                
                                                <?php else: ?>
                                                    男
                                                <?php endif; ?>
                                            </td>
                                            
                                            <td  class="hidden-480">
                                                <?php if ($this->_tpl_vars['minfo']['blogs']): ?>
                                                <?php $_from = $this->_tpl_vars['minfo']['blogs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['blog']):
?>
                                                    <p><a href="http://<?php echo $this->_tpl_vars['blog']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['blog']['url']; ?>
</a></p>
                                                <?php endforeach; endif; unset($_from); ?>
                                                <?php else: ?>
                                                <font color="red">尚未完善</font>
                                                <?php endif; ?>
                                            </td>                                         

											<td class="hidden-480">
                                                <?php if ($this->_tpl_vars['minfo']['score']): ?>
                                                    <?php echo $this->_tpl_vars['minfo']['score']; ?>

                                                <?php else: ?>
                                                <font color="red">无</font>
                                                <?php endif; ?>
                                            </td>

											<td >
                                                <a class="btn mini green" href="index.php?module=blogger&action=BloggerManage&act=memberDetail&memberId=<?php echo $this->_tpl_vars['minfo']['MemberId']; ?>
"><i class="icon-list"></i> 查看</a>
                                            </td>

										</tr>
										<?php endforeach; endif; unset($_from); ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="7" style="text-align: center;"><font color='red'>对不起，没有相关记录！</font></td>
                                        </tr>
                                        <?php endif; ?>

									</tbody>

								</table>
                                </form>
                                <div class="row-fluid">
                                    <div class="pagination"><?php echo $this->_tpl_vars['page']; ?>
</div>
                                </div>

							</div>

						</div>

						<!-- END EXAMPLE TABLE PORTLET-->

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
<script type="text/javascript">    
    //全选并改变样式
  
$(document).ready(function(){
    $('.checkall').click(function(){
        
        var flag = $(this).attr('checked');
        if(flag=='checked'){
            $('.idarray').attr('checked','checked');
            $('.checker span').addClass('checked');
        }else{
            $('.idarray').removeAttr('checked');
            $('.checker span').removeClass('checked');
        }
    })
}) 

function checked(){ 
        var isChecked = false; 
        $(".idarray").each(function(){ 
                    if($(this).attr("checked")==true || $(this).attr("checked")=="checked"){ 
                    isChecked=true; 
                    return;} 
            })
        return isChecked; 
    }     
    
</script>
</body>
    
</html>