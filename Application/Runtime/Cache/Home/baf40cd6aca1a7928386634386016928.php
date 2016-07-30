<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>填写核对订单信息</title>
	<link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" type="text/css">
	<link rel="stylesheet" href="<?php echo C('CSS_URL');?>global.css" type="text/css">
	<link rel="stylesheet" href="<?php echo C('CSS_URL');?>header.css" type="text/css">
	<link rel="stylesheet" href="<?php echo C('CSS_URL');?>fillin.css" type="text/css">
	<link rel="stylesheet" href="<?php echo C('CSS_URL');?>footer.css" type="text/css">

	<script type="text/javascript" src="<?php echo C('JS_URL');?>jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="<?php echo C('JS_URL');?>cart2.js"></script>

</head>
<body>
	<!-- 顶部导航 start -->
	<div class="topnav">
		<div class="topnav_bd w990 bc">
			<div class="topnav_left">
				
			</div>
			<div class="topnav_right fr">
				<ul>
					<li>您好，欢迎来到京西！[<a href="login.html">登录</a>] [<a href="register.html">免费注册</a>] </li>
					<li class="line">|</li>
					<li>我的订单</li>
					<li class="line">|</li>
					<li>客户服务</li>

				</ul>
			</div>
		</div>
	</div>
	<!-- 顶部导航 end -->
	
	<div style="clear:both;"></div>
	
	<!-- 页面头部 start -->
	<div class="header w990 bc mt15">
		<div class="logo w990">
			<h2 class="fl"><a href="index.html"><img src="<?php echo C('IMG_URL');?>logo.png" alt="京西商城"></a></h2>
			<div class="flow fr flow2">
				<ul>
					<li>1.我的购物车</li>
					<li class="cur">2.填写核对订单信息</li>
					<li>3.成功提交订单</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 页面头部 end -->
	
	<div style="clear:both;"></div>

	<!-- 主体部分 start -->
	<div class="fillin w990 bc mt15">
		<div class="fillin_hd">
			<h2>填写并核对订单信息</h2>
		</div>
		<form action='/index.php/Home/Shop/shoplist.html' method='post'> 
		<div class="fillin_bd">
			<!-- 收货人信息  start-->
			<div class="address">
				<h3>收货人信息 <a href="javascript:;" id="address_modify">[修改]</a></h3>
				<div class="address_info">
					<p>王超平  13555555555 </p>
					<p>北京 昌平区 西三旗 建材城西路金燕龙办公楼一层 </p>
				</div>

				<div class="address_select none">
					<ul>
						<li class="cur">
							<input type="radio" name="cgn_id" value="1" checked="checked" />王超平 北京市 昌平区 建材城西路金燕龙办公楼一层 13555555555 
							<a href="">设为默认地址</a>
							<a href="">编辑</a>
							<a href="">删除</a>
						</li>
						<li>
							<input type="radio" name="cgn_id"  value="2"/>王超平 湖北省 武汉市  武昌 关山光谷软件园1号201 13333333333
							<a href="">设为默认地址</a>
							<a href="">编辑</a>
							<a href="">删除</a>
						</li>
						<li><input type="radio" name="address" class="new_address"  />使用新地址</li>
					</ul>	
						<ul>
							<li>
								<label for=""><span>*</span>收 货 人：</label>
								<input type="text" name="" class="txt" />
							</li>
							<li>
								<label for=""><span>*</span>所在地区：</label>
								<select name="" id="">
									<option value="">请选择</option>
									<option value="">北京</option>
									<option value="">上海</option>
									<option value="">天津</option>
									<option value="">重庆</option>
									<option value="">武汉</option>
								</select>

								<select name="" id="">
									<option value="">请选择</option>
									<option value="">朝阳区</option>
									<option value="">东城区</option>
									<option value="">西城区</option>
									<option value="">海淀区</option>
									<option value="">昌平区</option>
								</select>

								<select name="" id="">
									<option value="">请选择</option>
									<option value="">西二旗</option>
									<option value="">西三旗</option>
									<option value="">三环以内</option>
								</select>
							</li>
							<li>
								<label for=""><span>*</span>详细地址：</label>
								<input type="text" name="" class="txt address"  />
							</li>
							<li>
								<label for=""><span>*</span>手机号码：</label>
								<input type="text" name="" class="txt" />
							</li>
						</ul>
					<a href="" class="confirm_btn"><span>保存收货人信息</span></a>
				</div>
			</div>
			<!-- 收货人信息  end-->

			<!-- 配送方式 start -->
			<div class="delivery">
				<h3>送货方式 <a href="javascript:;" id="delivery_modify">[修改]</a></h3>
				<div class="delivery_info">
					<p>普通快递送货上门</p>
					<p>送货时间不限</p>
				</div>

				<div class="delivery_select none">
					<table>
						<thead>
							<tr>
								<th class="col1">送货方式</th>
								<th class="col2">运费</th>
								<th class="col3">运费标准</th>
							</tr>
						</thead>
						<tbody>
							<tr class="cur">	
								<td>
									<input type="radio" name="order_post" value="0" name="delivery" checked="checked" />圆通
									<select name="" id="">
										<option value="">时间不限</option>
										<option value="">工作日，周一到周五</option>
										<option value="">周六日及公众假期</option>
									</select>
								</td>
								<td>￥10.00</td>
								<td>每张订单不满499.00元,运费15.00元, 订单4...</td>
							</tr>
							<tr>
								
								<td><input type="radio" name="order_post" value="1" />申通</td>
								<td>￥40.00</td>
								<td>每张订单不满499.00元,运费40.00元, 订单4...</td>
							</tr>
							<tr>
								
								<td><input type="radio" name="order_post" value="2" />顺丰</td>
								<td>￥40.00</td>
								<td>每张订单不满499.00元,运费40.00元, 订单4...</td>
							</tr>
						</tbody>
					</table>
					<a href="" class="confirm_btn"><span>确认送货方式</span></a>
				</div>
			</div> 
			<!-- 配送方式 end --> 

			<!-- 支付方式  start-->
			<div class="pay">
				<h3>支付方式 <a href="javascript:;" id="pay_modify">[修改]</a></h3>
				<div class="pay_info">
					<p>支付宝</p>
				</div>

				<div class="pay_select none">
					<table> 
						<tr class="cur">
							<td class="col1"><input type="radio" checked name="order_pay" value="0"/>支付宝</td>
							<td class="col2">送货上门后再收款，支持现金、POS机刷卡、支票支付</td>
						</tr>
						<tr>
							<td class="col1"><input type="radio" name="order_pay" value="1" />微信</td>
							<td class="col2">即时到帐，支持绝大数银行借记卡及部分银行信用卡</td>
						</tr>
						<tr>
							<td class="col1"><input type="radio" name="order_pay" value="2">银行卡快捷支付</td>
							<td class="col2">自提时付款，支持现金、POS刷卡、支票支付</td>
						</tr>
					</table>
					<a href="" class="confirm_btn"><span>确认支付方式</span></a>
				</div>
			</div>
			<!-- 支付方式  end-->

			<!-- 发票信息 start-->
			<div class="receipt">
				<h3>发票信息 <a href="javascript:;" id="receipt_modify">[修改]</a></h3>
				<div class="receipt_info">
					<p>个人发票</p>
					<p>内容：明细</p>
				</div>

				<div class="receipt_select none">
						<ul>
							<li>
								<label for="">发票抬头：</label>
								<input type="radio" name="order_fapiao_title" checked="checked" value="0" class="personal"/>个人
								<input type="radio" name="order_fapiao_title" value="1" class="company"/>单位
								<input type="text" name="order_fapiao_company" class="txt company_input" disabled="disabled" />
							</li>
							<li>
								<label for="">发票内容：</label>
								<input type="radio" name="order_fapiao_content" value="明细" checked="checked"  />明细
								<input type="radio" name="order_fapiao_content"value="办公用品" />办公用品
									<input type="radio" name="order_fapiao_content" value="体育休闲" />体育休闲
									<input type="radio" name="order_fapiao_content" value="耗材" />耗材
							</li>
						</ul>						
					<a href="" class="confirm_btn"><span>确认发票信息</span></a>
				</div>
			</div>
			<!-- 发票信息 end-->

			<!-- 商品清单 start -->
			<div class="goods">
				<h3>商品清单</h3>
				<table>
					<thead>
						<tr>
							<th class="col1">商品</th>
							<th class="col2">规格</th>
							<th class="col3">价格</th>
							<th class="col4">数量</th>
							<th class="col5">小计</th>
						</tr>	
					</thead>
					<tbody>
						<?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
								<td class="col1"><a href=""><img src="<?php echo C('SITE_URL'); echo (substr($vol["goods_pic"],2)); ?>" alt="" /></a>  <strong><a href=""><?php echo ($vol["goods_name"]); ?></a></strong></td>
								<td class="col2"> <p>颜色：073深红</p> <p>尺码：170/92A/S</p> </td>
								<td class="col3">￥<?php echo ($vol["goods_price"]); ?></td>
								<td class="col4"> <?php echo ($vol["goods_buy_number"]); ?></td>
								<td class="col5"><span>￥<?php echo ($vol["goods_total_price"]); ?></span></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="5">
								<ul>
									<li>
										<span>4 件商品，总商品金额：</span>
										<em>￥<?php echo ($total); ?></em>
									</li>
									<li>
										<span>返现：</span>
										<em>-￥240.00</em>
									</li>
									<li>
										<span>运费：</span>
										<em>￥10.00</em>
									</li>
									<li>
										<span>应付总额：</span>
										<em>￥<?php echo ($total); ?></em>
									</li>
								</ul>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- 商品清单 end -->
		
		</div>

		<div class="fillin_ft">
			<a href="javascript:;" onclick='$("form").submit()'><span >提交订单</span></a>
			<p>应付总额：<strong>￥<?php echo ($total); ?></strong></p>
			
		</div>
		</form>
	</div>
	<!-- 主体部分 end -->

	<div style="clear:both;"></div>
	<!-- 底部版权 start -->
	<div class="footer w1210 bc mt15">
		<p class="links">
			<a href="">关于我们</a> |
			<a href="">联系我们</a> |
			<a href="">人才招聘</a> |
			<a href="">商家入驻</a> |
			<a href="">千寻网</a> |
			<a href="">奢侈品网</a> |
			<a href="">广告服务</a> |
			<a href="">移动终端</a> |
			<a href="">友情链接</a> |
			<a href="">销售联盟</a> |
			<a href="">京西论坛</a>
		</p>
		<p class="copyright">
			 © 2005-2013 京东网上商城 版权所有，并保留所有权利。  ICP备案证书号:京ICP证070359号 
		</p>
		<p class="auth">
			<a href=""><img src="<?php echo C('IMG_URL');?>xin.png" alt="" /></a>
			<a href=""><img src="<?php echo C('IMG_URL');?>kexin.jpg" alt="" /></a>
			<a href=""><img src="<?php echo C('IMG_URL');?>police.jpg" alt="" /></a>
			<a href=""><img src="<?php echo C('IMG_URL');?>beian.gif" alt="" /></a>
		</p>
	</div>
	<!-- 底部版权 end -->
</body>
</html>