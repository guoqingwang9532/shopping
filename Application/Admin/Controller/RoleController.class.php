<?php 
namespace Admin\Controller;
use Think\Controller;

//role的类

class RoleController extends AdminController
{
	//显示角色列表
	public function showlist()
	{
		$roleModel = M('role');
		$data = $roleModel ->select();
		//dump($data);die;
		$this->assign('data',$data);
		$this->display();
	}
	/**
	 * 角色修改方法
	 *时间：2016年7月21日20:01:18
	 *@author ：wgq
	 * 
	 */
	public function edit()
	{
		$id = I('get.id');
		$roleModel = M('role');
		if (IS_POST) {
			$data = I('post.');
			//dump($data);die;
			//dump($data);
			$role_auth_ids = implode(',', $data['role_auth_id']);

			$role_auth_ac = $this->mkAc($role_auth_ids);
			//dump($role_auth_ids);die;
			$roleArr = array(
				'id' => $id,
				'role_auth_ids' => $role_auth_ids,
				'role_auth_ac' => $role_auth_ac,
				);
			//dump($roleArr);die;
			$rs = $roleModel ->save($roleArr);
			if ($rs !== false ) {
				$this ->success('修改成功',U('showlist'),1);
				exit;
			} else{
				$this->error('修改失败',U('edit',array('id'=>$id)),1);
				exit;
			}
			 
		}
		//dump($id);die;
		
		$roleData = $roleModel->where(array('id' => $id))->find();
		$role_auth_ids = $roleData['role_auth_ids'];
		//dump($role_auth_ids);die;
		$auth = M('auth');
		$authDataTop = $auth ->where('auth_level=0')->select();
		$authDatasec = $auth -> where('auth_level=1')->select();
		$this->assign('authDataTop', $authDataTop);
		$this->assign('authDatasec', $authDatasec);
		$this->assign('role_auth_ids',$role_auth_ids);
		$this->assign('role_id',$id);
		$this->display();
			
	}

	/**
	 * 构造role中ac权限的方法
	 *时间：2016年7月21日22:07:59
	 * @author :wgq
	 */
	public function mkAc($authids)
	{
		$authModel =M('auth');
		$auth = $authModel -> where('auth_level =1 and id in ('.$authids.')')->select();
		$auth_role_ac = '';
		foreach ($auth as $key => $value) {
			$auth_role_ac .= $value['auth_c'] . '-' . $value['auth_a'] . ',';
		}
		$auth_role_ac = rtrim($auth_role_ac,',');
		return $auth_role_ac;
	}
}






 ?>