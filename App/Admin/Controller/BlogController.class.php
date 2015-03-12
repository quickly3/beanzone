<?php 
namespace Admin\Controller;
use Think\Controller\RestController;

class BlogController extends RestController{
	public function __construct(){
		parent::__construct();
		if(ACTION_NAME !== 'login'||ACTION_NAME !== 'loginHandle'){
			is_login();
		}
	}


	public function index(){

	}

	public function create(){
		if(!I('session.user_id')){
			$this->redirect('Admin/Index/login', null, 0, '页面跳转中...');
		}
		$M = M();
		$sql = "SELECT id meta_id,meta_name FROM b_meta WHERE meta_cate ='1'";
		if($res = $M->query($sql)){
			$phpRet['cate'] = $res;	
		}
		$this->assign('phpRet',json_encode($phpRet));
		$this->display(defaultTpl());
	}


	public function postHandle(){
		if(trim(I('session.user_id')) == ''){
			$user_id = 1;
		}else{
			$user_id = I('session.user_id');	
		}

		$res = array();
		$res['status'] = 1;
		$post = M('Posts','b_');

		switch ($this->_method) {
			case 'post':
				$request_body = file_get_contents('php://input');
				$data = json_decode($request_body,true);
				$data['post_author'] = $user_id;
				date_default_timezone_set('PRC');
				if($data['post_date'] === null){
					$data['post_date'] = $date = date("Y-m-d H:i:s");
					unset($data['timeSta']);
				}
				
				if(isset($data['post_cate'])){
					$cateArr = split(':',$data['post_cate']);
					unset($data['post_cate']);
				}


				$resId = $post->add($data);
				if(!$resId){
					$res['status'] = 0;
				};
				if(count($cateArr) != 0){
					foreach ($cateArr as $k => $v) {
						if(trim($v) !== ''){
								$postmeta[] = array('meta_id'=>$v,'post_id'=>$resId);
						}
					}
					$b_postmeta = M('Postmeta','b_');
					$resId = $b_postmeta->addAll($postmeta);
					if(!$resId){
						$res['status'] = 0;
					};					
				}
				
				$this->ajaxReturn($res);
				break;
			case 'get':
				break;
			case 'put':
				break;
			case 'delete':
				break;
			default:
				# code...
				break;
		};
		$this->response($res,'json');
	}
	public function addCate(){
		$data = I('post.');
		$res['sta'] = 1;
		$M = M('Meta','b_');
		$data['meta_date'] = date("Y-m-d H:i:s");
		$res['cateId'] = $M->add($data); 
		$this->ajaxReturn($res);
	}
	public function addMeta(){
		$data = I('post.');
		$res['sta'] = 1;
		$M = M('Meta','b_');
		$data['meta_date'] = date("Y-m-d H:i:s");
		$M->add($data);
		$this->ajaxReturn($res);
	}

	public function getImgs(){
		$img_Hub = C('IMAGE_HUB');
		$imgArr = glob(C('SERVER_PATH').C('IMAGE_HUB').'/*');
		foreach ($imgArr as $k => $v) {
			$imgArr[$k] = str_replace(C('SERVER_PATH'),'',$v);
		}
		$res['sta'] = 1;
		$res['imgs'] = $imgArr;
		$this->ajaxReturn($res); 
	}
}

?>