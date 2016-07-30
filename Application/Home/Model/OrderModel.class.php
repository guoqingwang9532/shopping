<?php 
namespace Home\Model;
use Home\Controller\Cart;
use Think\model;

//订单的模型
class OrderModel extends model
{

	protected function _after_insert($data,$options) 
	{
		$cart = new Cart();
		$shopData = $cart -> getCartInfo();
		$arr = array();
		foreach ($shopData as $key => $val) {
			$arr['order_id'] = $data['id'];
			$arr['goods_id'] = $val['goods_id'];
			$arr['goods_price'] = $val['goods_price'];
			$arr['goods_number'] = $val['goods_buy_number'];
			$arr['goods_total_price'] = $val['goods_total_price'];
			// 将数据录入订单商品表
			M('order_goods')->add($arr);
		}

		// 清空购物车
		$cart->delall();
	}

}




 ?>