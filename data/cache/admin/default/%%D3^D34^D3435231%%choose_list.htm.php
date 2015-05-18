<?php /* Smarty version 2.6.18, created on 2014-03-12 14:36:43
         compiled from choose_list.htm */ ?>
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

							后台管理系统 <small>查看商品</small>

						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="index.php?module=appointment&action=AppointManage">首页</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="#">查看商品</a></li>

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
                                        <div class="btn-group" style="float: left;">
                                        
                                            <button class="btn green" style="cursor:default;">                                            
                                                设备选择：
                                            </button>
                                            
                                        </div>
                                        
                                        <div style="float: left;">
                                            
                                            <select name="device_id" style="width: 100px;height:34px;font-size:18px; color: green;">
                                            
                                                <?php $_from = $this->_tpl_vars['device_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['device']):
?>
                                                <option <?php if ($this->_tpl_vars['deviceId'] == $this->_tpl_vars['device']['id']): ?>selected='selected'<?php endif; ?> value="<?php echo $this->_tpl_vars['device']['id']; ?>
"><?php echo $this->_tpl_vars['device']['name']; ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                                
                                            </select> 
                                                                                       
                                        </div>                                                                    
                                        
	                                    <div class="btn-group" style="float: right;">

    										<button id="delChoose" class="btn red">
    
    										清空 <i class="icon-minus"></i>
    
    										</button>

									    </div>
                                        <!--<div style="float: right;">
                                        
                                            <form action="index.php?module=appointment&action=AppointManage" method="post">
                                                
                                                <input type="text" <?php if ($this->_tpl_vars['so_array']['stime']): ?> value="<?php echo $this->_tpl_vars['so_array']['stime']; ?>
" <?php else: ?> value="选择预约时间进行搜索" <?php endif; ?> name="stime" style="width:140px;" onfocus="if(this.value=='选择预约时间进行搜索'){this.value='';}"  onblur="if(this.value==''){this.value='选择预约时间进行搜索';}"/>
                                                
                                                <input type="text" <?php if ($this->_tpl_vars['so_array']['suname']): ?> value="<?php echo $this->_tpl_vars['so_array']['suname']; ?>
" <?php else: ?> value="输入姓名进行搜索" <?php endif; ?> name="suname" style="width:200px;" onfocus="if(this.value=='输入姓名进行搜索'){this.value='';}"  onblur="if(this.value==''){this.value='输入姓名进行搜索';}"/>
                                                
                                                <input type="submit" name="sub" value="搜索"/>
                                            
                                            </form>
                                        
                                        </div>-->                                        
                                        
								</div>
                                <form method="post" action="index.php?module=choosed&action=ChooseList&act=delChoosed"  name="form" id="del_form">
								<input type="hidden" name="device_id" value="<?php echo $this->_tpl_vars['deviceId']; ?>
"/>
                                <table class="table table-striped table-bordered table-hover" id="sample_1">

									<thead>

										<tr>

											<th style="width:8px;"><input type="checkbox" class="checkall"  /></th>

											<th>商品ID</th>
                                            
                                            <th class="hidden-480">商品位置</th>

											<th class="hidden-480">商品图片</th>

											<th >操作</th>

										</tr>

									</thead>

									<tbody>
                                        <?php if ($this->_tpl_vars['product_data']): ?>
                                        <?php $_from = $this->_tpl_vars['product_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product']):
?>
										<tr class="odd gradeX">

											<td><input type="checkbox" name="idarray[]" value="<?php echo $this->_tpl_vars['product']['id']; ?>
" class="idarray"  /></td>

											<td><a href="<?php echo $this->_tpl_vars['product']['front_url']; ?>
" target="_blank" title="点击跳转到商品详细页"><?php echo $this->_tpl_vars['product']['product_id']; ?>
</a></td>
                                            
                                            <td class="hidden-480"><?php echo $this->_tpl_vars['product']['product_position']; ?>
</td>
                                            
                                            <td  class="hidden-480"><img src="<?php echo $this->_tpl_vars['product']['img_url']; ?>
" width="50" height="100" /></td>                                       

											<td>
                                                <a class="btn mini black" onclick="delSingle('<?php echo $this->_tpl_vars['product']['id']; ?>
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
        
        $("select[name='device_id']").change(function(){
                var deviceId = $(this).val();
                if(deviceId!=''){
                   	var url = '?module=choosed&action=ChooseList'; //AJAX提交不能跨域，所以提交给百度会失败。
            		$.post(
            			url, //接收回传数据地址
            			{'device_id':deviceId},//发送的数据
            			function(data){ //处理返回结果
            				window.location="?module=choosed&action=ChooseList&device_id="+deviceId;
            			});
                    }
              })
            
                
    
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
        if(confirm("确定删除该商品吗？")){
            $.post("index.php?module=choosed&action=ChooseList&act=delSingle", 
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