<?php 
namespace Admin\Controller;
use Think\Controller\RestController;

class IndexController extends RestController{
	public function login(){
		$this->display(defaultTpl());
	}

	public function loginHandle(){
		$name = I('user_name');
		$pass = I('user_pass');
		$_SESSION['user_name'] = $name;
		$_SESSION['user_id'] = 1;
	}
}

?>