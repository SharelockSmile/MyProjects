<?php

/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/17
 * Time: 15:36
 */
include "DBHelper.php";
class UserService
{
    private $db;
    function __construct()
    {
        $this->db=new DBHelper("localhost","root","root","forum");
        $this->db->connet_DB();
    }
    function login($user)
    {
        $sql="SELECT *FROM dis_users WHERE uname='$user->uName' AND upwd=MD5('$user->uPwd')";
        $res=$this->db->ExecuteDQL($sql);
        return $res;
    }
}