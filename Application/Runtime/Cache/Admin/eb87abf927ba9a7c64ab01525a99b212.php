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
  //ajax动态请求本类别的属性
  function selectAttrDetail(id) {
    $.post("<?php echo U('Attr/ajaxR');?>",{'id' : id},function(data) {
      //alert(data);
       $("#attrTable tr:gt(1)").remove();
      var html = '';
      for(var i=0;i<data.length;i++) {
        html = '<tr><td height="20" bgcolor="#FFFFFF"><div align="center"><input type="checkbox" name="checkbox2" id="checkbox2" /></div></td>\
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">'+data[i].id+'</span></div></td>\
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">'+data[i].attr_name+'</div></td>\
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">'+data[i].type_name+'</div></td>\
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">'+(data[i].attr_sel == 1? '多选':'单选')+'</div></td>\
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">'+(data[i].attr_write ==1 ? '列表':'单入')+'</div></td>\
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">'+data[i].attr_vals +'</div></td>\
        <td height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE21">\
        <img src="<?php echo C('AD_IMG_URL');?>del.gif" width="10" height="10" /> 删除 | 查看 | <img src="<?php echo C('AD_IMG_URL');?>edit.gif" width="10" height="10" /> 编辑</div></td>\
      </tr>'
       /* html += '<tr>\
        <td height="20" bgcolor="#FFFFFF"><div align="center"><input type="checkbox" name="checkbox2" id="checkbox2" /></div></td>\
          <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">' + data[i].id + '</span></div></td>\
          <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">' +data[i].attr_name +'</div></td>\
          <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">' +data[i].type_name +'</div></td>\
          <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">' +(data[i].attr_sel?'多选':'单选')+'</div></td>\
          <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">' + (data[i].attr_write?"列表选择":"手工录入") + '</div></td>\
          <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">' + data[i].attr_vals+'</div></td>\
          <td height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE21">\
            <img src="<?php echo C('AD_IMG_URL');?>del.gif" width="10" height="10" /> 删除| 查看 |<img src="<?php echo C('AD_IMG_URL');?>edit.gif" width="10" height="10" /> 编辑\
          </div></td>\
        </tr>';*/
      $('#attrTable ').append(html)
      }
      
    },'json')
  }
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
                <td width="6%" height="19" valign="bottom"><div align="center"><img src="<?php echo C('AD_IMG_URL');?>tb.gif" width="14" height="14" /></div></td>
                <td width="94%" valign="bottom"><span class="STYLE1"> 商品管理 -> 商品列表</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
              <a href="<?php echo U('Attr/tianjia');?>"><img src="<?php echo C('AD_IMG_URL');?>add.gif" width="10" height="10" /> 添加</a>   &nbsp; 
              </span>
              <span class="STYLE1"> &nbsp;</span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce" id="attrTable">
      <tr>
        <td height="20" bgcolor="d3eaef" class="STYLE10">
          <div align="right"><span class="STYLE10">类型选择</span></div>
        </td>
        <td height="20" bgcolor="d3eaef" class="STYLE10" colspan="7">
          <select name="type_name" onchange="selectAttrDetail(this.value)">
            <option value="0">全部类型名</option>
            <?php if(is_array($typeData)): $i = 0; $__LIST__ = $typeData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["id"]); ?>"><?php echo ($vol["type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </td>
      </tr>
      <tr>
        <td  height="20" bgcolor="d3eaef" class="STYLE10"><div align="center">
          <input type="checkbox" name="checkbox" id="checkbox" />
        </div></td>
        <td  height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">id</span></div></td>
        <td w height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">属性名称</span></div></td>
        <td  height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">类型</span></div></td>
        <td height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">是否多选</span></div></td>
        <td  height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">录入方式</span></div></td>
        <td  height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">列表可选值</span></div></td>
        <td  height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">基本操作</span></div></td>
      </tr>
      <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
        <td height="20" bgcolor="#FFFFFF"><div align="center">
          <input type="checkbox" name="checkbox2" id="checkbox2" />
        </div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><?php echo ($vol["id"]); ?></span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($vol["attr_name"]); ?></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($vol["type_name"]); ?></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($vol['attr_sel']?'多选':'单选'); ?></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($vol['attr_write']?'列表选择':'单一录入'); ?></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($vol["attr_vals"]); ?></div></td>
        <td height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE21">
        <img src="<?php echo C('AD_IMG_URL');?>del.gif" width="10" height="10" /> 删除 | 查看 | <img src="<?php echo C('AD_IMG_URL');?>edit.gif" width="10" height="10" /> 编辑</div></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table></td>
  </tr>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="33%"><div align="left"><span class="STYLE22">&nbsp;&nbsp;&nbsp;&nbsp;共有<strong> 243</strong> 条记录，当前第<strong> 1</strong> 页，共 <strong>10</strong> 页</span></div></td>
        <td width="67%"><table width="312" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="49"><div align="center"><img src="<?php echo C('AD_IMG_URL');?>main_54.gif" width="40" height="15" /></div></td>
            <td width="49"><div align="center"><img src="<?php echo C('AD_IMG_URL');?>main_56.gif" width="45" height="15" /></div></td>
            <td width="49"><div align="center"><img src="<?php echo C('AD_IMG_URL');?>main_58.gif" width="45" height="15" /></div></td>
            <td width="49"><div align="center"><img src="<?php echo C('AD_IMG_URL');?>main_60.gif" width="40" height="15" /></div></td>
            <td width="37" class="STYLE22"><div align="center">转到</div></td>
            <td width="22"><div align="center">
              <input type="text" name="textfield" id="textfield"  style="width:20px; height:12px; font-size:12px; border:solid 1px #7aaebd;"/>
            </div></td>
            <td width="22" class="STYLE22"><div align="center">页</div></td>
            <td width="35"><img src="<?php echo C('AD_IMG_URL');?>main_62.gif" width="26" height="15" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>