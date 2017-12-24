<?php
header("Content-Type:text/xml;charset=gbk");
$xml="<?xml version=\"1.0\" encoding=\"gbk\"?>";
//获取省份的编号，找到对应省份下面的市的数据
$pid=$_GET["pid"];
   if($pid=="1"){
   	//这是陕西省，返回对应的城市
   	$xml.="<city>
   			<c><cid>1</cid><cname>西安市</cname></c>
   			<c><cid>2</cid><cname>宝鸡市</cname></c>
   			<c><cid>3</cid><cname>汉中市</cname></c>
   			<c><cid>4</cid><cname>渭南市</cname></c>
   			</city>";
   	
   }
   else if($pid=="2"){
   	$xml.="<city>
   			<c><cid>1</cid><cname>太原市</cname></c>
   			<c><cid>2</cid><cname>运城市</cname></c>
   			<c><cid>3</cid><cname>大同市</cname></c>
   			</city>";
   }
 /*   else if(){
   	
   	
   } */
   echo $xml;
?>