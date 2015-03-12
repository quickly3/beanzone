<?php 
	function newDir($dir){
		if(!is_dir(dirname($dir))){
			if(dirname($dir) !== C('SERVER_PATH')){
				newDir(dirname($dir));	
			}
		}else{
			mkdir($dir);
		}
	}
	function newFile($filename){

		if(!is_dir(dirname($filename))){
			newDir($filename);
		}
		$fp=fopen("$filename", "w+"); //打开文件指针，创建文件
		if ( !is_writable($filename) ){
		      die("文件:" .$filename. "不可写，请检查！");
		}
		//fwrite($filename, "anything you want to write to $filename.";
		fclose($fp);  //关闭指针	
	}
	function defaultTpl(){
		$tplPath = MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
		$realPath = C('SERVER_PATH').'/Public/tpl/'.$tplPath.'.html';
		if(!is_file($realPath)){
			newFile($realPath);
		}

		return $tplPath; 
	}
	function defaultJs(){
		$tplPath = '/Public/js/'.MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME.'.js';
		$realPath = C('SERVER_PATH').'/'.$tplPath;
		if(!is_file($realPath)){
			newFile($realPath);
		}
		return $tplPath;
	}

	function defaultCss(){
		$tplPath = '/Public/css/'.MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME.'.css';
		$realPath = C('SERVER_PATH').'/'.$tplPath;
		if(!is_file($realPath)){
			newFile($realPath);
		}
		return $tplPath;
	}

	function is_login(){
		if(trim($_SESSION['user_id']) == ''){
			header("Location:".U("Admin/Index/login")); 
		}
	}

	function getLastPosts(){
		$M = M();
		$sql = 'SELECT id,post_title FROM b_posts  ORDER BY post_date DESC LIMIT 0,5';
		$lastPost = $M->query($sql);
		return $lastPost;
	}

	function getPigeonhole(){
		$M = M();
		$sql = "SELECT DATE_FORMAT(post_date,'%Y-%m') AS ymd ,COUNT(*) as cnt  FROM b_posts  GROUP BY  ymd ORDER BY post_date";
		$pigeonhole = $M->query($sql);
		return $pigeonhole;		
	}

	function getCategory(){
		$M = M();
		$sql = "SELECT id AS meta_id,`meta_name`
				FROM b_meta 
				WHERE  id IN (SELECT DISTINCT meta_id FROM b_postmeta)";
		$category = $M->query($sql);
		return $category;			
	}
?>