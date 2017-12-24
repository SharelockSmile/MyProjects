<?php
//���������ļ������·��
//���磺$a = 'a/b/c/1/d/e.php';   
//    $b = 'a/b/12/34/c.php';
//����c.php�����e.php��λ��

//����һ
function getRelativePath($path1, $path2){
    //dirname():���� path �ĸ�Ŀ¼�� ����� path��û��б�ߣ��򷵻�һ���㣨'.'������ʾ��ǰĿ¼��
    //���򷵻ص��ǰ� path�н�β�� /component�����һ��б���Լ����沿�֣�ȥ��֮����ַ�����
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
        //array_fill()  �� value������ֵ��һ��������� num����Ŀ��
        //������ start_index  ����ָ���Ŀ�ʼ��
        $return_path=array_fill(0, $length-$i, '..');
    }
    //array_merge()��һ����������ĵ�Ԫ�ϲ�������
    //һ�������е�ֵ������ǰһ������ĺ��档������Ϊ��������顣
    //array_slice()���ظ��� offset�� length������ָ���� array  �����е�һ�����С���$i��ʼ
    $return_path=array_merge($return_path,array_slice($arr1, $i));
    echo implode('/', $return_path);
}

//������
function getpathinfo($path1,$path2){
    $arr1=explode('/', dirname($path1));
    $arr2=explode('/',dirname($path2));
    $pathinfo='';
    $length= count($arr1)>=count($arr2)?count($arr1):count($arr2);
    for( $i = 0; $i < $length; $i++ ) {
        //�������·�����Ȳ�ͬ�±�
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