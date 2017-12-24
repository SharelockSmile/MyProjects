<?php
/* //array_change_key_case将数组中的键名全部改成大写（CASE_UPPER/1）小写（CASE_LOWER/0）,默认是小写
$a=array("FirSt" => 1, "SecOnd" => 4);
$b=array_change_key_case($a);
echo "<pre>";
print_r($b);
echo "</pre>"; */

/* //array array_chunk讲一个数组分割成多个数组，每个数组的长度取决于SIZE,若第三个参数为true，则保留原标号，若为false，则不保留，每个新分的数组重新标号，默认为false
$a=array("a","b","c","d","e","f","g");
$b=array_chunk($a,3,true);
echo "<pre>";
print_r($b);
echo "</pre>";*/

/* //array_combine ( array $keys , array $values 返回一个 array，用来自 keys 数组的值作为键名，来自 values 数组的值作为相应的值。
$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');
$c = array_combine($a, $b);
echo "<pre>";
print_r($c);
echo "</pre>"; */

/* //array_count_values ( array $input )返回一个数组，该数组用 input 数组中的值作为键名，该值在 input 数组中出现的次数作为值
$array = array(1, "hello", 1, "world", "hello");
echo "<pre>";
print_r(array_count_values($array));
echo "</pre>"; */

/* //array_diff_assoc ( array $array1 , array $array2 [, array $... ] )返回一个数组，该数组包括了所有在 array1 中但是不在任何其它参数数组中的值(其中只要键值或者值只要一个不同都算作不一样)。
$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "green", "yellow", "red");
$result = array_diff_assoc($array1, $array2);
echo "<pre>";
print_r($result);
echo "</pre>"; */

/* //array_diff_key ( array $array1 , array $array2 [, array $... ] )根据 array1 中的键名和 array2 进行比较，返回不同键名的项
$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);
echo "<pre>";
var_dump(array_diff_key($array1, $array2));
echo "</pre>"; */

/* //array_diff_uassoc ( array $array1 , array $array2 [, array $... ], callable $key_compare_func )
//对比了 array1 和 array2 并返回不同之处。 注意和 array_diff() 不同的是键名也用于比较。和 array_diff_assoc() 不同的是使用了用户自定义的回调函数，而不是内置的函数。
//自定义函数的函数体一般不影响对结果的判断
function key_compare_func($a, $b)
{
	if ($a === $b) {
		return 0;
	}
	return ($a > $b)? 1:-1;
}

$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "green", "yellow", "red");
$result = array_diff_uassoc($array1, $array2, "key_compare_func");
echo "<pre>";
print_r($result);
echo "</pre>"; */

/* //array_diff_ukey() 返回一个数组，该数组包括了所有出现在 array1 中但是未出现在任何其它参数数组中的键名的值。
function key_compare_func($key1, $key2)
{
	if ($key1 == $key2)
		return 0;
	else if ($key1 > $key2)
		return 1;
	else
		return -1;
}

$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);
echo "<pre>";
var_dump(array_diff_ukey($array1, $array2, 'key_compare_func'));
echo "</pre>"; */

