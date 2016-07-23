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
#tabbar-div {
    background: #80BDCB;
    padding-left: 10px;
    height: 22px;
    padding-top: 1px;
    font-size: 12px;
}
#tabbar-div p {
    margin: 2px 0 0 0;
}
.tab-front {
    background: #bbdde5 none repeat scroll 0 0;
    border-right: 2px solid #278296;
    cursor: pointer;
    font-weight: bold;
    line-height: 20px;
    padding: 4px 15px 4px 18px;
}

.tab-back {
    border-right: 1px solid #fff;
    color: #fff;
    cursor: pointer;
    line-height: 20px;
    padding: 4px 15px 4px 18px;
}
-->
</style>

<script type="text/javascript" src="<?php echo C('PLUGIN_URL');?>ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo C('PLUGIN_URL');?>ueditor/ueditor.all.js"></script>
<script type="text/javascript" src="<?php echo C('PLUGIN_URL');?>ueditor/ueditor.parse.js"></script>
<script type="text/javascript" src="<?php echo C('AD_JS_URL');?>jquery.js"></script>
<script type="text/javascript">
  $(function() {
    $('#tabbar-div span').click(function(){
       $('#tabbar-div span').removeClass().addClass('tab-back');
       $(this).removeClass().addClass('tab-front');
       var id = $(this).attr('id');
       var ids = ['general-tab','detail-tab','mix-tab','properties-tab','gallery-tab','linkgoods-tab'];
       for (var i = 0,len=ids.length; i<len; i++) {
         $('#'+ids[i]+'-content').hide();
       }
       $('#'+id+'-content').show();
    })
  })
//添加图片
  function add_pic() {
       var html = '<tr>'
           html+='<td height="20" bgcolor="#FFFFFF" class="STYLE6">'
           html+='<div align="right"><span class="STYLE19" onclick="$(this).parent().parent().parent().remove();" >[-]商品相册：</span></div></td>'
           html+='<td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="left"><span class="STYLE19"><input type="file" name="goods_pics[]"></span> </div></td></tr>'    
            
      
      
      $('#gallery-tab-content').append(html);


  }
  //ajax删除操作
  function delImg(id) {
    var url = '/index.php/Admin/Goods/delAjax';
    $.post(url,{'id':id},function(data){
      if (data.status == 1) {
        $('#pic_'+id).remove();
      }
      //alert(data);

    },'json')
    //alert(id);
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
                <td width="94%" valign="bottom"><span class="STYLE1"> 商品管理 -> 添加商品</span></td>
              </tr>

            </table></td>
            <td><div align="right"><span class="STYLE1"> 
            <a href="<?php echo U('showlist');?>">返回</a>   &nbsp; </span>
              <span class="STYLE1"> &nbsp;</span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr> 
    <td colspan="10">
      <div id="tabbar-div">
          <p>
            <span class="tab-front" id="general-tab">通用信息</span>
            <span class="tab-back" id="detail-tab">详细描述</span>
            <span class="tab-back" id="mix-tab">其他信息</span>
            <span class="tab-back" id="properties-tab">商品属性</span>
            <span class="tab-back" id="gallery-tab">商品相册</span>
            <span class="tab-back" id="linkgoods-tab">关联商品</span>
          </p>
        </div>
      </td>
    </tr>
  <tr>
    <td>
      <form action="/index.php/Admin/Goods/edit/id/10.html" method="post" enctype="multipart/form-data">
      
        <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce" id="general-tab-content">

          <tr>
            <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">商品名称：</span></div></td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
            <input type="text" name="goods_name" value="<?php echo ($data['goods_name']); ?>" />
            <input type='hidden' name='id' value='<?php echo ($data["id"]); ?>'/>
            </div></td>
          </tr>
          <tr>
            <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">价格：</span></div></td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left"><input type="text" name="goods_price" value="<?php echo ($data['goods_price']); ?>" /></div></td>
          </tr>
          <tr>
            <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">数量：</span></div></td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left"><input type="text" name="goods_number"  value="<?php echo ($data['goods_number']); ?>"/></div></td>
          </tr>
          <tr>
            <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">重量：</span></div></td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left"><input type="text" name="goods_weight"  value="<?php echo ($data['goods_weight']); ?>"/></div></td>
          </tr>
           <tr>
            <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">商品logo：</span></div></td>
            <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left"><input type="file" name="goods_logo"><img src="<?php echo C('SITE_URL'); echo (substr($data['goods_small_logo'],2)); ?>"></div></td>
          </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce" id='detail-tab-content'style='display: none;'>
            <tr>
              <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">详情描述：</span></div></td>
              <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
              <textarea id="goods_introduce" style="width:500px;height:200px;" name="goods_introduce" rows="5" cols="30"><?php echo ($data['goods_introduce']); ?></textarea>
              </div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce" id='mix-tab-content'style='display: none;'>
            <tr>
              <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">其他信息：</span></div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce" id='properties-tab-content'style='display: none;'>
            <tr>
              <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">商品属性：</span></div></td>
            </tr>
          </table>
          <!-- 图片相册 -->
          <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce" id='gallery-tab-content'style='display: none;'>
            <tr>

              <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="left">
                <?php if(is_array($imgsrc)): $i = 0; $__LIST__ = $imgsrc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><span class="STYLE19" onclick='delImg(<?php echo ($vol["id"]); ?>)' id='pic_<?php echo ($vol["id"]); ?>'>
                    <img src="<?php echo C('SITE_URL'); echo (substr($vol['goods_pics_s'],2)); ?>">&nbsp;
                  </span><?php endforeach; endif; else: echo "" ;endif; ?>
              </div></td></tr>
              <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19" onclick='add_pic()'>[+]商品相册：</span></div></td>
              <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="left"><span class="STYLE19"><input type='file' name='goods_pics[]'></span></div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce" id='linkgoods-tab-content'style='display: none;'>
            <tr>
              <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">关联商品：</span></div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
          <tr>
            <td height="20" colspan="2" bgcolor="#FFFFFF" class="STYLE6"><div align="center">
              <input type="submit" value="修改商品" />
            </div></td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
</table>

<script type="text/javascript">
  var ue = UE.getEditor('goods_introduce' , { toolbars: [[
            'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|','simpleupload', 'insertimage'
        ]]});
</script>
</body>
</html>