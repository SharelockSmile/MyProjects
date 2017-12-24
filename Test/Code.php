<?php
/**根据用户ID生成与之对应的唯一邀请码，范围0~9A~Z（要能根据邀请码反推出用户ID）
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/7/18
 * Time: 21:22
 */
//一：直接把用户ID转成10+26=36进制，保证
function createCode($user_id)
{
    static $source_string="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $num=$user_id;
    $code="";
    while ($num)
    {
        $mod=$num%36;
        $num=($num-$mod)/36;
        $code=$source_string[$mod].$code;
    }
    return $code;
}
echo createCode("12456")."<br/>";
?>
<?php
//优化：把0剔除当作补位，比如小于四位的邀请码在高位补0，36进制变成了35进制，把字符串顺序打乱，在不知道$source_string的情况下，无法解出正确对的user_id
function create_code($user_id)
{
    static $sourceString="E5FCDG3HQA4B1NOPIJ2RSTUV67MWX89KLYZ";
    $num=$user_id;
    $code='';
    while ($num>0)
    {
        $mod=$num%35;
        $num=($num-$mod)/35;
        $code=$sourceString[$mod].$code;
    }
    if(empty($code[3]))
    {
        $code=str_pad($code,4,'0',STR_PAD_LEFT);
    }return $code;
}
echo create_code("719732787")."<br/>";
?>
<?php
//解码函数
function decode($code)
{
    static $sourceString="E5FCDG3HQA4B1NOPIJ2RSTUV67MWX89KLYZ";
    if (strrpos($code,'0')!=false)
    {
        $code=substr($code,strrpos($code,'0')+1);
    }
    $len=strlen($code);
    $code=strrev($code);
    $num=0;
    for ($i=0;$i<$len;$i++)
    {
        $num+=strpos($sourceString,$code[$i]*pow(35,$i));
        echo $num;
    }return $num;
}
$codd="N6TMYL";
echo decode($codd);
