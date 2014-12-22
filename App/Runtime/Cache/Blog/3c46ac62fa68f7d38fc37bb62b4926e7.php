<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>D_bean Factory - My TED for you</title>
	<link type="text/css" rel="stylesheet" href="/beanzone/Public/vendor/bootstrap/css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="/beanzone/Public/vendor/font-awesome/css/font-awesome.css">
	<link type="text/css" rel="stylesheet" href="/beanzone/Public/css/common/all.css">
	
	<link type="text/css" rel="stylesheet" href="<?php echo defaultCss();?>">

	<script type="text/javascript" src="/beanzone/Public/vendor/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="/beanzone/Public/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/beanzone/Public/js/common/common.js"></script>
	
<script type="text/javascript" src="/beanzone/Public/vendor/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/beanzone/Public/vendor/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/beanzone/Public/vendor/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="<?php echo defaultJs();?>"></script>

</head>
	<header>
		<div class="logo">
			<a href="">
				<h1>
					<span>B</span><span>e</span><span>a</span><span>n</span><span>z</span><span>o</span><span>n</span><span>e</span>
				</h1>
			</a>
		</div>
	</header>
<body>

	<nav>
		<div class="nav-left">
			<ul class="bean">
				<li>
					<img src="/beanzone/Public/images/common/bean.png" alt="">
				</li>
				<li >
					<span id="user">Bean</span>
					<span id="email">quickly3@sohu.com</span>				
				</li>
			</ul>
		</div>
		<div class="nav-right">
			<input type="text" class="form-control search" placeholder="...">
			<i class="glyphicon glyphicon-search" id="searchIcon"></i>
		</div>

	</nav>
	<div class="container">
	
	<div class="main row" >
		<div class="col-lg-2"></div>
		<div id="editor" class="col-lg-8">
			
		</div>		
		<div class="col-lg-2"></div>
	</div>


	</div>

	<footer></footer>
</body>
</html>