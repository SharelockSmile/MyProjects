<?php
include 'DBHelper.class.php';
class CountryInfo
{
	private $db;
	function __construct()
	{
		$this->db=new DBHelper("localhost",'root',"root","countryinfo");
		$this->db->connet_DB();
	}
	
	//添加用户的方法
	function Register($u)
	{
		$hobbies=implode(",", $u->hob);
		
		$sql="INSERT INTO personinfo (pname,pwd,pAge,pSex,nnum,hobbies) 
		VALUES('{$u->uname}',MD5('{$u->upwd}'),{$u->uage},{$u->usex},{$u->nid},'{$hobbies}')";
		$res=$this->db->ExecuteDML($sql);
		if($res)
		{
			return mysql_insert_id($this->db->link);
		}else {
			return false;
		}
	}
	//用于登录的方法
	function UserLogin($u)
	{
		$sql="SELECT *FROM personinfo WHERE pno={$u->uid} AND pwd=MD5('{$u->upwd}')";
		$res=$this->db->ExecuteDQL($sql);
		return $res;
	}
	/* function GetTotalRow()
    {
	    $sql="";
    }
    function GetUserInfo($a,$b)
    {
	    $sql="";
	    $res='';
	    return $res;
    } */
}
