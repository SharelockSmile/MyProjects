<?php
//JSON:
//   [
  //   {"id":1,"name":"����ʡ"},
 //    {"id":1,"name":"ɽ��ʡ"}
//   ]

     //1.��ȡ���ݿ���ʡ�ݵ���Ϣ
header("Content-Type:text/xml;charset=gbk");
$xml="<?xml version=\"1.0\" encoding=\"gbk\"?>"; 
$link=mysql_connect("localhost","root","root") or die("���ݿ�����ʧ�ܣ�");
mysql_select_db("CityCasc") or die("�Ҳ���ָ�������ݿ⣡");
mysql_query("set names gbk");
//��ȡ��ʾ����
$n=$_GET["n"];
if($n=="1"){
	//���������ʡ�ݵ����ݣ�
$sql="select pid,pname from Province";
$res=mysql_query($sql) or die("sqlִ��ʧ�ܣ�");
//echo $res;
$xml.="<province>";
while ( ($arr=mysql_fetch_assoc($res))!=false){
	$xml.="<p><id>{$arr["pid"]}</id><name>{$arr["pname"]}</name></p>";
}
$xml.="</province>";
}
else if($n=="2"){
	$pid=$_GET["pid"];
	//�����ͨ��ʡ��������У�
	$sql="select cid,cname from city where pid={$pid}";
	$res=mysql_query($sql) or die("sqlִ��ʧ�ܣ�");
	$xml.="<city>";
	while ( ($arr=mysql_fetch_assoc($res))!=false){
		$xml.="<c><cid>{$arr["cid"]}</cid><cname>{$arr["cname"]}</cname></c>";
	}
	$xml.="</city>";
	
} 
/* else if(){
	//�����ͨ���������������ģ�

} */
echo $xml;


?>