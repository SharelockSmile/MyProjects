<?php
header("Content-Type:text/html;charset=utf-8");
/*echo -10%3;     //输出-1
echo "<br/>";*/

/*print(int)pow(2,32);         //输出0
echo "<br/>";*/

/*$count=5;
function get_count()
{
    static $count=0;
    return $count++;
}
++$count;
get_count();
echo get_count();        //输出1
echo $count;        //输出6
echo "<br/>";*/

//当数字和字符串比较时会把字符串转化为数字  "aa"转为数字时等于0
/*$arr=array(0=>1,'aa'=>2,3,4);
foreach ($arr as $key=>$val)
{
    print($key=='aa'?5:$val);       //输出5 5 3 4
}
echo "<br/>";*/

/*echo count(false);      //输出1
$a=count("567")+count(null)+count(false);
echo $a;                     //输出2
echo "<br/>";*/

//&是对原变量进行操作，如果没有，则先生成一个新变量，然后给这个变量赋值，最后操作这个新变量
/*$ar=array(1,2,3);
foreach ($ar as &$val)
{
    $val+=$val%2?$val++:$val--;
    echo $val;     //分别输出3  3  7
}
echo $val;      //输出7  %运算优先于+= ?:的优先级高于+=
echo "<br/>";*/
/*$arr=array(1);
foreach ($arr as &$val)
{
    $val+=$val%2?$val++:$val--;
    echo $val."<br/>";
}
$arr=array(2);
foreach ($arr as &$val)
{
    $val+=$val%2?$val++:$val--;
    echo $val."<br/>";
}
$arr=array(3);
foreach ($arr as &$val)
{
    $val+=$val%2?$val++:$val--;
    echo $val."<br/>";
}*/



/*//看起来是整数的数其实也是浮点数   8就是7.99999999……的一种整数表示
echo intval((0.1+0.7)*10);      //输出7
echo "<br/>";*/

/*$c=5;
var_dump($c=7);       //输出int(7)
var_dump(5||$c=7);       //输出bool(true)*/
/*//=的优先级低于||，于是先计算5||$b=7,然后将结果赋给$a,$a=true;$a++仍然等于1
$a=3;
$b=5;
if($a=5||$b=7)
{
    $a++;
    $b++;
}
echo $a." ".$b;      //输出1 6
echo "<br/>";*/

/*//==的优先级高于？：   即（$x==2?"我":$x==1）?'你':'它'
$x=2;
//var_dump($x==2);
echo $x==2?"我":$x==1?'你':'它';       //输出“你”
//var_dump($x==1);
echo $x==1?"我":$x==2?'你':'它';       //输出'你'*/

/*//将字符串转化为数组，分割符为delimiter
$str='1,3,5,7,9,20,20';
echo '<pre>';
var_dump(explode(",",$str));
echo '</pre>';*/

$str="open_door";
$arr=explode("_",$str);

$st1=implode($arr[0]);
echo $st1;
$st2=implode($arr[1]);
echo $st2;
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/4/16
 * Time: 16:52
 */