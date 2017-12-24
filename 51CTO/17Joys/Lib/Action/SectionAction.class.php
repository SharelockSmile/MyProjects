<?php
 
class SectionAction extends CommonAction {
	function view(){
		
		$id=$_GET['id'];
		
		$section=D('Section','Admin');
		$data=$section->getById($id);
		$this->assign('section',$data);
		$this->assign('title',$data['title']);
		
		import('ORG.Util.Page');		
		$category=D('Category','Admin');
		$count=$category->where('sectionid='.$id)->count();
		$page=new Page($count,C('PAGESIZE'));
		$show=$page->show();
		$this->assign("show",$show);		
		$data=$category->where('sectionid='.$id)
			->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('category',$data);
		
		$this->getModules();
		
		$this->assign('content','Section:view');
		$this->display('Layout:index');
	}
}
?>