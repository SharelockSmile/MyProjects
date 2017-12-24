<?php
 
class IndexAction extends CommonAction{
    public function index(){
    	$article=D('Article','Admin');
    	$list=$article->order('created desc,id desc')->limit('19')
    		->where('published=1')->select();
    	$this->assign('atop',$list);
    	
    	$section=D('Section','Admin');
    	$sdata=$section->where('id=1')->find();
    	$category=D('Category','Admin');
    	$list=$category->order('id')->where('sectionid='.$sdata['id'])->select();
    	
    	foreach ($list as $k=>$row){
    		$alist=$article->order('created desc,id desc')->limit('18')
    		->where('catid='.$row['id'].' and published=1')->select();
    		$ctitle[$k]=$row['title'];
    		$this->assign('a'.$k,$alist);
    	}

    	$this->assign('ctitle',$ctitle);
    	
    	$this->getModules();
    	$this->assign('content','Index:index');
    	$this->display('Layout:index');
    }
}
?>