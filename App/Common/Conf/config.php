<?php
return array(
	'DB_TYPE'               =>  'mysql',     // 数据库类型
	'DB_HOST'               =>  'localhost',     // 服务器地址
	'DB_NAME'               =>  'beanzone',          // 数据库名
	'DB_USER'               =>  'root',      // 用户名
	'DB_PWD'                =>  '',          // 密码
	'DB_PREFIX'             =>  '',    // 数据库表前缀
	'SHOW_PAGE_TRACE'       =>  0,
	'VIEW_PATH'             =>  './Public/tpl/',
	'TMPL_PARSE_STRING'     =>  array(
		'__COMMONJS__' =>__ROOT__.'/Public/js/common',
		'__COMMONCSS__'=>__ROOT__.'/Public/css/common',
		'__IMAGES__'   =>__ROOT__.'/Public/images',
		'__VENDOR__'   =>__ROOT__.'/Public/vendor'
		),
	'URL_ROUTER_ON'   => true, 
	'URL_ROUTE_RULES'=>array(
	    'post/:id'=>'/Home/Index/post/id/:1'
	    ),
	'USER_SALT'=>'BEAN',
	'SERVER_PATH'=>$_SERVER['DOCUMENT_ROOT'],
	'IMAGE_HUB'=>__ROOT__.'/Public/images/users',
	//'配置项'=>'配置值'
);