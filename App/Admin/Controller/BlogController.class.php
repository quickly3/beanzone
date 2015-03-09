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
				}
				unset($data['timeSta']);
				
				if(!$post->add($data)){
					$res['status'] = 0;
					// echo $post->_sql();
				};
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
}

?>