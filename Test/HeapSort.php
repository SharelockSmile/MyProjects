<?php
ini_set('memory_limit','2024M');
function Heap($arr, $idx)
{
	$left=($idx<<1)+1;
	$right=($idx<<1)+2;
	if(!$arr[$left])
	{
		return ;
	}
	
	if(@$arr[$right] && $arr[$right] < $arr[$left])
	{
		$l = $right;
	}
	else {
		$l = $left;
	}
	
	if($arr[$idx] > $arr[$l])
	{
		$tmp = $arr[$idx];
		$arr[$idx] = $arr[$l];
		$arr[$l] = $tmp;
		Heap($arr,$l);
	} 
}
//����500W���ظ���
for($i=0;$i<5000000;$i++)
{
	$numArr[]=$i;
}

//����
shuffle($numArr);
//��ȡ��10��������
$topArr=array_slice($numArr,0,10);

//��ȡ���һ�����ӽڵ������λ��
$idx=floor(count($topArr)/2)-1;
//����С����
for($i=$idx;$i>=0;$i--)
{
	Heap($topArr,$i);
}

var_dump(time());
var_dump("<pre>");
//��ʼ����
for($i=count($topArr);$i<count($numArr);$i++)
{
	if($numArr[$i]>$topArr[0])
	{
		$topArr[0]=$numArr[$i];
		/**
		 * ���µ�������С���Ѻ�������ά����ֻ��������ǰѶ��ѵ�����λ�ÿ�ʼ�������½���ά��
		 * ��Ϊ����ֻ�ǰѶѶ���Ԫ�ظ��滻��������λ�û��ǰ����ڵ�С�����ҽڵ��˳��ڷ�
		 * ��Ҳ���ǣ�ֻ��Ե���������ȫ������
		*/
		Heap($topArr,0);
	}
}
var_dump("</pre>");
var_dump(time());