<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/8/7
 * Time: 14:02
 */

namespace app\user\controller;
use app\user\model\Uss;

/**
 * Class UserController
 * @package app\user\controller
 * 更改配置
 *    // 控制器类后缀
'controller_suffix'      => true,
 */

class UserController
{
    public function AddUser()
    {
        /*$uss=new Uss();
        $uss->name="Bob";
        $uss->pwd=md5("123456");
        if ($uss->save())
        {
            return "User[ ".$uss->name." : ".$uss->uid."]新增成功";
        }else{
            return $uss->getError();
        }*/

        $uss["name"]="Petter";
        $uss["pwd"]=md5("111");
        if ($result=Uss::create($uss))
        {
            return "User[ ".$result->name." : ".$result->uid."]新增成功";
        }else{
            return $uss->getError();
        }
    }
    //更新数据isUpdate写在save前面
    public function Update()
    {
        $uss=new Uss();
        $uss["uid"]=10002;
        $uss["name"]="Landa";
        if ($uss->isUpdate()->save())
        {
            return "User[ ".$uss->name." : ".$uss->uid."]更新成功";
        }else{
            return $uss->getError();
        }
    }
    public function updateUser($uid)
    {
        $user=Uss::get($uid);
        $user->name="Lincoln";
        $res=$user->save();
        if ($res)
        {
            return "更新成功";
        }
        else{
           return $user->getError();
        }
       /* $user["uid"]=$uid;
        $user["name"]="Charles";
        $res=Uss::update($user);
        if ($res)
        {
            return "修改成功";
        }*/
    }
    //批量插入
    public function addList()
    {
        $uss=new Uss();
        $list=[
            ["name"=>"Jone","pwd"=>md5("111111")],
            ["name"=>"Sherlock","pwd"=>md5("123456")]
        ];
        if ($uss->saveAll($list))
        {
            return "批量插入成功";
        }else{
            $uss->getError();
        }
    }
    //查询数据
    public function selectUser($uid="")
    {
        $uss=Uss::get($uid);
        //dump($uss);
        echo $uss->name."------>".$uss->uid."<br>";
        echo $uss["uid"]."------->".$uss["name"];
    }
    //根据非主键查询
    public function select()
    {
        /*$user=Uss::get(["name"=>"Sherlock"]);
        echo $user->uid."<----->".$user["pwd"]."<br>";
        $uss=Uss::where(["name"=>"Joy"])->find();
        echo $uss["uid"]."<---->".$uss->name."<br>";
        //获取数据列表
        $users=Uss::all();
        foreach ($users as $list)
        {
            echo $list["uid"]."<---->".$list->name."<br>";
            echo ">->->->->->->-><br>";
        }*/
        //搭配查询构建器
        $users=Uss::where("uid",">","10004")->select();
        foreach ($users as $list)
        {
            echo $list["uid"]."<---->".$list->name."<br>";
            echo ">->->->->->->-><br>";
        }
    }
    //删除数据
    public function delectUser($id)
    {
        $user=Uss::get($id);
        if ($user)
        {
            $user->delete();
            return "Delect Successful";
        }else {
            return "The user is not exists";
        }
    }
}