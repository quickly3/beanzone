<?php
namespace Home\Controller;
use Think\Controller;


class IndexController extends Controller {
    public function index(){

        $M = M();
        $sql ='SELECT  a.*,b.user_login AS user_name 
                 FROM b_posts AS a 
            LEFT JOIN b_users b ON a.`post_author` = b.`id`';
        $data = $M->query($sql);

    	
    	$posts = json_encode($data);
    	$this->assign("posts",$posts);
    	$this->display(defaultTpl());
    }

    public function post(){
    	$post_id = I('id');
     	$post = M('Posts','b_');
    	$posts = json_encode($post->where("id=$post_id")->select());
    	$this->assign("posts",$posts);
    	$this->display(defaultTpl());   	
    }
}