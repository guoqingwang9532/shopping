<?php 
namespace Home\Controller;
use Think\Controller;

//前台商品控制器
class GoodsController extends HomeController
{
	//商品的展示
	public function showlist()
	{
		$id = I('get.cat_id');
		$cateModel = M('category');
		$data = $cateModel -> find($id);
		$gits = '';
		$cateDate = '';
		if ($data['pid'] == 0) {
			$cateDate = M('goods') -> field('group_concat(id) gits ' ) -> where(' cat_id='.$id) ->find();
			dump($cateDate);
		} else {
			$cateDate = M('goods_cat') ->field('group_concat(goods_id) gits ') -> where(' cat_id='.$id) ->find();

		}
		//dump($cateDate);die;
		$gits = $cateDate['gits'];
		//echo $gits;die;
		$goodsData = M('goods') -> select($gits);
		//dump($goodsData);die;
		$this->assign('goodsData', $goodsData);
		$this->display();
	}

	//商品详细页
	public function detail()
	{
		$goods_id = I('get.goods_id');
		$goodsData = M('goods')->find($goods_id);
		$single = M()->query('select a.*, b.attr_value from attr as a left join goods_attr as b on a.id = b.attr_id where a.attr_sel="0" and b.goods_id='.$goods_id);
		$more = M()->query('select a.*, group_concat(b.attr_value) git from attr as a left join goods_attr as b on a.id = b.attr_id where a.attr_sel="1" and b.goods_id='.$goods_id.' group by a.id');
		
		foreach ($more as $key => $value) {
			$more[$key]['git'] = explode(',', $value['git']);
		}
		//dump($more);die;
		$goods_pics = M('goods_pics')->where('goods_id='.$goods_id) ->select();
		//dump($goods_pics);
		$this->assign('goodsData', $goodsData);
		$this->assign('single', $single);
		$this->assign('goods_pics', $goods_pics);
		$this->assign('more', $more);
		$this->display();
	}
}






 ?>