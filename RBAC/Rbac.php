<?php
	header("Content-Type:text/html;charset=utf8");
	echo"<script type='text/javascript' src='js/jquery-3.1.0.js'></script>";
	echo"<script type='text/javascript'src='js/update.js'>
		
	</script>";

	include "DBHelper.php";
	$db=new DBHelper("localhost","root","root","blogbymyself");
	$link=$db->connet_DB();
	$sql="select * from blog_admin";
	$admin=$db->ExecuteDQL($sql);
	/*echo"<pre>";
	var_dump($res);
	echo"</pre>";*/
	echo"<select id='user'>";
	foreach($admin as $res)
	{
		echo"<option value='{$res["aid"]}'>{$res['mnane']}</option>";
	}
	echo"</select>&nbsp;&nbsp;&nbsp;&nbsp";
	
	$sqlr="select * from blog_roles";
	$roles=$db->ExecuteDQL($sqlr);
	echo"请选择角色：";
	foreach($roles as $res)
	{
		echo"<input type='checkbox'value='{$res["roid"]}' class='ck'>{$res['roname']}";
	}
	echo"<br><br>";
	echo'<input type="button" value="确认修改" id="baocun" onclick="alert()">';
	
?>