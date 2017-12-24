<?php
namespace app\students\controller;
use think\Controller;
use think\Request;
use  think\Db;
use think\Session;
class Index extends Controller
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }
    public function showLogin()
    {
        return view();
    }
    public function processLogin()
    {
        /*dump($_POST);
        dump($this->request->param()) ;
        dump($req->param());*/

        //$res=Db::table("students")->where()->where()->select();
        //$res=Db::table("personinfo")->where(["pno"=>input("txtId"),"pwd"=>md5(input("txtPwd"))])->select();
        //绑定参数式
        /*$result = Db::query('select * from personinfo where pno = ? and pwd=?', [input('txtId'),md5(input("txtPwd"))]);
        dump($result) ;
        //$res=Db::table("personinfo")->where("pno=:num",["num"=>input('txtId')])->where("pwd=:p",["p"=>md5(input("txtPwd"))])->select();
        //dump($_POST);
        $pno=$_POST["pno"];
        $pwd=$_POST["pwd"];*/
        $pno=input("pno");
        $pwd=input("pwd");
     /*   $res=Db::table("personinfo")->where("pno=:num and pwd=:pass",["num"=>input('txtId'),"pass"=>md5(input("txtPwd"))])->select();
        $res=Db::table("personinfo")->where("pno=:num and pwd=:pass",["num"=>input('txtId'),"pass"=>md5(input("txtPwd"))])->find();*/
        $res=Db::table("personinfo")->where("pno=:num and pwd=:pass",["num"=>$pno,"pass"=>md5($pwd)])->find();
        dump($res);
        if ($res)
        {
            Session::set("name",$res["pname"]);
           // $this->success("登陆成功","studentInfo","",1);
            $data=["msg"=>1];
        }else{
           // $this->error();
            $data=["msg"=>0 ];
        }
        $this->json($data);
    }
    public function register()
    {
        $nation=Db::table("nation")->select();
        $this->assign("nationIhfo",$nation);
        return $this->fetch();
    }
    public function processReg()
    {
        $pname=input("pname");
        $Pwd=input("pwd");
        $page=input("pAge");
        $psex=input()["pSex"][0];
        $nnum=input()["selNation"];
        $hobbies=implode(",",input()["hobbies"]);
        $data=["pname"=>$pname,"pwd"=>md5($Pwd),"pAge"=>$page,"pSex"=>$psex,"nnum"=>$nnum,"hobbies"=>$hobbies];
        //dump($data);
        $res=Db::table("personinfo")->insert($data);
        $lastPerson=Db::table("personinfo")->max("pno");
        if ($res)
        {
            $this->success("注册成功,你的账号是{$lastPerson}","showLogin",$arr=["pno"=>$lastPerson],2);
        }else{
            $this->error();
        }
    }
    public function process()
    {
        $res=Db::table("personinfo")->where("pname",$pname)->find();
        if ($res)
        {
            echo "1";
        }
    }
    public function studentInfo()
    {
   /*     $res=Db::table("students")
            ->field("StuId,StuName,StuAge,StuSex,Tel,StuHabbit,StuBirth")
            ->select();
        //dump($res);
        $this->assign("students",$res);*/
   //分页查询
        $totalRow=Db::table("personinfo")->count();
        $pageSize=4;
        //分页查询应用了分页类paginate
        $res=Db::table("personinfo")
            ->field("pno,pname,pAge,pSex,hobbies")
            ->paginate($pageSize,$totalRow);
        //输出分页区域render
        $showPge=$res->render();
        $this->assign("showPage",$showPge);
        $this->assign("students",$res);
        return view();
    }
    public function alertInfo(Request $req)
    {
        //print_r($req->param());
        $pId=$req->param("sId");
        //echo $pId;
        //查询民族信息
        $res=Db::table("nation")->select();
        $this->assign("nationInfo",$res);
        $person=Db::table("personInfo")->find($pId);
        $hobbies=$person["hobbies"];
        $this->assign("hobbies",$hobbies);
        $this->assign("personInfo",$person);
        //return $this->fecth();
        return view();
    }
    public function processAlert()
    {
        $pno=input("txtName");
        $pname=input("txtName");
        $page=input("txtAge");
        $psex=input()["rdoSex"][0];
        $nnum=input()["selNation"];
        $hobbies=implode(",",input()["checkHob"]);
        /*$sql="UPDATE personinfo SET pname='{$pname}',pAge={$page},pSex='{$psex}',nnum={$nnum},hobbies='{$hobbies}' WHERE pno={$pno}";
       dump($sql);*/
        $data=["pname"=>$pname,"pAge"=>$page,"pSex"=>$psex,"nnum"=>$nnum,"hobbies"=>$hobbies];
        $res=Db::table("personinfo")->where("pno",$pno)->update($data);
        if ($res)
        {
            $this->success("信息修改成功","studentInfo");
        } else if ($res===0){
            $this->error("没做任何更改");
        }else{
            $this->error("更改失败");
        }
    }
}
