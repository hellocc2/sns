<?php /* Smarty version 2.6.18, created on 2014-02-27 10:27:49
         compiled from register_list.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncatecn', 'register_list.htm', 115, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<script type="text/javascript" language="javascript">
    //启用禁用用户
    function forbidUser(uid,flag){
        var mention = "";
        if(flag=='1'){
            mention="确定启用该用户吗？";
        }else if(flag=='0'){
            mention="确定禁止该用户吗？";
        }
        if(confirm(mention)){
            $.post("index.php?module=register&action=RegisterAction&act=AjaxForbid", 
                    { id:uid,staid:flag},
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
</style>
	<div class="cate_list">
        <div class="cate">
        	<strong>会员管理：会员列表</strong>
        </div><br />
        <div class="title">
            <form method="post" action="index.php?module=register&action=RegisterList" name="form">
        	会员名：<input type="text" value="<?php echo $this->_tpl_vars['username']; ?>
" name="username">
            <input type="submit" value="搜索"/>
            </form>
      	</div>
        <br />
      	<div class="result">
      	     <div class="pagination"><?php echo $this->_tpl_vars['page']; ?>
</div>
        	<div class="list">
        		<table width="99%">
                	<tr>
                		<col width="25%" />
                        <col width="15%" />
                		<col width="40%" />
                        <col width="20%" />
            		</tr>
                	<tr>
                    	<th>会员名</th>
                        <th>性别</th>
                        <th>关注作品集</th>
                        <th>操作</th>
                    </tr>
                    <?php $_from = $this->_tpl_vars['user_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['user'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['user']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['user']):
        $this->_foreach['user']['iteration']++;
?>
                    <tr>
                        <td><?php echo $this->_tpl_vars['user']['nick_name']; ?>
</td>
                        <td><?php if ($this->_tpl_vars['user']['MemberSex']): ?>
                                <?php if ($this->_tpl_vars['user']['MemberSex'] == 'Men'): ?>
                                    男
                                    <?php else: ?>
                                    女
                                    <?php endif; ?>
                            <?php else: ?>
                                <font color="red">未知</font>
                            <?php endif; ?>
                        </td>
                        <td title="<?php echo $this->_tpl_vars['user']['albumStr']; ?>
"><?php if ($this->_tpl_vars['user']['albumStr']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['albumStr'])) ? $this->_run_mod_handler('truncatecn', true, $_tmp, 100) : smarty_modifier_truncatecn($_tmp, 100)); ?>
<?php else: ?><font color="red">暂无</font><?php endif; ?></td>
                        <td>
                            <a href="index.php?module=register&action=RegisterAction&act=detail&id=<?php echo $this->_tpl_vars['user']['memberId']; ?>
"><input style="cursor: pointer;" type="button" value="查看" /></a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php if ($this->_tpl_vars['user']['data_status'] == '0'): ?>
                            <a href="javascript:void(0)" onClick="forbidUser('<?php echo $this->_tpl_vars['user']['memberId']; ?>
','<?php echo $this->_tpl_vars['user']['data_status']; ?>
')" >
                            <input style="cursor: pointer;color:red;" type="button" value="禁用" />
                            </a>
                            <?php else: ?>
                            <a href="javascript:void(0)" onClick="forbidUser('<?php echo $this->_tpl_vars['user']['memberId']; ?>
','<?php echo $this->_tpl_vars['user']['data_status']; ?>
')" >
                            <input style="cursor: pointer;color:green;" type="button" value="启用" />
                            </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </table>
        	</div>
            <div class="pagination"><?php echo $this->_tpl_vars['page']; ?>
</div>
        </div>
    </div>
    <br />
</body>
</html>