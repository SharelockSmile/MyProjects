<?php
header("Content-Type:text/xml;charset=gbk");
$xml="<?xml version=\"1.0\" encoding=\"gbk\"?>";
//��ȡʡ�ݵı�ţ��ҵ���Ӧʡ��������е�����
$pid=$_GET["pid"];
   if($pid=="1"){
   	//��������ʡ�����ض�Ӧ�ĳ���
   	$xml.="<city>
   			<c><cid>1</cid><cname>������</cname></c>
   			<c><cid>2</cid><cname>������</cname></c>
   			<c><cid>3</cid><cname>������</cname></c>
   			<c><cid>4</cid><cname>μ����</cname></c>
   			</city>";
   	
   }
   else if($pid=="2"){
   	$xml.="<city>
   			<c><cid>1</cid><cname>̫ԭ��</cname></c>
   			<c><cid>2</cid><cname>�˳���</cname></c>
   			<c><cid>3</cid><cname>��ͬ��</cname></c>
   			</city>";
   }
 /*   else if(){
   	
   	
   } */
   echo $xml;
?>