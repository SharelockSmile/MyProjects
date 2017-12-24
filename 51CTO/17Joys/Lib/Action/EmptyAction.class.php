<?php
 
class EmptyAction extends Action{
	function index(){
		$this->assign('jumpUrl','http://www.17joys.com');
		$this->assign('waitSecond',3);
		$this->error("请求的页面不存在");
	}
}
?>