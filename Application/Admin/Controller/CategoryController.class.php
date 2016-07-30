<?php  
namespace Admin\Controller;

/**
 * 分类的控制器
 * 
 */

class CategoryController extends AdminController
{
	//showlist
	
	public function showlist()
	{
		$cateModel = M('category');
		$cData = $cateModel -> order('cate_path') -> select();
		$this->assign('data', $cData);
		$this->display();
	}

	//tianjia
	
	public function tianjia()
	{
		if (IS_POST) {
			$data = I('post.');
			$cateModel = D('category');
			if ($cateModel ->add($data)) {
				$this -> success('添加成功',U('showlist'),1);
			} else {
				$this -> error('添加失败',U('tianjia'),1);
			}
		} else{
			$cateModel = D('category');
			$data = $cateModel->order('cate_path')->select();
			$this->assign('data', $data);
			$this->display();
		}
	}

	/**
	 * 编辑的方法
	 *@author:wgq
	 *时间：2016年7月24日22:01:54
	 * 
	 */
	public function edit()
	{
		if (IS_POST) {
			$data= I('post.');
			//dump($data);die;
			$cModel = D('category');
			$cdata = $cModel -> where('pid='.$data['id'])->find();
			if (empty($cdata)) {
				$rs = $cModel ->save($data);
				if ($rs) {
					$this->success('修改成功', U('showlist'),1);
				} else {
					$this->error('修改失败，再来一次',U('edit',array('id' => $data['id'])),1);
				}
			} else {
				$this -> error('他的下面有子类，不可以修改，要修改先修改子类',U('edit',array('id' => $data['id'])),1);
			}
		} else{
			$cateModel = M('category');
			$dataAll = $cateModel -> select();
			$id = I('get.id');
			$dataOne = $cateModel -> find($id);
			$this->assign('dataAll', $dataAll);
			$this->assign('dataOne', $dataOne);
			$this->display();
		}
		
	}
	/**
	 * 处理ajax联动
	 *@author :wgq
	 * 时间：2016年7月24日23:19:44
	 */
	public function getAjax()
	{
		$id = I('post.aid');
		$cModel = M('category');
		$data = $cModel -> where('pid='.$id)->select();
		$this->ajaxReturn($data);

	}

}