<?php /* Smarty version 2.6.18, created on 2014-03-12 14:35:10
         compiled from wish_list.htm */ ?>
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

							后台管理系统 <small>心愿管理</small>

						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.php?module=appointment&action=AppointManage">首页</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="#">心愿管理</a></li>

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

							<div class="portlet-title">

								<div class="caption"><i class="icon-globe"></i>Managed Table</div>

								<div class="tools">

									<a href="javascript:;" class="collapse"></a>

								</div>

							</div>

							<div class="portlet-body">

								<div class="clearfix">
                                        <div class="btn-group">

    										<button id="delChoose" class="btn red">
    
    										删除所选 <i class="icon-minus"></i>
    
    										</button>

									   </div>
                                
                                        
									
                                        <div style="float: right;">
                                        
                                            <form action="index.php?module=wish&action=WishList" method="post">
                                                
                                                <input type="text" <?php if ($this->_tpl_vars['so_array']['stime']): ?> value="<?php echo $this->_tpl_vars['so_array']['stime']; ?>
" <?php else: ?> value="选择预约时间进行搜索" <?php endif; ?> name="stime" style="width:140px;" onfocus="if(this.value=='选择预约时间进行搜索'){this.value='';}"  onblur="if(this.value==''){this.value='选择预约时间进行搜索';}"/>
                                                
                                                <input type="text" <?php if ($this->_tpl_vars['so_array']['suname']): ?> value="<?php echo $this->_tpl_vars['so_array']['suname']; ?>
" <?php else: ?> value="输入姓名进行搜索" <?php endif; ?> name="suname" style="width:200px;" onfocus="if(this.value=='输入姓名进行搜索'){this.value='';}"  onblur="if(this.value==''){this.value='输入姓名进行搜索';}"/>
                                                
                                                <input type="submit" name="sub" value="搜索"/>
                                            
                                            </form>
                                        
                                        </div>                                        
                                        
								</div>
                                <form method="post" action="index.php?module=wish&action=WishList&act=delChoosed"  name="form" id="del_form">
								<table class="table table-striped table-bordered table-hover" id="sample_1">

									<thead>

										<tr>

											<th style="width:8px;"><input type="checkbox" class="checkall"  /></th>

											<th>姓名</th>
                                            
                                            <th class="hidden-480">Email</th>

											<th class="hidden-480">选择时间</th>

											<th class="hidden-480">所选商品ID</th>

											<th >操作</th>

										</tr>

									</thead>

									<tbody>
                                        <?php if ($this->_tpl_vars['wish_data']): ?>
                                        <?php $_from = $this->_tpl_vars['wish_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['wish']):
?>
										<tr class="odd gradeX">

											<td><input type="checkbox" name="idarray[]" value="<?php echo $this->_tpl_vars['wish']['id']; ?>
" class="idarray"  /></td>

											<td><?php echo $this->_tpl_vars['wish']['username']; ?>
</td>
                                            
                                            <td class="hidden-480"><?php echo $this->_tpl_vars['wish']['email']; ?>
</td>
                                            
                                            <td  class="hidden-480"><?php echo $this->_tpl_vars['wish']['time']; ?>
</td>                                         
											
                                            <td class="hidden-480"><?php echo $this->_tpl_vars['wish']['product_ids']; ?>
</td>

											<td >
                                                <a class="btn mini green" href="index.php?module=wish&action=WishDetail&uname=<?php echo $this->_tpl_vars['wish']['username']; ?>
&ids=<?php echo $this->_tpl_vars['wish']['product_ids']; ?>
"><i class="icon-list"></i> View</a>
                                                &nbsp;&nbsp;
                                                <a class="btn mini black" onclick="delSingle('<?php echo $this->_tpl_vars['wish']['id']; ?>
')" href="javascript:void(0)"><i class="icon-trash"></i>Delete</a>
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
      $(function(){
        
        //开始搜索时间
        $("input[name='stime']").datepicker();
        
    });
    
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
    
    //删除选中项目
$(function(){
    $('#delChoose').click(function(){
        var check = checked();
        if(!confirm('确定要删除选中项吗？')){
             return false;
        }
        
        if(check==true){
           $("#del_form").submit();
        }else{
            alert('请至少选择一项');
            return false;
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
    
//单独删除
 function delSingle(id){
        if(confirm("确定删除该顾客吗？")){
            $.post("index.php?module=wish&action=WishList&act=delSingle", 
                    { id:id},
                    function(data){
                       if(data.status=='1'){
                            //alert('操作成功！');
                            window.parent.mainFrame.location.reload();
                       }else{
                            alert('操作失败！');
                       }
                    },
                    "json"
                    );
        }
    }
    
    
</script>
</body>
    
</html>