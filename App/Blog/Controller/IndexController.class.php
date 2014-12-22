<?php 
namespace Blog\Controller;
use Think\Controller;

class IndexController extends Controller{
	public function index(){

	}

	public function create(){
		
		$this->display(defaultTpl());
	}
}

?>