<?php 
namespace Admin\Controller;
use Think\Controller;

//后台页面控制器

class IndexController extends AdminController
{
	//主页
	public function index()
	{
		$this->display();
	}

	//top
	public function top()
	{
		$this->display();
	}
	//center
	
	public function center()
	{
		$this->display();
	}
	//left
	/**
	 * 	根据自身的权限处理左边栏显示
	 *时间：2016年7月21日18:46:33
	 * 
	 * @return [type] [description]
	 */
	public function left()
	{
		$role_id = session('role_id');
		$admin_name = session('admin_name');
		$authModel = M('auth');
		if ($admin_name == 'admin') {
			$authtop = $authModel ->where('auth_level=0')->select();
			$authsec = $authModel ->where('auth_level=1')->select();
			/*dump($authtop);
			echo "<br>";
			dump($authsec);die;*/
		} else {
		//echo $role_id;die;
			$roleModel = M('role');
			$data = $roleModel -> where(array('id' => $role_id))->find();
			$role_auth_ids = $data['role_auth_ids'];
			
			$authtop = $authModel ->where('auth_level=0 and id in ('.$role_auth_ids.')')->select();
			$authsec = $authModel ->where('auth_level=1 and id in ('.$role_auth_ids.')')->select();
		}
		/*dump($authtop);
		echo "<br>";
		dump($authsec);die;*/
		$this->assign('authtop', $authtop);
		$this->assign('authsec', $authsec);
		$this->display();
	}

	//down 
	
	public function down()
	{
		$this->display();
	}
	//right
	
	public function right()
	{
		$this->display();
	}
	//
}





