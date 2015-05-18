<?php /* Smarty version 2.6.18, created on 2013-12-12 16:38:43
         compiled from time_lang.htm */ ?>
<form name="form" id="form" action="" target="mainFrame" method="post">
	<div id="date_lang"> 
		<input type="text" id="starttime" name="starttime" value="<?php echo $this->_tpl_vars['start_time']; ?>
" size=13  readonly="true" /> - 
		<input type="text" id="endtime" name="endtime" value="<?php echo $this->_tpl_vars['end_time']; ?>
" size=13  readonly="true" />
		<script>
		$(function() {//onChange
			$( "#starttime" ).datepicker({ 
				dateFormat: 'yy-mm-dd', 
				onClose: function(){
					now = this.value;
				}
			});
			$( "#endtime" ).datepicker({ 
				dateFormat: 'yy-mm-dd', 
				onClose: function(){
					now = this.value;
				}
			});
		});
	</script>		
		<input type="submit" value="应用">
	</div>
</form> 

