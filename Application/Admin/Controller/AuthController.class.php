<?php 
namespace Admin\Controller;
use Think\Controller;

//管理权限的类

class AuthController extends Controller
{
	//showlist
	public function showlist()
	{
		$authModel = M('auth');
		$authData = $authModel -> order('auth_path') ->select();
		//dump($authData);die;
		$this->assign('authData', $authData);
		$this->display();
	}

	/**
	 * 权限添加方法
	 *时间：2016年7月21日23:09:05
	 *@author :wgq
	 * 
	 */
	
	public function tianjia()
	{

		$authModel = M('auth');
		if (IS_POST) {
			$data = I('post.');
			$rs = $authModel -> add($data);
			if ($rs) {
				$this->UpAuthPath($rs,$data);
				$this->success('添加成功',U('showlist'),1);
				exit;
			} else {
				$this->error('添加失败',U('tianjia'),1);
				exit;
			}
		}
		$authData = $authModel ->order('auth_path') ->select();
		//dump($authData);die;
		$this->assign('authData', $authData);
		$this->display();
	}

	/**
	 * 更新权限的auth_path和auth_level的方法
	 *时间:2016年7月21日23:29:43
	 * @author :wgq
	 */
	public function UpAuthPath($id, $data)
	{
		$authModel = M('auth');
		if ($data['auth_pid'] == 0) {
			$auth_path = $id;
			$auth_level = 0;
		} else {
			$authInfo = $authModel -> where(array('id' => $id)) ->find();
			//dump($authInfo);die;
			$authPid = $authInfo['auth_pid'];
			$authPidInfo = $authModel -> where(array('id' => $authPid)) ->find();
			$auth_path = $authPidInfo['auth_path'] . '-' . $id;
			$auth_level = $authPidInfo['auth_level'] + 1;
		}
		$arr = array(
			'id' => $id,
			'auth_path' => $auth_path,
			'auth_level' => $auth_level,
			);
		$authModel ->save($arr);
	}
}


 ?>