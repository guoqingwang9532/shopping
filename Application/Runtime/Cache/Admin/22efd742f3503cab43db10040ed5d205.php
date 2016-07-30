<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
<!-- 	<select id='province'>
	<option>省份/直辖市</option>
	遍历省份/直辖市信息
        <?php if(is_array($data)): foreach($data as $key=>$p): ?><option value="<?php echo ($p["id"]); ?>"><?php echo ($p["name"]); ?></option><?php endforeach; endif; ?>
</select> -->
	<table>
	<tr>
		<td>id</td>
		<td>省</td>
		
	</tr>
	<?php if(is_array($province)): foreach($province as $key=>$province): ?><tr>
			<td><?php echo ($province["id"]); ?></td>
			<td><?php echo ($province["name"]); ?></td>
			
		</tr><?php endforeach; endif; ?>
</table>


	<select id='province'>
		<option>省份/直辖市</option>
		<!-- 遍历省份/直辖市信息 -->
        <?php if(is_array($province)): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><option value="<?php echo ($p["id"]); ?>"><?php echo ($p["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>>
</select>
</body>
</html>