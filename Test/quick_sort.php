<?php
ini_set('memory_limit','2024M');
function quick_sort(array $array)
{
    $length=count($array);
    $left_array=array();
    $right_array=array();
    if($length<=1)
    {
        return $array;
    }
    $key=$array[0];
    for ($i=1;$i<$length;$i++)
    {
        if($array[$i]>$key)
        {
            $right_array[]=$array[$i];
        }else{
            $left_array[]=$array[$i];
        }
    }
    $left_array=quick_sort($left_array);
    $right_array=quick_sort($right_array);
    return array_merge($right_array,array($key),$left_array);
}
//构造500W不重复数
for ($i=0;$i<5000000;$i++)
{
    $numArr[]=$i;
}
//打乱
shuffle($numArr);
//从里面找出最大的10个数
var_dump(time());
var_dump("<pre>");
print_r(array_slice(quick_sort($numArr),0,10));
var_dump("</pre>");
var_dump(time());



