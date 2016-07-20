<?php 

function fangXSS($string) {
	require_once './Application/Common/Plugin/htmlpurifier/HTMLPurifier.auto.php';
	// 生成配置对象
	$config = HTMLPurifier_Config::CreateDefault();
	// 配置$
	$config ->set('Core.Encoding' , "UTF-8");
	// 设置允许html的标签
	$config->set('HTML.Allowed','div,b,strong,i,em,a[href|title],ul,ol,li,p[style],br,span[style],img[width,height|alt|src]');
	// 设置允许的css样式
	$config->set('CSS.AllowedProperties','font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align');
	// 设置a标签上的target=“_blank”
	$config->set('HTML.targetBlack',TRUE);
	// 使用配置初始化对象
	$hpf = new HTMLPurifier($config);
	// 过滤字符串
	return $hpf->purify($string);
}





 ?>