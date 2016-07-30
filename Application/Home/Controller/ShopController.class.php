<?php 
namespace Home\Controller;

//购物车请求的类

class ShopController extends HomeController
{
	//处理显示窗口的方法
	
	public function showShop()
	{
		// array('goods_id'=>'10','goods_name'=>'诺基亚','goods_price'=>'1750','goods_buy_number'=>'1','goods_total_price'=>1750);
		$goods_id = I('post.goods_id');
		$goodsData = M('goods')->find($goods_id);
		$arr = array(
			'goods_id' => $goods_id,
			'goods_name' => $goodsData['goods_name'],
			'goods_price' => $goodsData['goods_price'],
			'goods_buy_number' => '1',
			'goods_total_price' => $goodsData['goods_price'],
			);
		$cart = new Cart();
		$cart -> add($arr);
		$goodsInfo = $cart->getNumberPrice();
		$this->ajaxReturn($goodsInfo);
	}

	// 购物车显示模块
	
	public function shoppingcart()
	{
		$cart = new Cart();
		$shopData = $cart->getCartInfo();
	
		$goodsModel = M('goods');
		//$arr = array();
		$total = '';
		foreach ($shopData as $key => $value) {
			$data = ($goodsModel->find($value['goods_id']));
			$shopData[$key]['goods_name'] = $data['goods_name'];
			$shopData[$key]['goods_logo'] = $data['goods_small_logo'];
			$total += $value['goods_total_price']; 
		}
		//dump($shopData);
		//dump($total);
		$this -> assign('shopData', $shopData);
		$this -> assign('total', $total);
		$this->display();
	}

	//点击添加的方法
	
	public function plusOne()
	{
		$data = I('post.');
		$cart = new Cart();
		$totalPrice = $cart -> changeNumber($data['num'],$data['goods_id']);
		$this->ajaxReturn(array($totalPrice));
	}
	//删除单个操作。
	
	public function delOne()
	{
		$goods_id = I('post.goods_id');
		//echo $goods_id;die;
		$cart = new Cart();
		$cart->del($goods_id);
		$this->ajaxReturn(array('code'=>'ok'));
	}

	//订单详情的方法
	
	public function shoplist()
	{
		if (IS_POST) {
			$data = I('post.');
			$data['order_number'] = 'wgq' . date('Ymdhis') .mt_rand("10000","1999999");
			$data['add_time'] = time();
			$data['upd_time'] = time();
			$cart = new Cart();
			$priceA = $cart -> getNumberPrice();
			$data['order_price'] = $priceA['price'];
			//dump($priceA);die;
			//dump($data);
			if ($goods_id = D('order')->add($data)) {
				$this -> success('订单提交成功',U('index/index'),1);
			} else {
				$this -> error('出现点小错误，请尝试',U('showlist'),1);
			}
		} else {
			$adminId = session('adminId');
			if (!$adminId) {
				session('history_url', 'Shop/shoplist');
				$this->redirect('user/login');
			}
			$cart = new Cart();
			//$goodsModel = M('goods');
			$goods = $cart -> getCartInfo();
			$total = '';
			foreach ($goods as $key => $value) {
				$goods_id = $value['goods_id'];
				$goodsData = M('goods')->find($goods_id);
				$goods[$key]['goods_name'] = $goodsData['goods_name'];
				$goods[$key]['goods_pic'] = $goodsData['goods_small_logo'];
				$total += $value['goods_total_price'];
			}
			//dump($goods);
			$this -> assign('total', $total);
			$this->assign('goods', $goods);
			$this->display();
		}
	}
}



 ?>