<?php 
namespace Admin\Controller;
use Think\Controller\RestController;

class ProjectController extends RestController{
	public function __construct(){
		parent::__construct();
		if(ACTION_NAME !== 'login'||ACTION_NAME !== 'loginHandle'){
			is_login();
		}
	}

	public function addItem(){
		$M = M();
		$sql = 'select * from b_project';
		$projectItem = $M->query($sql);
		$this->assign('projectItem',json_encode($projectItem));
		$this->display(defaultTpl());
	}

	public function addItemHandle(){
		$data = I('post.');

		$res['sta'] = 1;
		$M = M('Project','b_');
		$data['pj_date'] = date("Y-m-d H:i:s");
		if(!$M->add($data)){
			$res['sta'] = 0;
		}
		$this->ajaxReturn($res);
	}
	public function doneItem(){
		$pj_id = I('post.id');
		$res['sta'] = 1;
		$M = M();
		$sql = "update b_project set pj_status=2 where id='$pj_id'";
		if($res['mes'] = $M->query($sql) !='true'){
			$res['sta'] = 0;
		}
		$this->ajaxReturn($res);
	}
	public function delItem(){
		$pj_id = I('post.id');
		$res['sta'] = 1;
		$M = M();
		$sql = "delete from b_project where id='$pj_id'";
		if($res['mes'] = $M->query($sql) !='true'){
			$res['sta'] = 0;
		}
		$this->ajaxReturn($res);
	}
}

?>