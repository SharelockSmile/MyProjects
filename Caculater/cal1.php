<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$n1="";
$n2="";
$op="";
$res="";
if(!empty($_GET))
{
	$n1=$_GET["a"];
	$n2=$_GET["b"];
	$op=$_GET["p"];
	$res=$_GET["d"];
}
?>
<html>
<head>
    <script type="text/javascript">
        function  blur1()
        {
        	var num1=document.myForm.textNum1.value;
    		if(num1=="")
    		{
    			document.getElementById("mes1").innerHTML="<font color='red'>数一不能为空！</font>";
    			return;
    		}
    		else if(num1!=""&&isNaN(num1))
    		{
    			document.getElementById("mes1").innerHTML="<font color='red'>数一必须为纯数！</font>";
    		    return;
    		}
    		 else if(num1!=""&&!isNaN(num1))
    		 {
    			 document.getElementById("mes1").innerHTML="";
    		 }
        }
        function blur2()
    	{
    		var num2=document.myForm.textNum2.value;
    		if(num2=="")
    		{
    			document.getElementById("mes2").innerHTML="<font color='red'>数二不能为空！</font>";
    			return;
    		}
    		else if(num2!=""&&isNaN(num2))
    		{
    			document.getElementById("mes2").innerHTML="<font color='red'>数二必须为纯数！</font>";
    		    return;
    		}
    		else if (num2!=""&&!isNaN(num2))
    		{
    			document.getElementById("mes2").innerHTML="";
    		}
    	}
    </script>
</head>
<body>
    <form action="process.php" method="post" name="myForm">
        <table  >
            <tr>
                <td>Number1:<input type="text" name="textNum1" onblur="return blur1()" ></td>
                <td><select>
                    <option>+</option>
                    <option>-</option>
                    <option>*</option>
                    <option>/</option>
                </select></td>
                <td>Number2:<input type="text" name="textNum2" onblur="return blur2()" ></td>
                <td><input type="submit" value="==" ></td>
                <td>Result:<input type="text" name="textRes" /></td>
            </tr>
            <tr>
                <td><span id="mes1"></span></td>
                <td></td>
                <td><span id="mes2"></span></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>
</html>