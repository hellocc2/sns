<?php /* Smarty version 2.6.18, created on 2014-02-27 09:31:15
         compiled from postmanagement.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<script type="text/javascript" language="javascript">

	$(document).ready(function () {
		$('input[name=idarray]').each(function() {
			$(this).attr("checked", false); 
		});
	});
	
    function forbidUser(uid,flag){
        var mention = "";
        if(flag=='0'){ 
            mention="确定不通过审核吗？";
        }else if(flag=='1'){
            mention="确定通过审核吗？";
        }
        if(confirm(mention)){
            $.post("index.php?module=post&action=PostmanagementAction&act=ajaxforbid", 
                    { id:uid,staid:flag},
                    function(data){
                       if(data.status=='1'){
                            alert('操作成功！');
                            window.parent.mainFrame.location.href='<?php echo $this->_tpl_vars['redirect']; ?>
';
                            window.parent.mainFrame.location.reload();
                       }else{
                            alert('操作失败！');
                       }
                    },
                    "json"
                    );
        }
    }
    
	function ajaxDel(id,albumId,langId){
        if(!confirm('确定要删除吗？')){
                return false;
               }
           $.post("index.php?module=post&action=PostmanagementAction&act=ajaxDel", 
                   { id:id,albumid:albumId,langid:langId},
                   function(data){
                      if(data.status=='1'){
                           alert('操作成功！');
                           window.parent.mainFrame.location.reload();
                      }else if(data.status=='2'){
                           alert('该作品集在该语言下有帖子，不能删除');
                      }else if(data.status=='3'){
                           alert('必须先删除其它语言最后才能删除语言为中文的！');
                      }else if(data.status=='4'){
                           alert('该作品集已被用户关注，不能删除！');
                      }else{
                           alert('操作失败！');
                      }
                   },
                   "json"
                   );                                 
	}
	
	//搜索
	$(function(){
	    $('#search').click(function(){
	    	var check = checked();
        	$('#form3').attr('action', 'index.php?module=post&action=Postmanagement&act=search');
        	$('#form3').submit();        
	    })
	})
	
	//全部删除选中项目
	$(function(){
	    $('#delChoose').click(function(){
	        var check = checked();
	        if(!confirm('确定要删除选中项吗？')){
	             return false;
	        }
	        
	        if(check==true){
	           $('#form3').attr('action', 'index.php?module=post&action=PostmanagementAction&act=delChoosed');
	           $('#form3').submit();
	        }else{
	            alert('请至少选择一项');
	            return false;
	        }
	        
	    })
	    
	})

	//全部通过审核选中项目
	$(function(){
	    $('#approved').click(function(){
	        var check = checked();
	        if(!confirm('确定要审核通过选中项吗？')){
	             return false;
	        }
	        
	        if(check==true){
	           $('#form3').attr('action', 'index.php?module=post&action=PostmanagementAction&act=approved');
	           $("#form3").submit();
	        }else{
	            alert('请至少选择一项');
	            return false;
	        }
	        
	    })
	})	

	$(function(){
	    $('#notapproved').click(function(){
	        var check = checked();
	        if(!confirm('确定要不审核通过选中项吗？')){
	             return false;
	        }
	        
	        if(check==true){
	           $('#form3').attr('action', 'index.php?module=post&action=PostmanagementAction&act=notapproved');
	           $("#form3").submit();
	        }else{
	            alert('请至少选择一项');
	            return false;
	        }
	        
	    })
	})	
	
	$(function(){
        //多语言删除
        $(".delAlbum").click(function(){
            var albumId = $(this).attr( 'lid' );
            var html_data = "<table border='1' cellpadding='3' cellspacing='0' style='margin:auto;'><tr><th>作品集名</th><th>语言</th><th>操作</th></tr>";
            //取得多语言数据
            $.post("index.php?module=works&action=WorksAction&act=AjaxDel", 
                    { albumid:albumId},
                    function(data){
                       if(data.status=='1'){
                            var list = data.list;
                            for(var i=0;i<list.length;i++){
                                var name = list[i].name;
                                var langName = list[i].lang_name;
                                var delId = list[i].id;
                                var albumid = list[i].albumId;
                                var langid = list[i].lang_id;
                                html_data+="<tr><td>"+name+"</td><td>"+langName+"</td><td><a href='javascript:void(0)' onclick='ajaxDel("+delId+","+albumid+","+langid+")'><font color='red'>删除</font></a></td></tr>";
                                }
                            html_data+="</table>";
                            $(".tappend").html(html_data);
                       }else{
                            alert('操作失败！');
                       }
                    },
                    "json"
                    );
        });
        
        //多语言编辑
        $(".editAlbum").click(function(){
            var albumId = $(this).attr( 'lid' );
            var html_data = "<table border='1' cellpadding='3' cellspacing='0' style='margin:auto;'><tr><th>作品集名</th><th>语言</th><th>操作</th></tr>";
            //取得多语言数据
            $.post("index.php?module=works&action=WorksAction&act=AjaxDel", 
                    { albumid:albumId},
                    function(data){
                       if(data.status=='1'){
                            var list = data.list;
                            for(var i=0;i<list.length;i++){
                                var name = list[i].name;
                                var langName = list[i].lang_name;
                                var Id = list[i].id;
                                var albumid = list[i].albumId;
                                var langid = list[i].lang_id;
                                html_data+="<tr><td>"+name+"</td><td>"+langName+"</td><td><a href='index.php?module=works&action=WorksAction&act=edit&albumid="+albumid+"&langid="+langid+"&infoid="+Id+"'><font color='red'>编辑</font></a></td></tr>";
                                }
                            html_data+="</table>";
                            $(".tappend").html(html_data);
                       }else{
                            alert('操作失败！');
                       }
                    },
                    "json"
                    );
        });
    });

//全选
$(document).ready(function(){
    $('.check:button').toggle(function(){
        $('.idarray').attr('checked','checked');
        $(this).val('不全选')
    },function(){
        $('.idarray').removeAttr('checked');
        $(this).val('全选');        
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

<style type="text/css">
	.title{
		width:98%;
		height:40px;
		border:1px solid #000;
		line-height:40px;
		padding-left:10px;
		}
	.cate{
		width:98%;
		height:40px;
		border:1px solid #000;
		line-height:40px;
		padding-left:10px;
		}
	.result{
		width:98%;
		min-height:120px;
		border:1px solid #000;
		padding-left:10px;
		}
	.condition{
		width:98%;
		min-height:120px;
		border:1px solid #000;
		padding-left:10px;
		}
	p{
		text-align:left;
		}
	.button{
		cursor:pointer;
		}
	.list table
  		{
 		 border-collapse:collapse;
  		}
	.list table tr th{
	  background-color:#CCC;
  }
	.list table, .list td, .list th
  		{
 		 border:1px solid black;
  		 text-align:center;
  		}
	table {  table-layout:fixed; word-break:break-all; word-wrap:break-word; }	
</style>
	<div class="cate_list" id="content">
        <div class="cate">
        	<strong>帖子管理：帖子列表</strong>
        </div>

        <br />
      	<div class="infobox">
	      	
	      	<form method="post" action=""  name="form" id="form3">
	      	
	        <input style="cursor: pointer;" type="button" class="button" id="approved" value="通过审核" /></a>
	        <input style="cursor: pointer;" type="button" class="button" id="notapproved" value="不通过审核" /></a>
	        <input style="margin-left:10px ;" type="button" class="button" id="delChoose" value="删除所选"/>
	        &nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="is_recommend" <?php if ($this->_tpl_vars['is_recommend']): ?>checked<?php endif; ?>>只显示推荐贴子  &nbsp;&nbsp;&nbsp;
	        
	        <select id="lang" name="lang" style="width:234px;color: #006699;">
				<?php echo $this->_tpl_vars['option']; ?>

			</select>
			
	        <input type="text" value="<?php echo $this->_tpl_vars['albumName']; ?>
" name="albumname">
	        
            <input type="button" class="button" id="search" type="submit" value="搜索">
	        <br />
      	    <div class="pagination"><?php echo $this->_tpl_vars['page']; ?>
</div>
        	<div class="list">
                
        		<table width="99%">
                	<tr>
        				<col width="5%" />
                		<col width="10%" />
                        <col width="10%" />
                		<col width="35%" />
                        <col width="15%" />
                        <col width="5%" />
                        <col width="5%" />
                        <col width="5%" />
                        <col width="8%" />
                        <col width="22%" />
            		</tr>
                	<tr>
                        <th><input type="button" class="check" value="全选" /></th>
                    	<th>发帖人</th>
                    	<th>作品集名字</th>
                        <th>内容</th>
                        <th>图片</th>
                        <th>转发数</th> 
                        <th>赞次数</th>
                        <th>评论</th>
                        <th>审核</th>
                        <th>操作</th>
                    </tr>
                    <?php $_from = $this->_tpl_vars['album_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['album'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['album']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['album']):
        $this->_foreach['album']['iteration']++;
?> 
                    <tr>
                    	<td><input type="checkbox" name="idarray[]" value="<?php echo $this->_tpl_vars['album']['wpid']; ?>
" class="idarray"/></td>
                        <td><?php if ($this->_tpl_vars['album']['memberNickName']): ?><?php echo $this->_tpl_vars['album']['memberNickName']; ?>
<?php else: ?><?php echo $this->_tpl_vars['album']['original_memberNickName']; ?>
<?php endif; ?></td>
                         <td><?php if ($this->_tpl_vars['album']['content']): ?><?php echo $this->_tpl_vars['album']['alname']; ?>
<?php endif; ?></td>
                        <td><?php if ($this->_tpl_vars['album']['content']): ?><?php echo $this->_tpl_vars['album']['content']; ?>
<?php endif; ?></td>
                        <td><?php if ($this->_tpl_vars['album']['picture_url']): ?>
                                <img width="102" height="84" src="http://192.168.11.13/upload/cosplayshow/wb/w4/<?php echo $this->_tpl_vars['album']['picture_url']; ?>
"/>
                            <?php else: ?>
                                <font color="red">无图</font>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $this->_tpl_vars['album']['remain_forword_count']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['album']['like_count']; ?>
</td>
                        <td><a href="/index.php?module=comment&action=commentmanagement&postid=<?php echo $this->_tpl_vars['album']['postid']; ?>
"><?php echo $this->_tpl_vars['album']['comment_count']; ?>
</a></td>
                        <td>
                            <?php if ($this->_tpl_vars['album']['wpdata_status'] == '0'): ?>
                            <a href="javascript:void(0)" onClick="forbidUser('<?php echo $this->_tpl_vars['album']['wpid']; ?>
','<?php echo $this->_tpl_vars['album']['wpdata_status']; ?>
')" >
                            <input style="cursor: pointer;color:red;" type="button" value="已通过" />
                            </a>
                            <?php else: ?>
                            <a href="javascript:void(0)" onClick="forbidUser('<?php echo $this->_tpl_vars['album']['wpid']; ?>
','<?php echo $this->_tpl_vars['album']['wpdata_status']; ?>
')" >
                            <input style="cursor: pointer;color:green;" type="button" value="未通过" />
                            </a>
                            <?php endif; ?> 
                        <td>
                            <a href="index.php?module=post&action=postmanagement&act=list&albumid=<?php echo $this->_tpl_vars['album']['wpid']; ?>
&lang=<?php echo $this->_tpl_vars['lang']; ?>
"><input type="button" value="查看" /></a>
                            <a href="index.php?module=post&action=postmanagement&act=edit&albumid=<?php echo $this->_tpl_vars['album']['wpid']; ?>
"><input type="button" value="推荐列表编辑" /></a>
                            <a href="javascript:void(0)" onClick="ajaxDel('<?php echo $this->_tpl_vars['album']['wpid']; ?>
')" ><input style="cursor: pointer;color:red;" type="button" value="删除" /></a>
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </table>
                
        	</div>
            <div class="pagination"><?php echo $this->_tpl_vars['page']; ?>
</div>
            </form>
        </div>
        <!--删除弹出层 start-->
        <div id="delLangAlbum" style="display:none;">
            <p style="text-align: center;color:orange;"><b>多语言删除</b></p>
            <div style="text-align:center;" class="tappend"></div>
        </div>
        <!--删除弹出层 end-->
        
         <!--编辑弹出层 start-->
        <div id="editLangAlbum" style="display:none;">
            <p style="text-align: center;color:orange;"><b>多语言编辑</b></p>
            <div style="text-align:center;" class="tappend"></div>
        </div>
        <!--编辑弹出层 end-->
    </div>
    <br />
</body>
</html>