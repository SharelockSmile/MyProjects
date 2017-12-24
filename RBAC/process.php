<?php
	include"DBHelper.php";
	$db=new DBHelper("localhost","root","root","blogbymyself");
	$db->connet_DB();
	$aid=$_POST["aid"];
	$sql="select rnum from blog_adinroles where anum={$aid}";
	$res=$db->ExecuteDQL($sql);
	$str=implode(",",$res[0]);
	echo $str;

?>