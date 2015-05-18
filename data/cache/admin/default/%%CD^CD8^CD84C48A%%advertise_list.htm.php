<?php /* Smarty version 2.6.18, created on 2014-05-14 16:58:54
         compiled from advertise_list.htm */ ?>
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

							<li><a href="#">广告管理</a></li>

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
                                        
                                        <a lid='0' class="thickbox editAd" href="#TB_inline?&width=400&height=400&inlineId=editAdvertise">

    										<button class="btn green">
    
    										新增 <i class="icon-plus"></i>
    
    										</button>
                                            
                                        </a>

									   </div>
                                
                                        
									
                                        <div style="float: right;">
                                        
                                            <form action="index.php?module=advertise&action=AdvertiseManage" method="post">
                                                
                                                <input type="text" <?php if ($this->_tpl_vars['so_array']['stime']): ?> value="<?php echo $this->_tpl_vars['so_array']['stime']; ?>
" <?php else: ?> value="选择创建日期进行搜索" <?php endif; ?> name="stime" style="width:140px;" onfocus="if(this.value=='选择创建日期进行搜索'){this.value='';}"  onblur="if(this.value==''){this.value='选择创建日期进行搜索';}"/>
                                                
                                                <input type="text" <?php if ($this->_tpl_vars['so_array']['stitle']): ?> value="<?php echo $this->_tpl_vars['so_array']['stitle']; ?>
" <?php else: ?> value="输入广告标题进行搜索" <?php endif; ?> name="stitle" style="width:200px;" onfocus="if(this.value=='输入广告标题进行搜索'){this.value='';}"  onblur="if(this.value==''){this.value='输入广告标题进行搜索';}"/>
                                                
                                                <input type="submit" name="sub" value="搜索"/>
                                            
                                            </form>
                                        
                                        </div>                                        
                                        
								</div>
                                <form method="post" action="index.php?module=advertise&action=AdvertiseManage&act=delChoosed"  name="form" id="del_form">
								<table class="table table-striped table-bordered table-hover" id="sample_1">

									<thead>

										<tr>

											<th style="width:8px;"><input type="checkbox" class="checkall"  /></th>

											<th>广告标题</th>
                                            
                                            <th class="hidden-480">广告分类</th>

											<th class="hidden-480">图片</th>

											<th class="hidden-480">创建日期</th>

											<th class="hidden-480">尺寸</th>

											<th >操作</th>

										</tr>

									</thead>

									<tbody>
                                        <?php if ($this->_tpl_vars['advertise']): ?>
                                        <?php $_from = $this->_tpl_vars['advertise']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ad']):
?>
										<tr class="odd gradeX">

											<td><input type="checkbox" name="idarray[]" value="<?php echo $this->_tpl_vars['ad']['id']; ?>
" class="idarray"  /></td>

											<td><?php echo $this->_tpl_vars['ad']['title']; ?>
</td>
                                            
                                            <td class="hidden-480"><?php echo $this->_tpl_vars['snsTypeOne'][$this->_tpl_vars['ad']['ad_type']]; ?>
</td>
                                            
                                            <td  class="hidden-480">
                                                <a href="<?php echo $this->_tpl_vars['ad']['picture']; ?>
" target="_blank" class="previewPic">
                                                    <img style="width: 100px;height:100px;" src="<?php echo $this->_tpl_vars['ad']['picture']; ?>
" />
                                                </a>
                                            </td>                                         
											
                                            <td class="hidden-480"><?php echo $this->_tpl_vars['ad']['gmt_create']; ?>
</td>

											<td class="hidden-480"><?php echo $this->_tpl_vars['pictureSizeOne'][$this->_tpl_vars['ad']['picture_size']]; ?>
</td>

											<td >
                                                <a class="btn mini purple thickbox editAd" lid="<?php echo $this->_tpl_vars['ad']['id']; ?>
" href="#TB_inline?&width=400&height=400&inlineId=editAdvertise"><i class="icon-edit"></i> Edit</a>
                                                &nbsp;&nbsp;
                                                <a class="btn mini black" onclick="delSingle('<?php echo $this->_tpl_vars['ad']['id']; ?>
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
        <div id="editAdvertise" style="display:none;">
            <p style="text-align: center;color:orange;"><b>添加/编辑广告</b></p>
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
    #tooltip{
	position:absolute;
	border:1px solid #ccc;
	background:#333;
	padding:2px;
	display:none;
	color:#fff;
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
        $("input[name='stime']").datepicker();
        
        $(".editAd").click(function(){
            
                     var id = $(this).attr( 'lid' ); //编辑
                               
                     var html_data = "<form action='' method='post' id='product_form'>"+
                                      "<input type='hidden' value='' class='editId'/>"+
                                      "<label for='title'>*广告标题:</label>"+
                                      "<input type='text' id='title' name='title' value='' /><br />"+
                                      "<label for='type'>*类型:</label>"+
                                      "<select name='type'>"+
                                      "<?php $_from = $this->_tpl_vars['snsType']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['stype']):
?>"+
                                      "<option value='<?php echo $this->_tpl_vars['stype']['val']; ?>
' class='type_<?php echo $this->_tpl_vars['stype']['val']; ?>
'><?php echo $this->_tpl_vars['stype']['name']; ?>
</option>"+
                                      "<?php endforeach; endif; unset($_from); ?>"+
                                      "</select><br />"+ 
                                      "<label for='size'>*尺寸:</label>"+
                                      "<select name='size'>"+
                                      "<?php $_from = $this->_tpl_vars['pictureSize']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['psize']):
?>"+
                                      "<option value='<?php echo $this->_tpl_vars['psize']['val']; ?>
' class='size_<?php echo $this->_tpl_vars['psize']['val']; ?>
'><?php echo $this->_tpl_vars['psize']['name']; ?>
</option>"+
                                      "<?php endforeach; endif; unset($_from); ?>"+
                                      "</select><br />"+                                      
                                      "<p><label for='picture'>*图片:</label>"+
                                      "<input type='file' id='picture'  name='picture'/></p>"+
                                      "<label for='targetUrl'>*链接:</label>"+
                                      "<input type='text' id='targetUrl' name='targetUrl' value='' /><br />"+
                                      "<label for='describe'>文字(描述):</label>"+
                                      "<textarea id='describe' name='describe'/></textarea/><br />"+
                                      "<input type='button' id='sbutton' value='提交' /><br />";
                     html_data+="</form><br/>";
                     $(".tappend").html(html_data);
                     
                     //编辑
                     if(id!=='0'){
                        //ajax取得广告信息
                        $.post(
                            "index.php?module=advertise&action=AdvertiseManage&act=ajax_getAd",
                            {id:id},
                            function(data){
                                if(data.status==1){
                                    var e_title = data.detail.title;
                                    var e_type = data.detail.ad_type;
                                    var e_pictureSize = data.detail.picture_size;
                                    var e_targetUrl = data.detail.target_url;
                                    var e_describe = data.detail.description;
                                    $(".editId").val(id);                                   
                                    $("#title").val(e_title);
                                    $("select[name='type']").find("option[value='"+e_type+"']").attr("selected",true);
                                    $("select[name='size']").find("option[value='"+e_pictureSize+"']").attr("selected",true);
                                    $("#targetUrl").val(e_targetUrl);
                                    $("#describe").val(e_describe);
                                    if(e_type=='3'){
                                            $("label[for='size']").addClass('hidesize');
                                            $("select[name='size']").addClass('hidesize');
                                            $("label[for='targetUrl']").html("视频链接:");
                                        }else{
                                            $("label[for='size']").removeClass('hidesize');
                                            $("select[name='size']").removeClass('hidesize');
                                            $("label[for='targetUrl']").html("链接:");
                                        }
                                }else{
                                    alert('false');
                                }
                            },
                            'json'
                        );
                     };  
                     
                     
                     //类型选中变化后界面相应变化
                     $("select[name='type']").change(function(){
                        var selected = $(this).val();
                        if(selected=='3'){
                            $("label[for='size']").addClass('hidesize');
                            $("select[name='size']").addClass('hidesize');
                            $("label[for='targetUrl']").html("视频链接:");
                        }else{
                            $("label[for='size']").removeClass('hidesize');
                            $("select[name='size']").removeClass('hidesize');
                            $("label[for='targetUrl']").html("链接:");
                        }
                     })
                     //ajax提交验证
                     $("#sbutton").click(function(){
                         var adId = $(".editId").val();
                         var title = $("#title").val();
                         var type = $("select[name='type']").val();
                         var size = $("select[name='size']").val();
                         var picture = $('#picture').val();
                         var targetUrl = $('#targetUrl').val();
                         var describe = $('#describe').val();
                         var soDate = '<?php echo $this->_tpl_vars['so_array']['stime']; ?>
';
                         var soTitle = '<?php echo $this->_tpl_vars['so_array']['stitle']; ?>
';
                         if(/^[\s]*$/.test(title)){
                            alert('请填写广告名称');
                            return false;
                          }
                          if((id=='0')&&(/^[\s]*$/.test(picture))){
                            alert('请选择要上传的图片');
                            return false;
                          }
                          if(/^[\s]*$/.test(targetUrl)){
                            alert('请填写链接地址');
                            return false;
                          }                          
                          if(confirm('确定要提交吗？')){
                                //ajax提交信息并验证
                                
                                $.ajaxFileUpload(
                                    {
                                        url: "index.php?module=advertise&action=AdvertiseManage&act=ajax_subAd", //用于文件上传的服务器端请求地址
                                        secureuri: false, //是否需要安全协议，一般设置为false
                                        fileElementId: 'picture', //文件上传域的ID
                                        dataType: 'json', //返回值类型 一般设置为json
                                        data:{adId:adId,title:title,type:type,size:size,targetUrl:targetUrl,describe:describe},                                        
                                        success: function (data, status)  //服务器成功响应处理函数
                                        {
                                            if(data.flag==1){
                                                alert('广告信息提交成功');
                                                if(soDate||soTitle){
                                                        $("input[type='submit']").click();
                                                }else{
                                                        window.parent.mainFrame.location.reload();
                                                }
                                            }else if(data.flag==2){
                                                alert(data.msg);
                                                return false;
                                            }else{
                                                alert('广告信息提交失败');
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
        var soDate = '<?php echo $this->_tpl_vars['so_array']['stime']; ?>
';
        var soTitle = '<?php echo $this->_tpl_vars['so_array']['stitle']; ?>
';
        if(confirm("确定删除该条广告吗？")){
            $.post("index.php?module=advertise&action=AdvertiseManage&act=delSingle", 
                    { id:id},
                    function(data){
                       if(data.status=='1'){
                            //alert('操作成功！');
                            if(soDate||soTitle){
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
    
 $(function(){
	var x = 10;
	var y = 20;
	$("a.previewPic").mouseover(function(e){	
		var tooltip = "<div id='tooltip'><img src='"+ this.href +"' alt='产品预览图'/><\/div>"; //创建 div 元素
		$("body").append(tooltip);	//把它追加到文档中						 
		$("#tooltip")
			.css({
				"top": (e.pageY+y) + "px",
				"left":  (e.pageX+x)  + "px"
			}).show("fast");	  //设置x坐标和y坐标，并且显示
    }).mouseout(function(){	
		$("#tooltip").remove();	 //移除 
    }).mousemove(function(e){
		$("#tooltip")
			.css({
				"top": (e.pageY+y) + "px",
				"left":  (e.pageX+x)  + "px"
			});
	});
})
</script>
</body>
    
</html>