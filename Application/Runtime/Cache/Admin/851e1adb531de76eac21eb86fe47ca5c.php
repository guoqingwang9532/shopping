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
<script type="text/javascript" src="<?php echo C('AD_JS_URL');?>jquery.js"></script>
<script type="text/javascript">
  $(function() {
    $('.lockTextArea').click(function(){
      if ($(this).val() == 0) {
        $('#attr_vals').attr('disabled','disabled');
        $('#attr_vals').val('');
      } else {
        $('#attr_vals').removeAttr('disabled');
      }

    })
  })
</script>
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
    <form action="/index.php/Admin/Attr/tianjia.html" method="post">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">属性名称：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="attr_name" />
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">属性类型：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
          <select name='type_id'>
            <option value="0">全部类型</option>
            <?php if(is_array($typeData)): $i = 0; $__LIST__ = $typeData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["id"]); ?>"><?php echo ($vol["type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">属性是否可选：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
          <input type="radio" name="attr_sel" value="0" />单选
          <input type="radio" name="attr_sel" value='1'/> 多选
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">属性的录入方式：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
          <input type="radio" name="attr_write" value="0" class="lockTextArea" />手工输入
          <input type="radio" name="attr_write" value='1' class="lockTextArea" /> 在下面的列表选择 例如颜色：白色,红色,绿色,多个可选值通过[逗号]分隔    
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">详情描述：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <textarea rows="5" cols="30" name="attr_vals" id="attr_vals"></textarea>
        </div></td>
      </tr>
      <tr>
        <td colspan="2"  height="20" bgcolor="#FFFFFF" class="STYLE19" align="center">
          <input type="submit" value="添加">
        </td>
      </tr>
    </table>
    </form>
    </td>
  </tr>
</table>
</body>
</html>