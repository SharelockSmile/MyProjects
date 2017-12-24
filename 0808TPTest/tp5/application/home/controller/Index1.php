<?php
namespace app\home\controller;

use think\Controller;
class Index extends Controller
{
  
    public function show(){
    	 $this->assign("url1","../application/home/view/index/show1.html");
    	 $this->assign("url2","../application/home/view/index/show2.html");
    	return $this->fetch();
    }
   /*  public function show1(){
    
    	$this->fetch();
    }
    public function show2(){
    
    	$this->fetch();
    } */
    public function show3(){
    
    	$this->fetch();
    } 
    
}
