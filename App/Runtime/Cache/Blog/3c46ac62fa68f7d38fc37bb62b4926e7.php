<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>D_bean Factory - My TED for you</title>
<!-- 	<link type="text/css" rel="stylesheet" href="/Public/vendor/bootstrap/css/bootstrap.min.css"> -->
	<link type="text/css" rel="stylesheet" href="/Public/vendor/font-awesome/css/font-awesome.css">
	<link type="text/css" rel="stylesheet" href="/Public/css/common/all.css">
	
	<link type="text/css" rel="stylesheet" href="/Public/vendor/bootstrap/css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo defaultCss();?>">

	<script type="text/javascript" src="/Public/vendor/jquery-1.11.1.js"></script>
<!--	<script type="text/javascript" src="/Public/vendor/bootstrap/js/bootstrap.min.js"></script> -->
	<script type="text/javascript" src="/Public/js/common/common.js"></script>
	
	<script type="text/javascript" src="/Public/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/vendor/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/Public/vendor/ueditor/ueditor.all.min.js"></script>
	<script type="text/javascript" src="/Public/vendor/ueditor/lang/zh-cn/zh-cn.js"></script>
	<script type="text/javascript" src="/Public/vendor/underscore.js"></script>
	<script type="text/javascript" src="/Public/vendor/backbone.js"></script>
	<script type="text/javascript" src="/Public/vendor/backbone-validation.js"></script>
	<script type="text/javascript" src="<?php echo defaultJs();?>"></script>

</head>
	<header>
		<nav>
			<div class="navigator">
				<ul>
					<li><a href="/">首页</a></li>
					<li><a href="">首页</a></li>
					<li><a href="">首页</a></li>
					<li><a href="">首页</a></li>
					<li><a href="">首页</a></li>
					<li><a href="">首页</a></li>
					<li><a href="">首页</a></li>
				</ul>
			</div>
		</nav>
	</header>
<body>
	<div class="header">
		<div class="banner">		
			<div class="logo">
				<a href="/">
					<span>Bean</span><span>zone</span>
				</a>
			</div>
		</div>
	</div>

	<div class="container">
		
	<div class="main row">
		<div class="editor col-lg-9">
			<div id="ue_title">
				<input class="form-control"></input>
			</div>
			<div id="ue_content">
				
			</div>
		</div>
		<div class="controls  col-lg-3">
			<div class="control preview">
				<div class="pre_title">
					<b>引导图</b>
				</div>
				<div class="pre_img">
					<img src="/beanzone/Public/images/common/default.jpg" alt="" class='img-thumbnail'>
				</div>
				<div class="pre-submit">
					<span class='btn btn-info' id='preview-save'>保存图片</span>
				</div>
			</div>


			<div class="control public">
				<div class="ct_title">
					<b>发布</b>
				</div>
				<div class="ct_panel">
					<ul>
						<li>
						<span class="btn btn-info">保存草稿</span><span class="btn btn-info">预览</span></li>
						<li><i class='fa fa-child'></i><span>状态:</span><b>草稿</b><a href="">编辑</a></li>
						<li><i class='fa fa-eye'></i><span>公开度:</span><b>公开</b><a href="">编辑</a></li>
						<li><i class='fa fa-book'></i><span><b>立即</b>发布</span><a href="">编辑</a></li>
						<li>
							<i class='fa fa-trash-o'></i>
							<a href="">移至回收站</a>
							<span class="btn btn-info" id='submit_post'>发布</span>
						</li>
					</ul>
				</div>
				<div class="submit">
					
				</div>
			</div>



		</div>
	</div>

	</div>

	<footer></footer>
</body>
</html>