<?php
ini_set('memory_limit','2024M');
//利用二叉堆算法
//生成小顶堆函数
function Heap(&$arr,$idx)
{
    $left=($idx<<1)+1;
    $right=($idx<<1)+2;
    if(!$arr[$left])
    {
        return;
    }

    if($arr[$right]&&$arr[$right]<$arr[$left])
    {
        $l=$right;
    }else{
        $l=$left;
    }

    if($arr[$idx]>$arr[$l])
    {
        $tmp=$arr[$idx];
        $arr[$idx]=$arr[$l];
        $arr[$l]=$tmp;
        Heap($arr,$l);
    }
}

//构造500W不重复数
for ($i=0;$i<5000000;$i++)
{
    $numArr[]=$i;
}
//打乱
shuffle($numArr);
//先取出10个到数组
$topArr=array_slice($numArr,0,10);
/**
 * 获取最后一个有子节点的索引的位置
 * 因为在构造小顶堆的时候从最后一个有左或右节点的位置
 * 开始从下往上不断进行移动构造
 */

$idx=floor(count($topArr)/2)-1;
//生成小顶堆
for($i=$idx;$i>=0;$i--)
{
    Heap($topArr,$i);
}


var_dump(time());
var_dump("<pre>");
//开始遍历
for($i=count($topArr);$i<count($numArr);$i++)
{
    if($numArr[$i]>$topArr[0])
    {
        $topArr[0]=$numArr[$i];
        /**
         * 重新调用生成小顶堆函数进行维护，只不过这次是把顶堆的索引位置开始自上往下进行维护
         * 因为我们只是把堆顶的元素给替换掉而其余位置还是按根节点小于左右节点的顺序摆放
         * 这也就是，只相对调整，并不全部调整
         */
        Heap($topArr,0);
    }
}
var_dump("</pre>");
var_dump(time());
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/6/10
 * Time: 11:57
 */