<?php  
namespace Admin\Controller;
use Think\Controller;

//管理员登录界面

class ManegerController extends Controller
{
	//登录
	public function login()
	{
		//验证 验证码和用户的个人信息
		if (IS_POST) {
			$data = I('post.');
			$verify = new \Think\Verify();
			if ($verify -> check($data['capache'])) {
				$manegerModel = M('manager');
				$info = $manegerModel -> where(array('name' => $data['name']))->find();
				if ($info['pwd'] == $data['pwd']) {
					session('admin_name', $info['name']);
					session('admin_id', $info['id']);
					session('role_id', $info['role_id']);
					$this->redirect('Index/index');

				} else {
					$this->error('哼哼，没有这个用户呦',U('login'),1);
				}
				
			} else {
				$this->error('验证码有误，请检查',U('login'),1);
			}
		} else {

		$this->display();
		}
	}

	/**
	 * 登录验证码方法
	 *@author :wgq
	 *时间：2016年7月21日12:35:43
	 * 
	 */
	 
	 public function capache()
	 {
	 	$config = array(
		 	'fontSize'  =>  9,              // 验证码字体大小(px)
	        'useCurve'  =>  false,            // 是否画混淆曲线
	        'useNoise'  =>  false,            // 是否添加杂点	
	        'imageH'    => 17,               // 验证码图片高度
	        'imageW'    => 50,               // 验证码图片宽度
	        'length'    =>  3,               // 验证码位数
	        'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
	 		);
	 	$verify = new \Think\Verify($config);
	 	$verify -> entry();
	 }

	 /**
	  * 退出方法
	  *@author :wgq
	  *时间：2016年7月21日13:17:25
	  * 
	  */
	 public function logout()
	 {
	 	session(null);
	 	$this->redirect('Maneger/login');
	 }
}



