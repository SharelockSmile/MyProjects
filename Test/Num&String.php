<?php
/*//系统内置API方式
$num='23486795';
$number=(int)$num;
echo $number;
//输出23486795
$numb=intval($num);
var_dump($numb);
//输出int(23486795) */

//采用ASCII码方式
var_dump('9'-'0');
function convertInt($strInt='')
{
    $len=strlen($strInt);
    $int=0;

    for($i=0;$i<$len;$i++)
    {
        $int*=10;
        $num=$strInt{$i}-'0';
        $int+=$num;
    }
    var_dump($int);
    return $int;
}
$num='5489762469';
var_dump(convertInt($num));
//输出float(5489762469)
