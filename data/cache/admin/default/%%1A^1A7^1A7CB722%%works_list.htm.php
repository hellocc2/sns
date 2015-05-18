<?php /* Smarty version 2.6.18, created on 2014-02-27 10:26:40
         compiled from works_list.htm */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<script type="text/javascript" language="javascript">
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
    
    function ajaxDel(id,albumId,langId){
         if(!confirm('确定要删除吗？')){
                 return false;
                }
            $.post("index.php?module=works&action=WorksAction&act=AjaxDelAct", 
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
//全选
function CheckAll(form)
  {
  for (var i=0;i<form.elements.length;i++)
    {
    var e = form.elements[i];
    if (e.name != 'chkall' && e.type=='checkbox')
		{
			e.checked = form.chkall.checked;			
		}
    }
  }
    
    //删除选中项目
$(function(){
    $('#delChoose').click(function(){
        var check = checked();
        if(!confirm('确定要删除选中项吗？')){
             return false;
        }
        
        if(check==true){
           $("#form3").submit();
        }else{
            alert('请至少选择一项');
            return false;
        }
        
    })
    
})

function checked(){ 
        var isChecked = false; 
        $(".checkbox").each(function(){ 
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
	<div class="cate_list">
        <div class="cate">
        	<strong>作品集管理：作品集列表</strong>
        </div><br />
        <a href="index.php?module=works&action=WorksAction&act=add"><input style="cursor: pointer;" type="button" value="新建作品集" /></a>
        &nbsp;&nbsp;
        <a href="index.php?module=works&action=WorksAction&act=synchronize"><input style="cursor: pointer;" type="button" value="同步作品集" /></a>
        &nbsp;&nbsp;
        <input style="margin-left:10px ;" type="button" class="button" id="delChoose" value="删除所选"/>
        <br />
        <br />
        <div class="title">
            <form method="post" action="index.php?module=works&action=WorksList" name="form2">
        	作品集名称：<input type="text" value="<?php echo $this->_tpl_vars['albumName']; ?>
" name="albumname">
            <input type="submit" value="搜索"/>
            </form>
      	</div>
        <br />
      	<div class="result">
      	     <div class="pagination"><?php echo $this->_tpl_vars['page']; ?>
</div>
        	<div class="list">
                <form method="post" action="index.php?module=works&action=WorksAction&act=delChoosed"  name="form" id="form3">
        		<table width="99%">
                	<tr>
        				<col width="5%" />
                		<col width="25%" />
                        <col width="15%" />
                		<col width="25%" />
                        <col width="30%" />
            		</tr>
                	<tr>
                        <th><input type="checkbox" name="chkall" onClick="CheckAll(this.form)" class="checkbox"/></th>
                    	<th>名称</th>
                        <th>图片</th>
                        <th>帖子数量</th>
                        <th>操作</th>
                    </tr>
                    <?php $_from = $this->_tpl_vars['album_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['album'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['album']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['album']):
        $this->_foreach['album']['iteration']++;
?>
                    <tr>
                    	<td><input type="checkbox" name="idarray[]" value="<?php echo $this->_tpl_vars['album']['id']; ?>
" class="checkbox"/></td>
                        <td><?php if ($this->_tpl_vars['album']['name']): ?><?php echo $this->_tpl_vars['album']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['album']['cos_en_name']; ?>
<?php endif; ?></td>
                        <td><?php if ($this->_tpl_vars['album']['album_small_logo_url']): ?>
                                <!--<?php if ($this->_tpl_vars['album']['albumType'] == '0' && $this->_tpl_vars['album']['is_edit_pic'] == '0'): ?>
                                <img width="102" height="84" src="http://www.mlo.me/upload/coll/<?php echo $this->_tpl_vars['album']['album_small_logo_url']; ?>
"/>
                                <?php elseif ($this->_tpl_vars['album']['albumType'] == '1' || $this->_tpl_vars['album']['is_edit_pic'] == '1'): ?>
                                <img width="102" height="84" src="http://192.168.11.13/upload/cosplayshow/coll/<?php echo $this->_tpl_vars['album']['album_small_logo_url']; ?>
"/>
                                <?php endif; ?>-->
                                 <img width="102" height="84" src="http://192.168.11.13/upload/coll/<?php echo $this->_tpl_vars['album']['album_small_logo_url']; ?>
"/>
                            <?php else: ?>
                                <font color="red">无图</font>
                            <?php endif; ?>
                        </td>
                        <td><?php if ($this->_tpl_vars['album']['tcount'] == 0): ?><?php echo $this->_tpl_vars['album']['tcount']; ?>
<?php else: ?><a href="?module=post&action=postmanagement&albumid=<?php echo $this->_tpl_vars['album']['id']; ?>
"><?php echo $this->_tpl_vars['album']['tcount']; ?>
</a><?php endif; ?></td>
                        <td>
                            <a href="index.php?module=works&action=WorksAction&act=addLangs&albumid=<?php echo $this->_tpl_vars['album']['id']; ?>
"><input type="button" value="添加多语言" /></a>
                            <input lid="<?php echo $this->_tpl_vars['album']['id']; ?>
" alt="#TB_inline?height=300&width=400&inlineId=editLangAlbum" class="thickbox editAlbum" style="cursor: pointer;" type="button" value="编辑" />
                            <input lid="<?php echo $this->_tpl_vars['album']['id']; ?>
" alt="#TB_inline?height=300&width=400&inlineId=delLangAlbum" class="thickbox delAlbum" style="cursor: pointer;" type="button" value="删除" />
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </table>
                </form>
        	</div>
            <div class="pagination"><?php echo $this->_tpl_vars['page']; ?>
</div>
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