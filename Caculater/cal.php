<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<?php
//header("Content-Type:text/html;charset=gbk");
$n1="";
$n2="";
$op="";
$res="";
if(!empty($_GET)){
	//表明已经过回调
    $n1=$_GET["a"];
    $n2=$_GET["b"];
    $op=$_GET["p"];
    $res=$_GET["d"];
}
?>
<html>
    <head>
        <script type="text/javascript">
        function clickOn()
    	{
    		var num1=document.myForm.textNum1.value;
    		var num2=document.myForm.textNum2.value;
    		 if(num1==""&&num2=="")
                        {
    			        document.getElementById("spMsg").innerHTML="<font color='red'>两数都不能为空！</font>";
                        return false;
                        }
    		 else if(num1==""&&num2!=""&&isNaN(num2))
    			{
    				alert('数一不能为空且数二必须为纯数！');
    				return false;
    			}
    		 else if(num1==""&&num2!=""&&!isNaN(num2))
    			{
    				alert('��һ����Ϊ��');
    				return false;
    			}
    		 else if(num1!=""&&isNaN(num1)&&num2=="")
    			{
    				alert("��һ�����Ǵ������������Ϊ��");
    				return false;
    			}
    		 else if(num1!=""&&!isNaN(num1)&&num2=="")
    			{
    				alert("�������Ϊ��");
    				return false;
    			}
    		 else if (num1!=""&&isNaN(num1)&&num2!=""&&!isNaN(num2))
    			{
    				alert("��һ����Ϊ����");
    				return false;
    			}
    		 else if (num1!=""&&!isNaN(num1)&&num2!=""&&isNaN(num2))
    			{
    				alert("�������Ϊ����");
    				return false;
    			}
    		 else if(num1!=""&&isNaN(num1)&&num2!=""&&isNaN(num2))
    			{
    				alert("���������Ϊ����");
    				return false;
    			}
 			
    	}
        </script>
    </head>
    <body>
        <form name="myForm" action="process.php" method="post">
            数一<input type="text" name="textNum1" value="<?php echo $n1;?>"/>
            <select name="selOp">
                <option value="+" <?php if($op=="+"){echo "selected";}?>>+</option>
                <option value="-" <?php if($op=="-"){echo "selected";} ?>>-</option>
                <option <?php if($op=="*"){echo "selected";} ?>>*</option>
                <option <?php if($op=="/"){echo "selected";} ?>>/</option>
            </select>
            数二<input type="text" name="textNum2" value="<?php echo $n2;?>"/>
            <input type="submit" onClick="return clickOn()" />
            <input type="text" name="textRes" value="<?php echo $res?>"/>   
            <br />
            <span id="spMsg"></span>  
        </form>
    </body>

</html>