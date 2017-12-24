<?php
if(isset($_GET['fault'])&&$_GET['fault']==1)
{
    echo "<script type='text/javascript'>
        alert('没有做任何改变');
    </script>";
}
$pid=$_GET["pid"];
$link=mysqli_connect("localhost","root","root","countryinfo") or die("数据库接入失败");
$sql="select * from personinfo WHERE pno={$pid}";
mysqli_query($link,"set names utf8");
$res=mysqli_query($link,$sql);
$arr=mysqli_fetch_array($res);
$pname=$arr['pname'];
$page=$arr['pAge'];
$psex=$arr['pSex'];
$nid=$arr['nnum'];
$hobbies=$arr['hobbies'];

?>

<html>
<head></head>
<body>
<form name="addForm" action="ProcessAlert.php" method="post">
    <table align="center">
        <tr>
            <td>帐号</td>
            <td><input type="text" name="userId" value="<?php echo $pid; ?>" readonly></td>
        </tr>
        <tr>
            <td>昵称*：</td>
            <td><input type="text" name="userName" value="<?php echo $pname; ?>"></td>
        </tr>
        <tr>
            <td>年龄：</td>
            <td><input type="text" name="userAge" value="<?php echo $page; ?>"></td>
        </tr>
        <tr>
            <td>性别：</td>
            <td>
                <input type="radio" name="userSex" value="1" <?php if($psex=="保密"){echo "checked";} ?>>保密
                <input type="radio" name="userSex" value="2" <?php if($psex=="男"){echo "checked";}?> >男
                <input type="radio" name="userSex" value="3" <?php if($psex=="女"){echo "checked";}?>>女
            </td>
        </tr>
        <tr>
            <td>民族：</td>
            <td>
                <select name="selNation">
                    <?php
                    $sql="SELECT nid,nname FROM nation";
                    $res=mysqli_query($link,$sql) or die("语法有误");
                    while (($array=mysqli_fetch_array($res))!=false)
                    {
                        echo "<option value='{$array['nid']}' ";
                        echo $array['nid']==$nid?'selected':'' ;
                        echo ">";

                        echo "{$array['nname']}";
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
                <input type="checkbox" name="chkBobbies[]" value="绘画" <?php echo strpos($hobbies,'绘画')!==false?"checked":"" ?> >绘画
                <input type="checkbox" name="chkBobbies[]" value="音乐" <?php echo strpos($hobbies,'音乐')!==false?"checked":"" ?> >音乐
                <input type="checkbox" name="chkBobbies[]" value="篮球" <?php echo strpos($hobbies,'篮球')!==false?"checked":"" ?> >篮球
                <input type="checkbox" name="chkBobbies[]" value="舞蹈" <?php echo strpos($hobbies,'舞蹈')!==false?"checked":"" ?> >舞蹈
                <input type="checkbox" name="chkBobbies[]" value="诗词" <?php echo strpos($hobbies,'诗词')!==false?"checked":"" ?> >诗词
            </td>
        </tr>
        <tr>
            <!--<td><input type="submit" value="取消"></td>-->
            <td colspan="2"><input type="submit" value="确认修改" name="btnAdd"></td>
        </tr>
    </table>
</form>
</body>
</html>

