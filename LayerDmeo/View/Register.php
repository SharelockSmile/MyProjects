<?php
?>
<html>
<head></head>
<body>
<form name="addForm" action="ProcessReg.php" method="post">
    <table align="center">
        <tr>
            <td>����*��</td>
            <td><input type="text" name="userName"></td>
        </tr>
        <tr>
            <td>����*��</td>
            <td><input type="text" name="userPwd"></td>
        </tr>
        <tr>
            <td>���䣺</td>
            <td><input type="text" name="userAge"></td>
        </tr>
        <tr>
            <td>�Ա�</td>
            <td>
                <input type="radio" name="userSex" value="1">����
                <input type="radio" name="userSex" value="2" checked>��
                <input type="radio" name="userSex" value="3">Ů
            </td>
        </tr>
        <tr>
            <td>���壺</td>
            <td>
                <select name="selNation">
                    <?php
                    $link=@mysqli_connect("localhost","root","root","countryinfo") or die("�Ҳ������ݿ�");
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
            <td>���ã�</td>
            <td>
                <!--��ѡ�����������[]-->
                <input type="checkbox" name="chkBobbies[]" value="�滭">�滭
                <input type="checkbox" name="chkBobbies[]" value="����">����
                <input type="checkbox" name="chkBobbies[]" value="����">����
                <input type="checkbox" name="chkBobbies[]" value="�赸">�赸
                <input type="checkbox" name="chkBobbies[]" value="ʫ��">ʫ��
            </td>
        </tr>
        <tr>
            <!--<td><input type="submit" value="ȡ��"></td>-->
            <!--ʹ��ťʧȥ���ܣ���ɻ�ɫ-->
            <td colspan="2"><input type="submit" value="ȷ��ע��" name="btnAdd" ></td>
        </tr>
    </table>
</form>
</body>
</html>