<?php
if(isset($_GET['fault'])&&$_GET['fault']==1)
{
    //因为用户名冲突跳回来
    echo "<script>
alert('用户名已经存在');
</script>";
}
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/1
 * Time: 21:14
 */
?>
<html>
<head></head>
<body>
<form name="addForm" action="ProccessAdd.php" method="post">
    <table align="center">
        <tr>
            <td>姓名*：</td>
            <td><input type="text" name="userName"></td>
        </tr>
        <tr>
            <td>密码*：</td>
            <td><input type="text" name="userPwd"></td>
        </tr>
        <tr>
            <td>年龄：</td>
            <td><input type="text" name="userAge"></td>
        </tr>
        <tr>
            <td>性别：</td>
            <td>
                <input type="radio" name="userSex" value="1">保密
                <input type="radio" name="userSex" value="2" checked>男
                <input type="radio" name="userSex" value="3">女
            </td>
        </tr>
        <tr>
            <td>民族：</td>
            <td>
                <select name="selNation">
                    <?php
                    $link=@mysqli_connect("localhost","root","root","countryinfo") or die("找不到数据库");
                    $sql="SELECT nid,nname FROM nation";
                    mysqli_query($link,"set names utf8");
                    $res=mysqli_query($link,$sql);
                    while (($arr=mysqli_fetch_array($res))!=false)
                    {
                        echo "<option value='{$arr['nid']}'>";
                        echo "{$arr['nname']}";
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>爱好：</td>
            <td>
                <!--复选框命名必须加[]-->
                <input type="checkbox" name="chkBobbies[]" value="绘画">绘画
                <input type="checkbox" name="chkBobbies[]" value="音乐">音乐
                <input type="checkbox" name="chkBobbies[]" value="篮球">篮球
                <input type="checkbox" name="chkBobbies[]" value="舞蹈">舞蹈
                <input type="checkbox" name="chkBobbies[]" value="诗词">诗词
            </td>
        </tr>
        <tr>
            <!--<td><input type="submit" value="取消"></td>-->
            <!--使按钮失去功能，变成灰色-->
            <td colspan="2"><input type="submit" value="确认注册" name="btnAdd" ></td>
        </tr>
    </table>
</form>
</body>
</html>