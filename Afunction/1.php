<?php
/* //array_change_key_case�������еļ���ȫ���ĳɴ�д��CASE_UPPER/1��Сд��CASE_LOWER/0��,Ĭ����Сд
$a=array("FirSt" => 1, "SecOnd" => 4);
$b=array_change_key_case($a);
echo "<pre>";
print_r($b);
echo "</pre>"; */

/* //array array_chunk��һ������ָ�ɶ�����飬ÿ������ĳ���ȡ����SIZE,������������Ϊtrue������ԭ��ţ���Ϊfalse���򲻱�����ÿ���·ֵ��������±�ţ�Ĭ��Ϊfalse
$a=array("a","b","c","d","e","f","g");
$b=array_chunk($a,3,true);
echo "<pre>";
print_r($b);
echo "</pre>";*/

/* //array_combine ( array $keys , array $values ����һ�� array�������� keys �����ֵ��Ϊ���������� values �����ֵ��Ϊ��Ӧ��ֵ��
$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');
$c = array_combine($a, $b);
echo "<pre>";
print_r($c);
echo "</pre>"; */

/* //array_count_values ( array $input )����һ�����飬�������� input �����е�ֵ��Ϊ��������ֵ�� input �����г��ֵĴ�����Ϊֵ
$array = array(1, "hello", 1, "world", "hello");
echo "<pre>";
print_r(array_count_values($array));
echo "</pre>"; */

/* //array_diff_assoc ( array $array1 , array $array2 [, array $... ] )����һ�����飬����������������� array1 �е��ǲ����κ��������������е�ֵ(����ֻҪ��ֵ����ֵֻҪһ����ͬ��������һ��)��
$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "green", "yellow", "red");
$result = array_diff_assoc($array1, $array2);
echo "<pre>";
print_r($result);
echo "</pre>"; */

/* //array_diff_key ( array $array1 , array $array2 [, array $... ] )���� array1 �еļ����� array2 ���бȽϣ����ز�ͬ��������
$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);
echo "<pre>";
var_dump(array_diff_key($array1, $array2));
echo "</pre>"; */

/* //array_diff_uassoc ( array $array1 , array $array2 [, array $... ], callable $key_compare_func )
//�Ա��� array1 �� array2 �����ز�֮ͬ���� ע��� array_diff() ��ͬ���Ǽ���Ҳ���ڱȽϡ��� array_diff_assoc() ��ͬ����ʹ�����û��Զ���Ļص����������������õĺ�����
//�Զ��庯���ĺ�����һ�㲻Ӱ��Խ�����ж�
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

/* //array_diff_ukey() ����һ�����飬��������������г����� array1 �е���δ�������κ��������������еļ�����ֵ��
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

