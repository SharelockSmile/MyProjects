<?php
namespace app\test2\controller;

class UserType
{
    public function hello()
    {
        $data = ['name' => 'thinkphp', 'status' => '1'];
        //return $data;
        return xml($data);
        //手动输出
        $data = ['name' => 'thinkphp', 'status' => '1'];
        //return json($data);
        //改变返回状态码&&发送更多响应头信息
        //return json($data, 201, ['Cache-control' => 'no-cache,must-revalidate']);
        //return json($data)->code(201)->header(['Cache-control' => 'no-cache,must-revalidate']);
    }
}