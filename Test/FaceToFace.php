<?php
/*$num=10;
function multiply(){
    $num=$num*10;
}
multiply();
echo $num;*/
/*$readcontent=fopen("http://www.php100.com/index.html",”r”);
$contents=stream_get_contents($readcontent);
fclose($readcontent);
echo $contents;*/


echo date("Y-m-d H:i:s",time()-24*3600);

echo date("Y-m-d H:i:s",strtotime("-1 day"));
/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/8/4
 * Time: 17:11
 */