<?php
/* var_dump($_POST); */
 $num1=$_POST["textNum1"];
$num2=$_POST["textNum2"];
$op=$_POST["selOp"];
$res=$_POST["textRes"];

if($op=="+")
{
	$res=$num1+$num2;
}
else if($op=="-")
{
	$res=$num1-$num2;
}
else if($op=="*")
{
	$res=$num1*$num2;
}
else if ($op=="/")
{
	if($num2==0)
	{
		echo "<script>alert('除数不能为零！');</script>";
		return;
	}
	else 
	{
		$res=$num1/$num2;
	}
}
//用JS的方式重定向
echo "<script type='text/javascript'>location='cal.php?a={$num1}&b={$num2}&p={$op}&d={$res}'</script>";
//用PHP的方式重定向
// header("cal.php");
?>
