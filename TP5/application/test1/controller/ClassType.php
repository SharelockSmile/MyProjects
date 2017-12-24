<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/8/2
 * Time: 15:37
 */

namespace app\test1\controller;
use think\Controller;

class ClassType extends Controller
{
    public function type()
    {
        //echo "这是驼峰,驼峰命名路由后原地址不会失效";
        return $this->fetch();
    }
}