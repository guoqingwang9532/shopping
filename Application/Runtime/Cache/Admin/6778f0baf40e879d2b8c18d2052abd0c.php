<?php if (!defined('THINK_PATH')) exit();?>﻿<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="<?php echo C('AD_JS_URL');?>jquery.js"></script>
<script type="text/javascript" src="<?php echo C('AD_JS_URL');?>chili-1.7.pack.js"></script>
<script type="text/javascript" src="<?php echo C('AD_JS_URL');?>jquery.easing.js"></script>
<script type="text/javascript" src="<?php echo C('AD_JS_URL');?>jquery.dimensions.js"></script>
<script type="text/javascript" src="<?php echo C('AD_JS_URL');?>jquery.accordion.js"></script>
<script language="javascript">
	jQuery().ready(function(){ 
		jQuery('#navigation').accordion({
			header: '.head',
			navigation1: true, 
			event: 'click',
			fillSpace: true,
			animated: 'bounceslide'
		});
	});
</script>
<style type="text/css">
<!--
body {
	margin:0px;
	padding:0px;
	font-size: 12px;
}
#navigation {
	margin:0px;
	padding:0px;
	width:147px;
}
#navigation a.head {
	cursor:pointer;
	background:url(images/main_34.gif) no-repeat scroll;
	display:block;
	font-weight:bold;
	margin:0px;
	padding:5px 0 5px;
	text-align:center;
	font-size:12px;
	text-decoration:none;
}
#navigation ul {
	border-width:0px;
	margin:0px;
	padding:0px;
	text-indent:0px;
}
#navigation li {
	list-style:none; display:inline;
}
#navigation li li a {
	display:block;
	font-size:12px;
	text-decoration: none;
	text-align:center;
	padding:3px;
}
#navigation li li a:hover {
	background:url(images/tab_bg.gif) repeat-x;
		border:solid 1px #adb9c2;
}
a:link{
    color:#036;
}
-->
</style>
</head>
<body>
<div  style="height:100%;">
  <ul id="navigation">
  	<?php if(is_array($authtop)): $i = 0; $__LIST__ = $authtop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li> <a class="head"><?php echo ($vol["auth_name"]); ?></a>
	      <ul>
		      <?php if(is_array($authsec)): $i = 0; $__LIST__ = $authsec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if(($vol["id"]) == $v["auth_pid"]): ?><li><a href="/index.php/Admin/<?php echo ($v["auth_c"]); ?>/<?php echo ($v["auth_a"]); ?>" target="rightFrame"><?php echo ($v["auth_name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	      </ul>
	    </li><?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
</div>
</body>
</html>