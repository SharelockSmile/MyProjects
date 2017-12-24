<?php
 
class CategoryAction extends CommonAction {
	function view(){
		$id=$_GET['id'];
		
		$category=D('Category','Admin');
		$data=$category->getById($id);
		$this->assign('category',$data);
		$this->assign('title',$data['title']);
		
		$section=D('Section','Admin');
		$data=$section->getById($data['sectionid']);
		$this->assign('section',$data);
		
		import('ORG.Util.Page');
		$article=D('Article','Admin');
		$count=$article->where('catid='.$id)->count();
		$page=new Page($count,C('PAGESIZE'));
		$show=$page->show();
		$this->assign("show",$show);
		$data=$article->where('catid='.$id)
			->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('article',$data);
		
		$this->getModules();
		
		$this->assign('content','Category:view');
		$this->display('Layout:index');
	}
}
?>