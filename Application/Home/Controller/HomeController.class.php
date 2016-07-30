<?php 
namespace Home\Controller;
use Think\Controller;

//集中继承的前台模板

class HomeController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$categoryModel = M('category');
		$cateA = $categoryModel -> where('cate_level=0') ->select();
		$cateB = $categoryModel -> where('cate_level=1') ->select();
		$cateC = $categoryModel -> where('cate_level=2') ->select();
		$this -> assign('cateA', $cateA);
		$this -> assign('cateB', $cateB);
		$this -> assign('cateC', $cateC);
		//dump($cateC);


	}
}








