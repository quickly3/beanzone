<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>D_bean Factory - My TED for you</title>
	<link type="text/css" rel="stylesheet" href="/beanzone/Public/vendor/bootstrap/css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="/beanzone/Public/vendor/font-awesome/css/font-awesome.css">
	<link type="text/css" rel="stylesheet" href="/beanzone/Public/css/common/all.css">
	
	<link type="text/css" rel="stylesheet" href="<?php echo defaultCss();?>">

	<script type="text/javascript" src="/beanzone/Public/vendor/jQuery-1.11.1.js"></script>
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
	<aside class="superside">
		<a class="side-top"> <i class="glyphicon glyphicon-align-justify"></i>
		</a>
		<ul class="side-ul">
			<li class="active">
				<a href=""> <i class="glyphicon glyphicon-home"></i>
				</a>
			</li>
			<li>
				<a href="">
					<i class="fa fa-clipboard"></i>
				</a>
			</li>
			<li>
				<a href="">
					<i>C</i>
				</a>
			</li>
			<li>
				<a href="">
					<i>D</i>
				</a>
			</li>
			<li>
				<a href="">
					<i>E</i>
				</a>
			</li>
			<li>
				<a href="">
					<i>F</i>
				</a>
			</li>
			<li>
				<a href="">
					<i>G</i>
				</a>
			</li>
			<li>
				<a href="">
					<i>H</i>
				</a>
			</li>
		</ul>
	</aside>
	<nav>
		<div class="nav-left">
			<input type="text" class="form-control search" placeholder="...">
			<i class="glyphicon glyphicon-search" id="searchIcon"></i>
			<i class="go">Go</i>
		</div>
		<div class="nav-right">
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
	</nav>
	<div class="container">
	
	<div id="editor">
		
	</div>

	</div>

	<footer></footer>
</body>
</html>