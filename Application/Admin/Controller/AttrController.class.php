<?php 
namespace Admin\Controller;

/**
 * 属性的类
 *时间：2016年7月22日19:20:27
 *@author :wgq
 * 
 */

class AttrController extends AdminController
{
	//showlist
	public function showlist()
	{
		$attr = M('attr');
		$type = M('type');
		$typeData = $type->select();
		$data = $attr->alias('t1') ->field('t1.*,t2.type_name')->join('left join type as t2 on t1.type_id = t2.id')->select();
		//$data = $attr->field('t1.*,t2.type_name')->table('attr as t1, type as t2') -> where('t1.type_id = t2.id')->select();
		//dump($data);die;		
		$this->assign('data', $data);
		$this->assign('typeData', $typeData);
		$this->display();
	}

	//tianjia
	
	public function tianjia()
	{
		if (IS_POST) {
			$data = I('post.');
			//dump($data);
			$attrModel = M('attr');
			$rs = $attrModel -> add($data);
			if ($rs) {
				$this->success('添加成功', U('showlist'), 1);
			} else {
				$this->error('添加失败', U('tianjia'), 1);
			}
		} else {
			$typeModel = M('type');
			$typeData = $typeModel -> select();
			$this->assign('typeData', $typeData);
			$this->display();
		}
	}

	/**
	 * ajax查询本类显示本身属性的方法
	 *@author :wgq
	 * 时间：2016年7月22日22:22:17
	 * 
	 */
	public function ajaxR()
	{
		$id = I('post.id');
		$attrModel = M('attr');
		$attrData = $attrModel->alias('t1') ->field('t1.*,t2.type_name')->join('left join type as t2 on t1.type_id = t2.id')->where(array('t1.type_id' => $id))->select();
		$this->ajaxReturn($attrData);

	}
}




 ?>