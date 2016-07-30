<?php 
namespace Admin\Model;
use Think\Model;

//分类的model，主要是调用添加后的后接函数用的

class CategoryModel extends Model
{
	//成功添加后调用的方法，需要重写
	protected function _after_insert($data,$options) 
	{
		$pid = $data['pid'];
		if ($pid == 0) {
			$cate_path = $data['id'];
			$cate_level = 0 ;
		} else {
			$cmodel = D('category');
			$cData  = $cmodel -> where('id='.$pid)->find();
			$cate_path = $cData['cate_path'].'-'.$data['id'];
			$cate_level= $cData['cate_level'] + 1;
			//echo $cate_level;die;
		}
		 M('category')->save(array(
				'id' => $data['id'],
				'cate_path' => $cate_path,
				'cate_level'=> $cate_level,
			));

	}

	//成功更新后调用的方法
	 protected function _after_update($data,$options)
	 {
	 	//dump($data);die;
	 	if ($data['pid'] == 0) {
	 		$cate_path = $data['id'];
	 		$cate_level = 0;
	 	} else{
		 	$pid = $data['pid'];
		 	$cModel = D('category');
		 	$data1 = $cModel -> where('id='.$pid)->find();
		 	$cate_path = $data1['cate_path'] . '-' . $data['id'];
		 	//echo $cate_path;die;
		 	$cate_level = $data['cate_level'] + 1;
	 	}

	 	$cModel = M('category');
	 	$cModel ->save(
	 		array(
	 			'id' => $data['id'],
	 			'cate_path' => $cate_path,
	 			'cate_level' => $cate_level,
	 			)

	 		);

	 }

}







 ?>