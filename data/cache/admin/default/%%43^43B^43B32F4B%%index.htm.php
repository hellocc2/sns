<?php /* Smarty version 2.6.18, created on 2015-05-18 06:12:43
         compiled from index.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rewrite', 'index.htm', 16, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>test</title>
</head>
<body>

Q&A
teacher:aaaaaaaaaaaaaaaa;
ask:bbbbbbbbbbb;
teacher:cccccccccccc;
ask:ddddddddddd;


<a href='<?php echo smarty_function_rewrite(array('url' => "?module=ask&action=index"), $this);?>
'>ask a question;</a>




</body>
</html>