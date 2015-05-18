<?php /* Smarty version 2.6.18, created on 2014-05-14 16:49:40
         compiled from product_list.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
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
    
    select{
    padding:0px 0px;
    width: 230px;
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
    
    #import_sub{
    margin-left: 80px;
    margin-top: 5px;
    width:80px;
    }
    
    br{
    clear: left;
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

							<li><a href="#">商品管理</a></li>

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
                                        
                                        <a lid='0' class="thickbox editApp" href="#TB_inline?&width=400&height=300&inlineId=editAppoint">

    										<button id="delChoose" class="btn green">
    
    										新增 <i class="icon-plus"></i>
    
    										</button>
                                            
                                        </a>

									   </div>
                                       
                                        <div class="btn-group">
                                        
                                        <a lid='0' class="thickbox importData" href="#TB_inline?&width=400&height=150&inlineId=importData">

    										<button id="delChoose" class="btn orange">
    
    										导入 <i class="icon-plus"></i>
    
    										</button>
                                            
                                        </a>

									   </div>
                                        
									
                                        <div style="float: right;">
                                        
                                            <form action="index.php?module=product&action=ProductManage" method="post">
                                                
                                                <select name="categoryId">
                                                
                                                     <option value="" selected="selected">请选择分类进行搜索</option>                                                
                                                    <?php $_from = $this->_tpl_vars['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate']):
?>                                                   
                                                    <option <?php if ($this->_tpl_vars['so_array']['categoryId'] == $this->_tpl_vars['cate']['categoryId']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['cate']['categoryId']; ?>
"><?php echo $this->_tpl_vars['cate']['categoryName']; ?>
</option>
                                                    <?php endforeach; endif; unset($_from); ?>
                                                
                                                </select>
                                                
                                                <input type="text" <?php if ($this->_tpl_vars['so_array']['productId']): ?> value="<?php echo $this->_tpl_vars['so_array']['productId']; ?>
" <?php else: ?> value="输入商品ID搜索" <?php endif; ?> name="productId" style="width:200px;" onfocus="if(this.value=='输入商品ID搜索'){this.value='';}"  onblur="if(this.value==''){this.value='输入商品ID搜索';}"/>
                                                
                                                <input type="submit" name="sub" value="搜索"/>
                                            
                                            </form>
                                        
                                        </div>                                        
                                        
								</div>
                                <form method="post" action="index.php?module=product&action=ProductManage&act=delChoosed"  name="form" id="del_form">
								<table class="table table-striped table-bordered table-hover" id="sample_1">

									<thead>

										<tr>

											<th style="width:8px;"><input type="checkbox" class="checkall"  /></th>

											<th>商品ID</th>
                                            
                                            <!--<th class="hidden-480">所属站点</th>-->

											<th class="hidden-480">所属分类</th>

											<th class="hidden-480">商品积分</th>

											<th >操作</th>

										</tr>

									</thead>

									<tbody>
                                        <?php if ($this->_tpl_vars['productList']): ?>
                                        <?php $_from = $this->_tpl_vars['productList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product']):
?>
										<tr class="odd gradeX">

											<td><input type="checkbox" name="idarray[]" value="<?php echo $this->_tpl_vars['product']['id']; ?>
" class="idarray"  /></td>

											<td><a href="http://www.milanoo.com/p<?php echo $this->_tpl_vars['product']['productId']; ?>
.html" target="_blank"><?php echo $this->_tpl_vars['product']['productId']; ?>
</a></td>
                                                                                        
                                            <td  class="hidden-480"><?php echo $this->_tpl_vars['product']['categoryName']; ?>
</td>                                         
											
                                            <td class="hidden-480"><?php echo $this->_tpl_vars['product']['score']; ?>
</td>
											
											<td >
                                                <a class="btn mini purple thickbox editApp" lid="<?php echo $this->_tpl_vars['product']['id']; ?>
" href="#TB_inline?height=400&width=600&inlineId=editAppoint"><i class="icon-edit"></i> Edit</a>
                                                &nbsp;&nbsp;
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
        <!--编辑弹出层 start-->
        <div id="editAppoint" style="display:none;">
            <p style="text-align: center;color:orange;"><b>添加/编辑商品</b></p>
            <div style="text-align:center;" class="tappend"></div>
        </div>
        <!--编辑弹出层 end-->
        
        <!--导入弹出层 start-->
        <div id="importData" style="display:none;">
            <p style="text-align: center;color:orange;"><b>导入商品</b></p>
            <div style="text-align:center;">                
                <label for='importFile'>*导入商品:</label>
                <input type='file' id='importFile'  name='importFile'/><br /><br />
                <input type='button' id='import_sub' value='提交' />
            </div>
        </div>
        <!--导入弹出层 end-->


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
        
        $(".editApp").click(function(){
            var id = $(this).attr( 'lid' );
            if(id!=='0'){   //id不为空，编辑
                var html_data = " ";
                //取得商品数据
                $.post("index.php?module=product&action=ProductManage&act=ajax_getProduct", 
                        { id:id},
                        function(data){
                           if(data.status=='1'){
                                var product = data.detail;                           
                                html_data+="<input type='hidden' name='id' value='"+product.id+"' />"+
                                    "<label for='productId'>*商品ID:</label>"+
                                    "<input type='text' disabled='disabled' id='productId' name='productId' value='"+product.product_id+"' /><br />"+
                                    "<label for='credits'>*对应积分:</label>"+
                                    "<input type='text' name='credits' value='"+product.score+"' id='credits'/><br />"+                                                                       
                                    "<input type='button' id='sbutton' value='提交' /><br />";
                                 $(".tappend").html(html_data);
                                 $("#sbutton").click(function(){
                                       var credits = $('#credits').val();
                                       var soCategoryId='<?php echo $this->_tpl_vars['so_array']['categoryId']; ?>
';
                                       var soProductId = '<?php echo $this->_tpl_vars['so_array']['productId']; ?>
';                                                                         
                                    　　if(/^[\s]*$/.test(credits)){
                                                alert('积分必填');
                                            return false;
                                          }
                                          if(confirm('确定要提交吗？')){
                                                 //ajax提交并验证
                                                    $.post(
                                                        "index.php?module=product&action=ProductManage&act=sub_product",
                                                        {credits:credits,id:id},
                                                        function(data){
                                                            if(data.status==1){
                                                                 if(soCategoryId||soProductId){
                                                                        $("input[type='submit']").click();
                                                                    }else{
                                                                        window.parent.mainFrame.location.reload();
                                                                    }
                                                            }
                                                        },
                                                        'json'
                                                    );
                                          }                                        
                                 })
                                 
                                
                           }else{
                                alert('操作失败！');
                           }
                        },
                        "json"
                        );
            }else{
                     var html_data = "<label for='productId'>*商品ID:</label>"+
                                      "<textarea id='productId' name='productId'/></textarea/>"+
                                      "<p><span style='color:red;font-size:12px;'>多个商品ID请用英文“,”逗号隔开</span></p>"+
                                      "<label for='credits'>*对应积分:</label>"+
                                      "<input type='text' id='credits' name='credits' value='' /><br />"+                                                       
                                      "<input type='button' id='sbutton' value='提交' /><br />";
                     $(".tappend").html(html_data);
                     $("#sbutton").click(function(){                         
                         var productId = $("#productId").val();
                         var credits = $('#credits').val();
                         var soCategoryId='<?php echo $this->_tpl_vars['so_array']['categoryId']; ?>
';
                         var soProductId = '<?php echo $this->_tpl_vars['so_array']['productId']; ?>
'; 
                         if(/^[\s]*$/.test(productId)){
                            alert('商品ID必填');
                            return false;
                          }
                          if(/^[\s]*$/.test(credits)){
                            alert('积分必填');
                            return false;
                          }
                          if(confirm('确定要提交吗？')){
                                //ajax提交并验证
                                $.post(
                                    "index.php?module=product&action=ProductManage&act=sub_product",
                                    { productId:productId,credits:credits},
                                    function(data){
                                        if(data.status==1){
                                             if(soCategoryId||soProductId){
                                                    $("input[type='submit']").click();
                                                }else{
                                                    window.parent.mainFrame.location.reload();
                                                }
                                        }else if(data.status==2){
                                            alert("ID为"+data.reproId+"的商品不存在或未上架");
                                        }else if(data.status==3){
                                            alert("ID必须为数字");
                                        }else if(data.status==4){
                                            alert("ID为"+data.reproId+"的商品已存在");
                                        }else{
                                            alert('操作失败');
                                        }
                                    },
                                    'json'
                                );
                          }
                     })
                }
                    
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
        var soCategoryId='<?php echo $this->_tpl_vars['so_array']['categoryId']; ?>
';
        var soProductId = '<?php echo $this->_tpl_vars['so_array']['productId']; ?>
'; 
        if(confirm("确定删除该商品吗？")){
            $.post("index.php?module=product&action=ProductManage&act=delSingle", 
                    { id:id},
                    function(data){
                       if(data.status=='1'){
                            //alert('操作成功！');
                            if(soCategoryId||soProductId){
                                    $("input[type='submit']").click();
                            }else{
                                    window.parent.mainFrame.location.reload();
                            }
                       }else{
                            alert('操作失败！');
                       }
                    },
                    "json"
                    );
        }
    }
</script>
    <!--引入ajaxfileupload上传插件-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
/js/ajaxfileupload.js"></script>
<script type="text/javascript">
             $(function(){
                    //ajax提交验证
                     $("#import_sub").click(function(){                         
                         var importFile = $('#importFile').val();
                         var soCategoryId='<?php echo $this->_tpl_vars['so_array']['categoryId']; ?>
';
                         var soProductId = '<?php echo $this->_tpl_vars['so_array']['productId']; ?>
';
                          if(/^[\s]*$/.test(importFile)){
                            alert('请选择要导入的Exel文件');
                            return false;
                          }
                     
                          if(confirm('确定要导入吗？')){
                                //ajax提交信息并验证
                                
                                $.ajaxFileUpload(
                                    {
                                        url: "index.php?module=product&action=ProductManage&act=ajax_importExcel", //用于文件上传的服务器端请求地址
                                        secureuri: false, //是否需要安全协议，一般设置为false
                                        fileElementId: 'importFile', //文件上传域的ID
                                        dataType: 'json', //返回值类型 一般设置为json                                                                               
                                        success: function (data, status)  //服务器成功响应处理函数
                                        {
                                            if(data.flag==1){
                                                alert('导入商品数据成功');
                                                if(soCategoryId||soProductId){
                                                    $("input[type='submit']").click();
                                                }else{
                                                    window.parent.mainFrame.location.reload();
                                                }
                                            }else if(data.flag==2){
                                                alert('导入数据文件类型只能是后缀为xls的Excel文件！');
                                                return false;
                                            }else{
                                                alert('导入商品数据失败');
                                                return false;
                                            }
                                            
                                        },
                                        error: function (data, status, e)//服务器响应失败处理函数
                                        {
                                            alert('服务器未响应');
                                        }
                                    }
                                );
                          }
                     })
                })
</script>
</body>
    
</html>