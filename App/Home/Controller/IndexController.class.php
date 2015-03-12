<?php
namespace Home\Controller;
use Think\Controller;


class IndexController extends Controller {
    public function index(){
        $pig = I('pig');
        $cate = I('cate');
        $M = M();
        $sql ='SELECT  a.*,b.user_login AS user_name 
                 FROM b_posts AS a 
            LEFT JOIN b_users b ON a.`post_author` = b.`id`';
        
        if(trim($pig) !== ''){
            $sql.=" WHERE DATE_FORMAT(post_date,'%Y-%m') = '$pig'";
        }
        if(trim($cate) !== ''){
            $sql.=" WHERE a.id IN(SELECT post_id FROM b_postmeta WHERE meta_id = '$cate')";
        }

        $sql.=" ORDER BY post_date DESC ";

        $data = $M->query($sql);

        $phpRet['posts'] = $data;
        $phpRet['lastPosts'] = getLastPosts();
        $phpRet['pigeonhole'] = getPigeonhole();
        $phpRet['category'] = getCategory();

    	$this->assign("phpRet",json_encode($phpRet));
    	$this->display(defaultTpl());
    }

    public function post(){
    	$post_id = I('id');
        $M = M();
        $sql ="SELECT  a.*,b.user_login AS author_name 
                 FROM b_posts AS a 
            LEFT JOIN b_users b ON a.`post_author` = b.`id`
                WHERE a.id=$post_id ";

     	$data = M()->query($sql);
        $phpRet['posts'] = $data;
        $phpRet['lastPosts'] = getLastPosts();
        $phpRet['pigeonhole'] = getPigeonhole();
        $phpRet['category'] = getCategory();

    	$this->assign("phpRet",json_encode($phpRet));
    	$this->display(defaultTpl());   	
    }
}