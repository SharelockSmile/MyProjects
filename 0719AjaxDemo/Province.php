<?php
  header("Content-Type:text/xml;charset=gbk");
 $xml="<?xml version=\"1.0\" encoding=\"gbk\"?>";
 $xml.="<province>
 		<p><id>1</id><name>陕西省</name></p>
 		<p><id>2</id><name>山西省</name></p>
 		<p><id>3</id><name>河南省</name></p>
 		</province>";
 //file_put_contents("f:/1.txt", $xml);
 echo $xml;
?>