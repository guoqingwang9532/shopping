<?php 
namespace Home\Controller;
use Think\Controller;

//用户登录的控制器

class UserController extends Controller
{
	//用户登录
	public function login()
	{
		if (IS_POST) {
			$data = I('post.');
			$verity = new \Think\Verify();
			$captche = $verity -> check($data['checkcode']);
			if ($captche) {
				$uModel = M('user');
				$data = $uModel -> where(array('name' => "{$data['username']}",'pwd' => "{$data['password']}")) ->find();
				if (!$data) {
					$this->error('用户名和密码有误', U('login'), 1);
				} else {
					session('adminName', $data['name']);
					session('adminId', $data['id']);
					$history_url = session('history_url');
					if ($history_url) {
						session('history_url', null);
						$this->redirect($history_url);
					}
					$this->redirect('index/index');
				}
			} else {
				$this -> error('验证码有误', U('login'), 1);
			}
		} else{
			$this->display();
		}
		
	}
	//注册
	public function register()
	{
		if (IS_POST) {
			$data = I('post.');
			$verity = new \Think\Verify();
			$captche = $verity -> check($data['checkcode']);
			if ($captche) {
				if ($data['pwd'] !== $data['repwd']) {
					$this -> error('两次输入的密码不一致',U('User/register'),1);
				} else {
					$userModel = M('user');
					$uData = $userModel ->where('name="'.$data['name'].'"')-> find();
					if (!$uData) {
						$data['add_time'] = time();
						$userModel ->add($data);
						$this->redirect('Index/index');
					} else {
						$this->error('该用户已经被注册',U('register'),1);
					}
				}
			} else {
				$this -> error('验证码有误',U('User/register'),1);
			}
		} else {
			$this->display();
		}
		//dump($data);
		
	}
	//验证码
	public function captche()
	{
		$config = array(
			'fontSize'  =>  20,              // 验证码字体大小(px)
	        'useCurve'  =>  false,            // 是否画混淆曲线
	        'useNoise'  =>  false,            // 是否添加杂点	
	        'imageH'    => 36,               // 验证码图片高度
	        'imageW'    => 150,               // 验证码图片宽度
	        'length'    =>  4,               // 验证码位数
	        'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
			);
		$verity = new \Think\Verify($config);
		$verity ->entry();
	}
}








