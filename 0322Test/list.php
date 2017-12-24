<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
header("Content-Type:text/html;charset=utf-8");
//输出登陆信息
while (list($name,$value)=each($_POST))
{
	if($name!="submit")
	{
		echo "$name=$value<br>";
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>list()的应用</title>
</head>
<body>
    <form name="form1" method="post">
        <table width="323" border="1" cellpadding="1" cellspacing="1" bordercolor="#66CC33" bgcolor="#FFFFFF">
            <tr>
                <td width="118" height="24" align="right" bgcolor="#CCFF33">用户名：</td>
                <td width="192" height="24" bgcolor="#CCFF33"><input name="user" type="text" class="inputcss" id="user" size="24"></td>
            </tr>
            <tr>
                <td height="24" align="right" bgcolor="#CCFF33">密&nbsp;&nbsp;码：</td>
                <td height="24" bgcolor="#CCFF33"><input name="pwd" type="password" class="inputcss" id="pwd" size="24"></td>
            </tr>
            <tr align="center" bgcolor="#CCFF33">
                <td height="24" colspan="2"><input type="submit" name="submit" value="登录"></td>
            </tr>
        </table>
    </form>
</body>
</html>