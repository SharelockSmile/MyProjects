<?php
class LoadAction extends Action
{
	//从POST过来的JS路径读取文件内容并赋于变量输出到客户端
	function LoadJsFile()
	{
		$jspath = $_POST["jspath"];
		$str = "";
		$str =  file_get_contents($jspath);
		echo $str;
	}
}
?>