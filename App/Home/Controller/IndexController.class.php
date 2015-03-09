<?php
namespace Home\Controller;
use Think\Controller;


class IndexController extends Controller {
    public function index(){
        $pig = I('pig');
        $M = M();
        $sql ='SELECT  a.*,b.user_login AS user_name 
                 FROM b_posts AS a 
            LEFT JOIN b_users b ON a.`post_author` = b.`id`';
        
        if(trim($pig) !== ''){
            $sql.=" WHERE DATE_FORMAT(post_date,'%Y-%m') = '$pig'";
        }

        $sql.=" ORDER BY post_date DESC ";

        $data = $M->query($sql);

    	$posts = json_encode($data);

        $lastPosts = json_encode(getLastPosts());
        $this->assign("lastPosts",$lastPosts);
        $pigeonhole = json_encode(getPigeonhole());
        $this->assign("pigeonhole",$pigeonhole);



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
        $lastPosts = json_encode(getLastPosts());
        $this->assign("lastPosts",$lastPosts);
        $pigeonhole = json_encode(getPigeonhole());
        $this->assign("pigeonhole",$pigeonhole);

    	$this->assign("posts",$posts);
    	$this->display(defaultTpl());   	
    }
}