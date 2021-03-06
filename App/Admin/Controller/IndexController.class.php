<?php 
namespace Admin\Controller;
use Think\Controller\RestController;

class IndexController extends RestController{
	public function __construct(){
		parent::__construct();
		if((ACTION_NAME !== 'login')&&(ACTION_NAME !== 'loginHandle')){
			is_login();
		}
	}

	public function index(){
		$this->display(defaultTpl());
	}

	public function login(){
		$this->display(defaultTpl());
	}

	public function logout(){
		unset($_SESSION['user_name']);
		unset($_SESSION['user_id']);
		header("Location:".U("Home/Index/index")); 
	}

	public function loginHandle(){
		$name = I('user_name');
		$pass = Md5('Bean'.I('user_pass'));


		$sql = "select * from b_users where user_login='$name' and user_pass = '$pass'";
		$M = M();
		$res = $M->query($sql);

		if($res){
			$_SESSION['user_name'] = $name;
			$_SESSION['user_id'] = 1;				
		}

		$ret = array(
			"sta"=>'1',
			"mes"=>'loginSuccess'
			);
		$this->ajaxReturn($ret);

	}
}

?>