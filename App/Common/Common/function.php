<?php 
	function defaultTpl(){
		// return MODULE_NAME
		return MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
	}

	function defaultJs(){
		return __ROOT__.'/Public/js/'.MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME.'.js';
	}

	function defaultCss(){
		return __ROOT__.'/Public/css/'.MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME.'.css';
	}

?>