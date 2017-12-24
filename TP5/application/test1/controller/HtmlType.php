<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/8/2
 * Time: 14:59
 */

namespace app\test1\controller;
use think\Controller;
use think\Url;
use think\Request;
class HtmlType extends Controller
{
    function type()
    {
        return view("test");
    }
    public function test1($id)
    {
        //input('?post.id');        /*    判断是否存在post方式提交过来的id，存在返回1   */
        // Request::instance()->param('id');          /*     提交过来的值*/
        //echo "test1/html_type/ResTest1";           /*    test1/html_type/ResTest1*/
        //重加路由
        Url::build('html_type/test');        /*       /phpTest/TP5/public/test1/html_type/restest.html*/
        //echo url("html_type/ResTest");                  /*        /phpTest/TP5/public/test1/html_type/restest.html*/
    }
    function rtest()
    {
        return view();
    }
    public function process()
    {
        var_dump($_POST);
    }
    public function ResTest()
    {
        //请求对象
        $request=Request::instance();
       /**
        * 获取请求地址
       echo $res=$request->url(),"<br>";
       *获取控制台名称
        echo $request->controller();
        * 获取参数
        dump($request->param());
       print_r(request()->post("id"));*/
       /**
        * 如果控制台继承了Controller,可以简化调用
        *
        */
        echo $this->request->url();     /*    /phpTest/TP5/public/test1/html_type/ResTest*/
    }
    //request注入
    public function ResTest2(Request $res)
    {
        echo $res->url();      /*    /phpTest/TP5/public/test1/html_type/ResTest2*/
    }
    //使用助手函数
    public function ResTest3()
    {
        echo request()->url();      /*       /phpTest/TP5/public/test1/html_type/ResTest3*/
    }
}