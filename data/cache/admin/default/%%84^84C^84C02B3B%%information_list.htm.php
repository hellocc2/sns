<?php /* Smarty version 2.6.18, created on 2014-04-21 13:25:47
         compiled from information_list.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'information_list.htm', 110, false),)), $this); ?>
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

							<li><a href="#">信息管理</a></li>

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
                                        
                                            <form action="index.php?module=information&action=InformationManage" method="post">
                                                
                                                <input type="text" <?php if ($this->_tpl_vars['so_array']['suname']): ?> value="<?php echo $this->_tpl_vars['so_array']['suname']; ?>
" <?php else: ?> value="输入用户姓名进行搜索" <?php endif; ?> name="suname" style="width:200px;" onfocus="if(this.value=='输入用户姓名进行搜索'){this.value='';}"  onblur="if(this.value==''){this.value='输入用户姓名进行搜索';}"/>
                                                
                                                <input type="submit" name="sub" value="搜索"/>
                                            
                                            </form>
                                        
                                        </div>                                        
                                        
								</div>
                                <form method="post" action="index.php?module=information&action=InformationManage&act=delChoosed"  name="form" id="del_form">
								<table class="table table-striped table-bordered table-hover" id="sample_1">

									<thead>

										<tr>

											<th style="width:8px;"><input type="checkbox" class="checkall"  /></th>

											<th>用户姓名</th>
                                            
                                            <th class="hidden-480">信息内容</th>

											<th class="hidden-480">提交日期</th>

											<th >操作</th>

										</tr>

									</thead>

									<tbody>
                                        <?php if ($this->_tpl_vars['information']): ?>
                                        <?php $_from = $this->_tpl_vars['information']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
										<tr class="odd gradeX">

											<td><input type="checkbox" name="idarray[]" value="<?php echo $this->_tpl_vars['info']['id']; ?>
" class="idarray"  /></td>

											<td><?php echo $this->_tpl_vars['info']['MemberUserName']; ?>
</td>
                                            
                                            <td class="hidden-480"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, '50') : smarty_modifier_truncate($_tmp, '50')); ?>
</td>                                      
											
                                            <td class="hidden-480"><?php echo $this->_tpl_vars['info']['gmt_create']; ?>
</td>

											<td >
                                                <a class="btn mini green" href="index.php?module=information&action=InformationManage&act=infoDetail&info_id=<?php echo $this->_tpl_vars['info']['id']; ?>
"><i class="icon-list"></i> 查看</a>
                                                &nbsp;&nbsp;
                                                <a class="btn mini black" onclick="delSingle('<?php echo $this->_tpl_vars['info']['id']; ?>
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

<script type="text/javascript">

      $(function(){
        
        //开始搜索时间
        //$("input[name='stime']").datepicker();

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
        if(confirm("确定删除吗？")){
            $.post("index.php?module=information&action=InformationManage&act=delSingle", 
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