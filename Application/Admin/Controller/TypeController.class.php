<?php 
namespace Admin\Controller;


/**
 * 商品类型的类
 *时间：2016年7月22日18:32:29
 * @author:wgq
 */

class TypeController extends AdminController
{

	//显示列表
	
	public function showlist()
	{
		$typeModel = M('type');
		$data = $typeModel -> select();
		$this->assign('data', $data);
		$this->display();
	}

	//添加方法
	
	public function tianjia()
	{
		if (IS_POST) {
			$data = I('post.');
			$typeModel = M('type');
			$rs = $typeModel ->add($data);
			if ($rs) {
				$this->success('添加成功',U('showlist'),1);
				exit;
			} else {
				$this->error('添加失败',U('tianjia'),1);
			}
		} else {
			$this->display();
		}
		
	}
}




 ?>