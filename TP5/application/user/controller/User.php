<?php
namespace app\user\controller;
use \app\user\model\User as ModeLUser;
use \app\user\model\Uss as ModelUss;
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/8/7
 * Time: 10:15
 */

class User
{
    function ModelTest()
    {
     /*   //$user=new \app\user\model\User();
       $user=new ModeLUser();
        $res=$user->get(1);*/

     $uss=new ModelUss();
     $res=$uss->get(1);
       dump($res);
    }
    public function Add()
    {
         $uss=new ModelUss;
       /*$uss->name="Hellan";
       $uss->pwd=md5("123456");
      /*s=$uss->save();
       dump($res);*/

    }

}