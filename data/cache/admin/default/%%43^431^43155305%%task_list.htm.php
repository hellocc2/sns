<?php /* Smarty version 2.6.18, created on 2014-04-21 18:32:01
         compiled from task_list.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'task_list.htm', 130, false),)), $this); ?>
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

							<li><a href="#">任务设置</a></li>

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
                                       
                                       <div class="btn-group">
                                        
                                        <a lid='0' class="thickbox editTk" href="#TB_inline?&width=400&height=200&inlineId=editTask">

    										<button class="btn green">
    
    										新增 <i class="icon-plus"></i>
    
    										</button>
                                            
                                        </a>

									   </div>
                                
                                        
									
                                        <!--<div style="float: right;">
                                        
                                            <form action="index.php?module=task&action=TaskManage" method="post">
                                                
                                                <input type="text" <?php if ($this->_tpl_vars['so_array']['sname']): ?> value="<?php echo $this->_tpl_vars['so_array']['sname']; ?>
" <?php else: ?> value="输入任务名称进行搜索" <?php endif; ?> name="sname" style="width:200px;" onfocus="if(this.value=='输入任务名称进行搜索'){this.value='';}"  onblur="if(this.value==''){this.value='输入任务名称进行搜索';}"/>
                                                
                                                <input type="submit" name="sub" value="搜索"/>
                                            
                                            </form>
                                        
                                        </div>-->                                        
                                        
								</div>
                                <form method="post" action="index.php?module=task&action=TaskManage&act=delChoosed"  name="form" id="del_form">
								<table class="table table-striped table-bordered table-hover" id="sample_1">

									<thead>

										<tr>

											<th style="width:8px;"><input type="checkbox" class="checkall"  /></th>

											<th>任务名称</th>
                                            
                                            <th class="hidden-480">任务类型</th>

											<th class="hidden-480">任务步骤</th>

											<th class="hidden-480">任务分值</th>

											<th >操作</th>

										</tr>

									</thead>

									<tbody>
                                        <?php if ($this->_tpl_vars['task']): ?>
                                        <?php $_from = $this->_tpl_vars['task']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tk']):
?>
										<tr class="odd gradeX">

											<td><input type="checkbox" name="idarray[]" value="<?php echo $this->_tpl_vars['tk']['id']; ?>
" class="idarray"  /></td>

											<td><?php echo $this->_tpl_vars['tk']['name']; ?>
</td>
                                            
                                            <td class="hidden-480"><?php echo $this->_tpl_vars['taskTypeOne'][$this->_tpl_vars['tk']['type']]; ?>
</td>                                      
											
                                            <td style="word-break:break-all;" width="30%" title="<?php echo $this->_tpl_vars['tk']['step']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['tk']['step'])) ? $this->_run_mod_handler('truncate', true, $_tmp, '80') : smarty_modifier_truncate($_tmp, '80')); ?>
</td>

											<td class="hidden-480"><?php echo $this->_tpl_vars['tk']['score']; ?>
</td>

											<td >
                                                <a class="btn mini purple thickbox editTk" lid="<?php echo $this->_tpl_vars['tk']['id']; ?>
" href="#TB_inline?&width=400&height=200&inlineId=editTask"><i class="icon-edit"></i> Edit</a>
                                                &nbsp;&nbsp;
                                                <a class="btn mini black" onclick="delSingle('<?php echo $this->_tpl_vars['tk']['id']; ?>
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
        <div id="editTask" style="display:none;">
            <p style="text-align: center;color:orange;"><b>添加/编辑任务</b></p>
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
    width: 230px;
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--引入ajaxfileupload上传插件-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
/js/ajaxfileupload.js"></script>

<script type="text/javascript">

      $(function(){
        
        //开始搜索时间
        //$("input[name='stime']").datepicker();
        
        $(".editTk").click(function(){
            
                     var id = $(this).attr( 'lid' ); //编辑
                               
                     var html_data = "<form action='' method='post' id='product_form'>"+
                                      "<input type='hidden' value='' class='editId'/>"+
                                      "<label for='taskName'>*任务名称:</label>"+
                                      "<input type='text' id='taskName' name='taskName' value='' /><br />"+
                                      "<label for='type'>*任务类型:</label>"+
                                      "<select name='type'>"+
                                      "<?php $_from = $this->_tpl_vars['taskType']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ttype']):
?>"+
                                      "<option value='<?php echo $this->_tpl_vars['ttype']['val']; ?>
' class='type_<?php echo $this->_tpl_vars['ttype']['val']; ?>
'><?php echo $this->_tpl_vars['ttype']['name']; ?>
</option>"+
                                      "<?php endforeach; endif; unset($_from); ?>"+
                                      "</select><br />"+                                       
                                      "<label for='taskScore'>*任务分值:</label>"+
                                      "<input type='text' id='taskScore' name='taskScore' value='' /><br />"+                                      
                                      "<input type='button' id='sbutton' value='提交' /><br />";
                     html_data+="</form><br/>";
                     $(".tappend").html(html_data);
                     
                     //编辑
                     if(id!=='0'){
                        //ajax取得广告信息
                        $.post(
                            "index.php?module=task&action=TaskManage&act=ajax_getTask",
                            {id:id},
                            function(data){
                                if(data.status==1){
                                    var e_name = data.detail.name;
                                    var e_type = data.detail.type;
                                    var e_score = data.detail.score;
                                    $(".editId").val(id);                                   
                                    $("#taskName").val(e_name);
                                    $("select[name='type']").find("option[value='"+e_type+"']").attr("selected",true);
                                    $("#taskScore").val(e_score);                                    
                                }else{
                                    alert('false');
                                }
                            },
                            'json'
                        );
                     };                    
                     
                     
                     //ajax提交验证
                     $("#sbutton").click(function(){
                         var taskId = $(".editId").val();
                         var name = $("#taskName").val();
                         var type = $("select[name='type']").val();
                         var score = $("input[name='taskScore']").val();
                         if(/^[\s]*$/.test(name)){
                            alert('请填写任务名称');
                            return false;
                          }
                          if(/^[\s]*$/.test(score)){
                            alert('请填写任务分值');
                            return false;
                          }                          
                          if(confirm('确定要提交吗？')){
                                //ajax提交信息并验证
                                $.post(
                                    "index.php?module=task&action=TaskManage&act=ajax_subTask",
                                    {name:name,type:type,score:score,taskId:taskId},
                                    function(data){
                                        if(data.status==1){
                                            window.parent.mainFrame.location.reload();
                                        }else{
                                            alert('提交失败');
                                        }
                                    },
                                    'json'
                                );                                
                          }
                     })
                
                    
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
        if(check==true){
            if(confirm('确定要删除选中项吗？')){
                $("#del_form").submit();
            }           
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
        if(confirm("删除任务会同时删除任务下面所属的步骤，确定吗？")){
            $.post("index.php?module=task&action=TaskManage&act=delSingle", 
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