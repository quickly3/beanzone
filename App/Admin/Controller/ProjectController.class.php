<?php 
namespace Admin\Controller;
use Think\Controller\RestController;

class ProjectController extends RestController{
	public function addItem(){
		$this->display(defaultTpl());
	}
}

?>