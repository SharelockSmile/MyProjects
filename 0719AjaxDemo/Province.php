<?php
  header("Content-Type:text/xml;charset=gbk");
 $xml="<?xml version=\"1.0\" encoding=\"gbk\"?>";
 $xml.="<province>
 		<p><id>1</id><name>����ʡ</name></p>
 		<p><id>2</id><name>ɽ��ʡ</name></p>
 		<p><id>3</id><name>����ʡ</name></p>
 		</province>";
 //file_put_contents("f:/1.txt", $xml);
 echo $xml;
?>