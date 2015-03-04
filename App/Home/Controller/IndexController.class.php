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
        $M = M();
        $sql ="SELECT  a.*,b.user_login AS author_name 
                 FROM b_posts AS a 
            LEFT JOIN b_users b ON a.`post_author` = b.`id`
                WHERE a.id=$post_id ";

     	if($posts = M()->query($sql)){
            $posts = json_encode($posts);
        }

    	$this->assign("posts",$posts);
    	$this->display(defaultTpl());   	
    }
}