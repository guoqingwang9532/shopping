<?php 
namespace Admin\Controller;
use Think\Controller;

/**
 * 处理权限的公共的类，防止翻墙
 *@author :wgq
 *2016年7月22日12:37:04
 */

class AdminController extends Controller
{
	//构造函数，在继承时自动调用
	
	public function __construct()
	{
		parent::__construct();
		$role_id = session('role_id');
		$roleModel = M('role');
		$adminName = session('admin_name');
		$nowAc = CONTROLLER_NAME . '-' .ACTION_NAME;
		$nowAc = strtolower($nowAc);
		//echo $nowAc;die;
	     if (empty($adminName)) {
	     	$commonAuthAc = 'maneger-capache,maneger-login';
	     	if (strpos($commonAuthAc, $nowAc) === false) {
	     		$this->redirect('Maneger/login');
	     		//echo "string";die;
	     	}
	      	
	     } else {
	     		if ($adminName !== 'admin') {
					$roleData = $roleModel ->find($role_id);
					$roleAuthAc = strtolower($roleData['role_auth_ac']);
					//echo $roleAuthAc;die;
					//dump($roleAuthAc);die;
					//dump($nowAc);die;
					$commonAuthAc = 'index-index,index-left,index-right,index-center,index-down,index-top,maneger-capache,maneger-login,maneger-logout';
					
					if (strpos($roleAuthAc, $nowAc) === false && strpos($commonAuthAc,$nowAc) === false) {
						exit('非法用户');
					}
			}
	   	  }
	}
}







