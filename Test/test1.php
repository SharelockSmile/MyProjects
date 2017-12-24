<?php
//计算两个文件的相对路径
//比如：$a = 'a/b/c/1/d/e.php';   
//    $b = 'a/b/12/34/c.php';
//计算c.php相对于e.php的位置

//方法一
function getRelativePath($path1, $path2){
    //dirname():返回 path 的父目录。 如果在 path中没有斜线，则返回一个点（'.'），表示当前目录。
    //否则返回的是把 path中结尾的 /component（最后一个斜线以及后面部分）去掉之后的字符串。
    $arr1=explode('/',dirname($path1));
    //echo dirname($path1)."<br />";//    a/b/c/d
    $arr2=explode('/',dirname($path2));
    $length=count($arr2);
    for($i=0;$i<$length;$i++){
        if($arr1[$i]!=$arr2[$i]){
            break;
        }
    }
    if($i<$length){
        //array_fill()  用 value参数的值将一个数组填充 num个条目，
        //键名由 start_index  参数指定的开始。
        $return_path=array_fill(0, $length-$i, '..');
    }
    //array_merge()将一个或多个数组的单元合并起来，
    //一个数组中的值附加在前一个数组的后面。返回作为结果的数组。
    //array_slice()返回根据 offset和 length参数所指定的 array  数组中的一段序列。从$i开始
    $return_path=array_merge($return_path,array_slice($arr1, $i));
    echo implode('/', $return_path);
}

//方法二
function getpathinfo($path1,$path2){
    $arr1=explode('/', dirname($path1));
    $arr2=explode('/',dirname($path2));
    $pathinfo='';
    $length= count($arr1)>=count($arr2)?count($arr1):count($arr2);
    for( $i = 0; $i < $length; $i++ ) {
        //如果两个路径长度不同下标
        if(!isset($arr1[$i])){
            $arr1[$i]='';
        }elseif(!isset($arr2[$i])){
            $arr2[$i]='';
        }
        $pathinfo.=$arr1[$i] == $arr2[$i] ? '../' : $arr1[$i].'/';
    }
    echo  $pathinfo;
    }
$a = 'a/b/c/1/d/e.php';
$b = 'a/b/12/34/c.php';
getRelativePath($a, $b);
echo "<br />";
getpathinfo($a, $b);
?>