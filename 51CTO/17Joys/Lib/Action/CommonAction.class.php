<?php
 
class CommonAction extends Action {
	function _initialize(){
		header("Content-Type:text/html; charset=utf-8");
	}
	
	function _empty(){
		$this->assign('jumpUrl','http://www.17joys.com');
		$this->error("请求的页面不存在");
	}
	
	protected function getModules(){
		$itemid=empty($_GET['itemid'])?0:$_GET['itemid'];
    	$mod=D('Modules','Admin');
    	$right=$mod->join('inner join joys_modules_menu
on id=modulesid')->where("published=1 and `position`='right' and (menuid=".$itemid." or menuid=0)")->select();
    	$this->assign('right',$right);
    	
    	$left=$mod->join('inner join joys_modules_menu
on id=modulesid')->where("published=1 and `position`='left' and (menuid=".$itemid." or menuid=0)")->select();
    	$this->assign('left',$left);
    	
    	$top=$mod->join('inner join joys_modules_menu
on id=modulesid')->where("published=1 and `position`='top' and (menuid=".$itemid." or menuid=0)")->select();
    	$this->assign('top',$top); 
    	
    	$foot=$mod->join('inner join joys_modules_menu
on id=modulesid')->where("published=1 and `position`='foot' and (menuid=".$itemid." or menuid=0)")->select();
    	$this->assign('foot',$foot); 
	}
}
?>