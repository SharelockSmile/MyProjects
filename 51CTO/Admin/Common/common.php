<?php
function parseParams($params){
	$p=explode("\n",$params);
	$r=array();
	foreach ($p as $v){
		$tmp=explode('=',$v);
		$r[$tmp[0]]=$tmp[1];
	}
	return $r;
}
?>
