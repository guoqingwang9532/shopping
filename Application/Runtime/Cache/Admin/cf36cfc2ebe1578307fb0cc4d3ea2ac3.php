<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
<!--
body { 
	margin-left: 3px;
	margin-top: 0px;
	margin-right: 3px;
	margin-bottom: 0px;
}
.STYLE1 {
	color: #e1e2e3;
	font-size: 12px;
}
.STYLE6 {color: #000000; font-size: 12; }
.STYLE10 {color: #000000; font-size: 12px; }
.STYLE19 {
	color: #344b50;
	font-size: 12px;
}
.STYLE21 {
	font-size: 12px;
	color: #3b6375;
}
.STYLE22 {
	font-size: 12px;
	color: #295568;
}
a:link{
    color:#e1e2e3; text-decoration:none;
}
a:visited{
    color:#e1e2e3; text-decoration:none;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="6%" height="19" valign="bottom"><div align="center"><img src="images/tb.gif" width="14" height="14" /></div></td>
                <td width="94%" valign="bottom"><span class="STYLE1"> 商品管理 -> 添加商品</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1"> 
            <a href="showlist.html">返回</a>   &nbsp; </span>
              <span class="STYLE1"> &nbsp;</span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
    <form action="/index.php/Admin/Role/edit/id/50" method="post">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
    <?php if(is_array($authDataTop)): $i = 0; $__LIST__ = $authDataTop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right">
        	<input type="checkbox" name='role_auth_id[]' value="<?php echo ($vol["id"]); ?>"
            <?php if(in_array(($vol["id"]), is_array($role_auth_ids)?$role_auth_ids:explode(',',$role_auth_ids))): ?>checked='checked'<?php endif; ?>
          ><?php echo ($vol["auth_name"]); ?>:
        </div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <?php if(is_array($authDatasec)): $i = 0; $__LIST__ = $authDatasec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if(($vol["id"]) == $v["auth_pid"]): ?><input  type="checkbox" value="<?php echo ($v["id"]); ?>" name="role_auth_id[]" 
                <?php if(in_array(($v["id"]), is_array($role_auth_ids)?$role_auth_ids:explode(',',$role_auth_ids))): ?>checked='checked'<?php endif; ?>
            ><?php echo ($v["auth_name"]); endif; endforeach; endif; else: echo "" ;endif; ?>
        </div></td>
       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
       <tr>
            <td colspan="2" align="center" class="STYLE9">
              <input type="hidden" value="<?php echo ($role_id); ?>"name='role_id'></input>
              <input type="submit" value="提交">
            </td>
      </tr>

    </table>
    </form>
  </td>
   
  </tr>
</table>
</body>
</html>