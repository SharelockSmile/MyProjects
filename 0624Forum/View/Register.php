<?php
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/24
 * Time: 22:11
 */?>
<html>
<head></head>
<body>
<form name="addForm" action="../Process/ProcessReg.php" method="post">
    <table align="center">
        <tr>
            <td>用户名*：</td>
            <td><input type="text" name="userName"></td>
        </tr>
        <tr>
            <td>密码*：</td>
            <td><input type="password" name="userPwd"></td>
        </tr>
        <tr>
            <td>确认密码*：</td>
            <td><input type="password" name="userPwd"></td>
        </tr>
        <tr>
            <td>年龄：</td>
            <td><input type="text" name="userAge"></td>
        </tr>
        <tr>
            <td>性别：</td>
            <td>
                <input type="radio" name="userSex" value="1" checked>保密
                <input type="radio" name="userSex" value="2">男
                <input type="radio" name="userSex" value="3">女
            </td>
        </tr>
        <tr>
            <!--<td><input type="submit" value="取消"></td>-->
            <!--使按钮失去功能，变成灰色-->
            <td colspan="2"><input type="submit" value="确认注册" name="btnReg" ></td>
        </tr>
    </table>
</form>
</body>
</html>