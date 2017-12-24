<?php
/* $str  =  "The string ends in escape: " ;
$str  .=  chr ( 27 );//在str后面添加换码符
echo $str; */
$i=0;
/* for($i;$i<=255;$i++)
{
	echo chr($i)."<br>";
} */
for($i=-300; $i<300; $i++){
	echo "Ascii $i\t" . ord(chr($i)) . "\n";
} 