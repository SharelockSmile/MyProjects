<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<?php
header("Content-Type:text/html;charset=utf-8");
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
	function blur1()
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
	    
</script>
</head>

<body>
<form name="myForm" method="post" action="process.php">
	<table>
		<tr>
			<td>数字一：<input type="text" name="textNum1" onBlur="return blur1()" value=<?php echo $n1;?>></td>
			<td>
				<select name="selOp">
					<option <?php $op=="+"?"selected":""?>>+</option>
					<option <?php if($op=="-"){echo 'selected';}?>>-</option>
					<option <?php if($op=="*"){echo "selected";}?>>*</option>
					<option <?php $op=="/"?"selected":""?>>/</option>
				</select>
			</td>
			<td>数字二：<input type="text" name="textNum2" onBlur="return blur2()" value=<?php echo $n2;?>></td>
			<td><input type="submit" value="=="></td>
			<td><input type="text" name="textRes" value=<?php echo $res;?>></td>
		</tr>
		<tr>
			<td><span id="mes1"></span></td>
			<td></td>
			<td><span id="mes2"></span></td>
			<td></td>
		</tr>
	</table>
</form>
</body>
</html>
