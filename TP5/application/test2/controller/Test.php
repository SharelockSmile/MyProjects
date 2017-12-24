<?php
namespace app\test2\controller;
use think\Controller;
//use  think\Request;
class Test extends Controller
{

    public function test()
    {
       /* $this->assign("name","qwe");
        return $this->fetch();*/
        return view();
        //return view(array("name"=>"qwe","id"=>1234));
    }
    public function request(Request $req)
    {
        /*echo "请求方法：".$req->method()."<br>";
        echo "资源类型：".$req->type()."<br>";
        echo "访问IP：".$req->ip()."<br>";
        echo "是否请求AJAX：".var_export($req->isAjax(), true)."<br>";
        echo "请求参数：";
        print_r($req->param())."<br>";
        echo "仅请求name：";
        print_r($req->only(["name"]))."<br>";
        print_r($req->only("name"))."<br>";
        echo "请求排除name：";
        print_r($req->except(["name"]));
        print_r($req->except("name"));*/
        /**
         * 参数转换
         * echo $req->param("name","","strtoupper");
         * echo $req->param("pwd","","md5");
         */
    }
    public function req()
    {
        /*dump(input());
        echo input("name");
        echo input("btn");*/
        $name=input("name");
        $pwd=input("pwd");
        if($name=="Joy"&&$pwd=="123")
        {
           /* //默认成功界面，不会跳转
           $this->success("登陆成功");*/
           //自定义成功界面
            //$this->success("登陆成功","successful");
            //$this->success("登陆成功","successful","10000",5);

            //重定向
            return redirect('successful');
        }else{
            $this->error("账号或密码错误咯");
        }
    }
    public function successful()
    {
        echo "欢迎使用ThinkPHP5.0";
    }

    public function hello(Request $req,$name="World")
    {
        /**
         * 访问地址：http://localhost:8080/phpTest/TP5/public/test2/Test/hello
         * 或http://localhost:8080/phpTest/TP5/public/test2/Test/hello?name=ThinkPHP
         * 或http://localhost:8080/phpTest/TP5/public/test2/Test/hello.html?name=ThinkPHP
         */
        echo "获取当前域名：".$req->domain()."<br>";
        echo "获取入口文件：".$req->baseFile()."<br>";
        echo "获取当前URL地址，不含域名：".$req->url()."<br>";
        echo "获取当前URL，不含QUERY_STRING：".$req->baseUrl()."<br>";
        echo "获取访问的ROOT地址：".$req->root()."<br>";
        echo "获取URL地址中的PATH_INFO信息：".$req->pathinfo()."<br>";
        echo "获取URL地址中的PATH_INFO信息，不含后缀：".$req->path()."<br>";
        echo "获取URL地址中的后缀信息：".$req->ext()."<br>";
        return "Hello,".$name;
    }
}