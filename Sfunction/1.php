<?php
/*//使用反斜线转义字符串addcslashes(需要转义的字符串,'转义的范围')
$str="wdryehtt";
echo addcslashes($str,'A...z');*/

/*//使用反斜杠引用字符串addslashes在某些字符前加上了反斜线。这些字符是单引号（'）、双引号（"）、反斜线（\）与 NUL（ NULL  字符）。
$str="Is your name O'reilly?" ;
echo addslashes ($str);*/

/*//删除字符串末端的字符chop(要执行该操作字符串, 删除的范围);
echo chop("   Ramki   ");//right spaces are eliminated
echo chop("Ramkrishna", "a..z");*/

/*//将二进制和十六进制相互转换bin2hex    hex2bin
echo bin2hex('Hello'); // result: 48656c6c6f
echo "<br/>";
echo hex2bin('48656c6c6f'); // result: Hello*/

/*//chr — 返回指定的字符   ord求ASCII码值
$str  =  "The string ends in escape: " ;
$str  .=  chr ( 27 );//在str后面添加换码符
//$str  =  sprintf ( "The string ends in escape: %c" ,  27 );
echo $str;
$i=0;
for($i;$i<=255;$i++)
{
    echo chr($i)."<br>";
}
 /*for($i=-300; $i<300; $i++){
	echo "Ascii $i\t" . ord(chr($i)) . "\n";
}*/

/*// 将字符串分割成小块 chunk_split  ( 要切割的字符串  [, 分割的尺寸  [, 分割的每部分以**结尾] )
$str="wsfgksiruivndjwi";
$nstr = chunk_split($str,3,"--");
echo $nstr;*/

/*//返回字符串所用字符信息count_chars()有误
$str="sfijvtiwvndfiwu";
echo "<pre>";
var_dump(count_chars($str,0)) ;
echo "<br/>";
var_dump(count_chars($str,1)) ;
echo "<br/>";
var_dump(count_chars($str,2)) ;
echo "<br/>";
var_dump(count_chars($str,3)) ;
echo "<br/>";
var_dump(count_chars($str,4)) ;
echo "</pre>";
//查找字符串首次出现的位置
echo strpos($str,"f")."<br/>";
//计算字符串出现的次数
echo substr_count($str,"w");*/

//使用一个字符串分割另一个字符串explode
$str="strcctstrvdgr";
var_dump(explode("r",$str)) ;
echo "<br/>";
var_dump(explode("r",$str,3));
echo "<br/>";
var_dump(explode("r",$str,-2));
//将一个一维数组的值转化为字符串implode
$arr=array("q",3,"r",6,4,"we");
$nstr="";
echo "<br/>".implode($nstr,$arr);
//通过一个正则表达式分割给定字符串preg_split
echo "<br/>";
