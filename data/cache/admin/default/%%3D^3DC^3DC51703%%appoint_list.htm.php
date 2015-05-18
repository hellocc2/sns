<?php /* Smarty version 2.6.18, created on 2014-04-16 10:01:30
         compiled from appoint_list.htm */ ?>
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

							<li><a href="#">预约管理</a></li>

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
                                        <div class="btn-group">

    										<button id="delChoose" class="btn red">
    
    										删除所选 <i class="icon-minus"></i>
    
    										</button>

									   </div>
                                
                                        
									
                                        <div style="float: right;">
                                        
                                            <form action="index.php?module=appointment&action=AppointManage" method="post">
                                                
                                                <input type="text" <?php if ($this->_tpl_vars['so_array']['stime']): ?> value="<?php echo $this->_tpl_vars['so_array']['stime']; ?>
" <?php else: ?> value="选择预约时间进行搜索" <?php endif; ?> name="stime" style="width:140px;" onfocus="if(this.value=='选择预约时间进行搜索'){this.value='';}"  onblur="if(this.value==''){this.value='选择预约时间进行搜索';}"/>
                                                
                                                <input type="text" <?php if ($this->_tpl_vars['so_array']['suname']): ?> value="<?php echo $this->_tpl_vars['so_array']['suname']; ?>
" <?php else: ?> value="输入姓名进行搜索" <?php endif; ?> name="suname" style="width:200px;" onfocus="if(this.value=='输入姓名进行搜索'){this.value='';}"  onblur="if(this.value==''){this.value='输入姓名进行搜索';}"/>
                                                
                                                <input type="submit" name="sub" value="搜索"/>
                                            
                                            </form>
                                        
                                        </div>                                        
                                        
								</div>
                                <form method="post" action="index.php?module=appointment&action=AppointManage&act=delChoosed"  name="form" id="del_form">
								<table class="table table-striped table-bordered table-hover" id="sample_1">

									<thead>

										<tr>

											<th style="width:8px;"><input type="checkbox" class="checkall"  /></th>

											<th>姓名</th>
                                            
                                            <th class="hidden-480">Email</th>

											<th class="hidden-480">预约时间</th>

											<th class="hidden-480">联系电话</th>

											<th class="hidden-480">状态</th>

											<th >操作</th>

										</tr>

									</thead>

									<tbody>
                                        <?php if ($this->_tpl_vars['user_data']): ?>
                                        <?php $_from = $this->_tpl_vars['user_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
										<tr class="odd gradeX">

											<td><input type="checkbox" name="idarray[]" value="<?php echo $this->_tpl_vars['user']['id']; ?>
" class="idarray"  /></td>

											<td><?php echo $this->_tpl_vars['user']['username']; ?>
</td>
                                            
                                            <td class="hidden-480"><?php echo $this->_tpl_vars['user']['email']; ?>
</td>
                                            
                                            <td  class="hidden-480"><?php echo $this->_tpl_vars['user']['appoint_time']; ?>
</td>                                         
											
                                            <td class="hidden-480"><?php echo $this->_tpl_vars['user']['phone']; ?>
</td>

											<td class="hidden-480">
                                                    <?php if ($this->_tpl_vars['user']['confirm_status'] == 1): ?>
                                                    <font color="green">已确认</font>
                                                    <?php elseif ($this->_tpl_vars['user']['confirm_status'] == 2): ?>
                                                    <font color="blue">未确认</font>
                                                    <?php else: ?>
                                                    <font color="red">无效</font>
                                                    <?php endif; ?>
                                            </td>

											<td >
                                                <a class="btn mini purple thickbox editApp" lid="<?php echo $this->_tpl_vars['user']['id']; ?>
" href="#TB_inline?height=400&width=600&inlineId=editAppoint"><i class="icon-edit"></i> Edit</a>
                                                &nbsp;&nbsp;
                                                <a class="btn mini black" onclick="delSingle('<?php echo $this->_tpl_vars['user']['id']; ?>
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
        <!--编辑弹出层 start-->
        <div id="editAppoint" style="display:none;">
            <p style="text-align: center;color:orange;"><b>查看预约</b></p>
            <div style="text-align:center;" class="tappend"></div>
        </div>
        <!--编辑弹出层 end-->


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer_div.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<style type="text/css">
    label{
    float: left;
    width: 80px;
    }
    form{margin:0px}
    input{
    width: 280px;
    border:1px solid #808080
    }
    
    textarea{
    width: 280px;
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
</style>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">

      $(function(){
        
        //开始搜索时间
        $("input[name='stime']").datepicker();
        
        $(".editApp").click(function(){
            var id = $(this).attr( 'lid' );
            var html_data = "<form action='index.php?module=appointment&action=AppointManage&act=sub_appointment' method='post' id='app_form'>";
            //取得预约数据
            $.post("index.php?module=appointment&action=AppointManage&act=ajax_getAppoint", 
                    { id:id},
                    function(data){
                       if(data.status=='1'){
                            var appoint = data.detail;
                                                        
                            html_data+="<input type='hidden' name='appid' value='"+appoint.id+"' />"+
                                "<label for='user'>顾客姓名:</label>"+
                                "<input type='text' id='user' name='user' value='"+appoint.username+"' /><br />"+
                                "<label for='user'>预约时间:</label>"+
                                "<input type='text' name='apptime' value='"+appoint.appoint_time+"' id='chooseDate'/><br />"+
                                "<label for='email'>电话:</label>"+
                                "<input type='text' id='phone' name='phone' value='"+appoint.phone+"' /><br />"+
                                "<label for='email'>Email:</label>"+
                                "<input type='text' id=email name='email' value='"+appoint.email+"' /><br />"+
                                "<label for='email'>操作:</label>"+
                                "<input type='radio' id='confirm1' name='confirm_sta' value='1' />已确认&nbsp;&nbsp;&nbsp;&nbsp;"+
                                "<input type='radio' id='confirm2' name='confirm_sta' value='2' />未确认&nbsp;&nbsp;&nbsp;&nbsp;"+
                                "<input type='radio' id='confirm3' name='confirm_sta' value='0' />无效<br/>"+
                                "<label for='comment'>备注:</label>"+
                                "<textarea id=remark name='remark'>"+appoint.remark+"</textarea><br/>"+
                                "<input type='button' id='sbutton' value='提交' /><br />";
                            html_data+="</form><br/>";
                            $(".tappend").html(html_data);
                            
                            if(appoint.confirm_status==1){
                                $("#confirm1").attr("checked","checked");
                            }else if(appoint.confirm_status==2){
                                 $("#confirm2").attr("checked","checked");
                            }else if(appoint.confirm_status==0){
                                 $("#confirm3").attr("checked","checked");
                            };
                            
                            $('#chooseDate').datetimepicker({
                        	    showSecond: true,
                        	    //showMillisec: true,
                        	    timeFormat: 'hh:mm:ss'
                             });
                             
                             $("#sbutton").click(function(){
                                    var username = $("#user").val();
                                    var apptime = $('#chooseDate').val(); 
                                    var phone = $('#phone').val(); 
                                    var email = $('#email').val(); 
                                    //alert(apptime);                                  
                                　　if(!(/^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){4,19}$/.test(username))){
　　                                      alert('顾客名只能由字母、数字或者下划线组成,并且只能以字母开头！');
　　                                      return false;
                                        }
                                    if(apptime=='0000-00-00 00:00:00'){
　　                                      alert('请选择正确的预约时间！');
　　                                      return false;
                                        }
                                        
                                    if(!(/\d{7,15}$/.test(phone))){
　　                                      alert('请输入正确的电话号码！');
　　                                      return false;
                                        }
                                        
                                    if( !(/^[\s]*$/.test(email)) && !(/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/.test(email))){
　　                                      alert('请输入正确Email地址！');
　　                                      return false;
                                        }
                                    
                                    if(confirm('确定要提交吗？')){
                                        $("#app_form").submit();
                                    }
                                    
                             })
                             
                            
                       }else{
                            alert('操作失败！');
                       }
                    },
                    "json"
                    );
                    
        });
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
            $.post("index.php?module=appointment&action=AppointManage&act=delSingle", 
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