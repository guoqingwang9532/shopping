<?php 
namespace Admin\Controller;
use Think\Controller;
//用户添加

class GoodsController extends AdminController
{
	//用户添加
	public function tianjia()
	{
		if (IS_POST) {
			/*$data = I('post.');
			dump($data);die;*/
			$model = M('goods');
			$data = $model->create();
			//$data['add_time'] = $data['update_time'] = time();
			$data['add_time'] = time();
			$data['update_time'] = time();
			//dump($data);die;
			//dump($data);die;
			$data['goods_introduce'] = fangXSS($_POST['goods_introduce']);
			
			$this->upload($data);
			//dump($data);die;
				if ($goods_id = $model->add($data)) {
					$this ->uploadMore($goods_id);
					$this->goodsAttr($goods_id);
					$this->deal_goods($goods_id);
					$this->success('添加成功',U('showlist'),1);
					exit;
				} else {
					$this->error('失败',U('tianjia'),1);
					exit;
				}
			
		} else {
			$typeModel = M('type');
			$data = $typeModel->select();
			$cModel = M('category');
			$cData = $cModel -> where('pid=0')->select();
			$this->assign('cData', $cData);
			$this->assign('data', $data);
			$this->display();
		}

	}

	//列表
	
	public function showlist()
	
	{
		$model = M('goods');
		$data = $model->select();
		//dump($data);
		$this->assign('data', $data);
		$this->display();
	}
	/**
	 *通用的上传方法
	 * @author：wgq
	 * 时间：2016年7月20日10:04:02
	 * 
	 */
	
	public function upload(&$data)
	{
		//判断修改数据
		if ($_FILES['goods_logo']['error'] === 0 ) {
			# code...
			
			if (isset($data['id']) && $data['id'] !=='') {
				$goods_model = M('goods');
				$detail = $goods_model ->where(array('id' => $data['id'])) -> find();
				//dump($detail);die;
				unlink($detail['goods_big_logo']);
				unlink($detail['goods_small_logo']);
			
				//echo "ok";
			}
	
		$upload = new \Think\Upload();// 实例化上传类      
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 
		$upload->rootPath  =  './Uploads/' ;  
		$upload->savePath  =      'logo/'; // 设置附件上传目录
		$rs = $upload -> uploadOne($_FILES['goods_logo']);
		//dump($rs);die;
		//拼凑路径
		$goods_big_logo = $upload ->rootPath . $rs['savepath'] . $rs['savename'];
		//echo $goods_big_logo;die;
		
		//制作缩略图
		$image = new \Think\Image(); 
		$image->open($goods_big_logo);// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
		//拼凑缩略图路径
		$goods_small_logo = $upload ->rootPath . $rs['savepath'] . 'S_' . $rs['savename'];
		$image->thumb(100, 100)->save($goods_small_logo);
		$data['goods_big_logo'] = $goods_big_logo;
		$data['goods_small_logo'] = $goods_small_logo;	
		}
	}

	/**
	 * 实现相册的上传功能呢
	 *@author :wgq
	 * time : 2016年7月20日10:53:11
	 */
	public function uploadMore($goods_id)
	{
		//dump($_FILES['goods_pics']);die;
		//判断是否有上传
		$isUpload = false;
		foreach($_FILES['goods_pics']['error'] as $v) {
			if ($v === 0) {
				$isUpload = true;
			}
		}
		if ($isUpload) {

			$upload = new \Think\Upload();// 实例化上传类      
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 
			$upload->rootPath  =  './Uploads/' ;  
			$upload->savePath  =      'goods/'; // 设置附件上传目录
			$rs = $upload -> upload(array($_FILES['goods_pics']));
			//dump($rs);die;
			$image = new \Think\Image(); 
			foreach ($rs as $key => $value) {
				//制作缩略图
				$path = $upload -> rootPath . $value['savepath'] . $value['savename'];
				$image->open($path);
				$sPath = $upload -> rootPath . $value['savepath'] . 'S_' . $value['savename'];
				$mPath = $upload -> rootPath . $value['savepath'] . 'M_' . $value['savename'];
				$bPath = $upload -> rootPath . $value['savepath'] . 'B_' . $value['savename'];
				$image->thumb(54,54)->save($sPath);
				$image->thumb(350,350)->save($mPath);
				$image->thumb(800,800)->save($bPath);
				//添加到goods_pics表中
				$model = M('goods_pics');
				$arr = array(
						'goods_id' => $goods_id,
						'goods_pics_b' => $bPath,
						'goods_pics_m' => $mPath,
						'goods_pics_s' => $sPath,
					);
				$model -> add($arr);

			}

		}
	}

	/**
	 * 实现修改的方法
	 *@author :wgq
	 *时间：2016年7月20日11:36:47
	 * 
	 */
	public function edit()
	{
		if (IS_POST) {
			$data = I('post.');
			//$data
			//dump($data);die;
			$data['update_time'] = time();
			$data['goods_introduce'] = fangXSS($_POST['goods_introduce']);
			
			if ($_FILES['goods_logo']['error'] === 0) {
				$this -> upload($data);
			}
			$goods_model = M('goods');
			$rs = $goods_model ->save($data);
			if ($rs !== false) {
				$this->uploadMore($data['id']);
				$this->success('修改成功',U('showlist'),1);
			} else {
				$this->error('修改失败，请再尝试一次',U('edit',array('id' => $data['id'])),1);
			} 
		} else {
			$id = I('get.id');
			//dump($id);die;
			$goods_model = M('goods');
			$data = $goods_model -> where(array('id' => $id)) ->find();
			//dump($data);die;
			$goods_pics = M('goods_pics');
			$imgsrc = $goods_pics -> where(array('goods_id' => $id)) -> select();
			//dump($imgsrc);die;
			$this->assign('data', $data);
			$this->assign('imgsrc', $imgsrc);
			$this->display();
		}
	}
	/**
	 *利用ajax删除图片
	 *@author :wgq
	 *时间：2016年7月20日15:17:32
	 * 
	 */
	 public function delAjax()
	 {
	 	$id = I('post.id');
	 	//echo $id;
	 	$goods_pic_model = M('goods_pics');	
	 	$data = $goods_pic_model ->find($id);
	 	unlink($data['goods_pics_b']);
	 	unlink($data['goods_pics_m']);
	 	unlink($data['goods_pics_s']);
	 	$goods_pic_model -> delete($id);
	 	$this->ajaxReturn(array('status'=>1,"msg"=>'ok'));
	 }

	 /**
	  * 处理商品和属性的详细的方法，这个是关联一个表，因为goods那个表只能
	  * 记录个type_id不能显示的全
	  *@author：wgq
	  *时间：2016年7月24日19:46:18；
	  * 
	  */
	 public function goodsAttr($goods_id)
	 {
	 	$data = I('post.attr');
	 	//dump($data);die;
	 	$goodsAttrModel = M('goods_attr');
	 	if (!empty($data)) {
		 	foreach ($data as $key => $value) {
		 		if (is_array($value)) {
		 			foreach ($value as $k => $v) {
		 				$arr = array(
		 					'goods_id' => $goods_id,
		 					'attr_id' => $key,
		 					'attr_value' =>$v,
		 					);
		 				$goodsAttrModel->add($arr);
		 			}

		 		} else {
		 			$arr = array(
		 					'goods_id' => $goods_id,
		 					'attr_id' => $key,
		 					'attr_value' =>$value,
		 					);
		 			$goodsAttrModel->add($arr);
	 			}
	 		}
	 		
	 	}
	 }

	 /**
	  * 处理goods_cat详细表的方法
	  *@author:wgq
	  * 时间：2016年7月24日23:33:35
	  */
	 
	 public function deal_goods($goods_id)
	 {
	 	$data1 = I('post.cat_sec');
	 	$data2 = I('post.cat_thr');
	 	M('goods_cat') -> add(
	 		array('goods_id'=>$goods_id,
	 			 'cat_id' => $data1,)	
	 		);
	 	M('goods_cat') -> add(
	 		array('goods_id'=>$goods_id,
	 			 'cat_id' => $data2,)	
	 		);
	 }
}




