<?PHP
	session_start() ;
	$type = 'gif';
	$width= 63;
	$height= 22;
	header("Content-type: image/".$type);
	srand((double)microtime()*1000000);
	$randval = randStr(6,"");
	$_SESSION['SafeCode'] = $randval ;
	if($type!='gif' && function_exists('imagecreatetruecolor')){
		$im = @imagecreatetruecolor($width,$height);
	}else{
		$im = @imagecreate($width,$height);
	}
	$r = Array(225,211,255,223);
	$g = Array(225,236,237,215);
	$b = Array(225,236,166,125);
	
	$key = rand(0,3);
	
	$backColor = ImageColorAllocate($im,$r[$key],$g[$key],$b[$key]);//背景色（随机）
	$borderColor = ImageColorAllocate($im, 0, 0, 0);//边框色
	$pointColor = ImageColorAllocate($im, 255, 170, 255);//点颜色
	
	@imagefilledrectangle($im, 0, 0, $width - 1, $height - 1, $backColor);//背景位置
	@imagerectangle($im, 0, 0, $width-1, $height-1, $borderColor); //边框位置
	$stringColor = ImageColorAllocate($im, 255,51,153);
	
	for($i=0;$i<=100;$i++){
		$pointX = rand(2,$width-2);
		$pointY = rand(2,$height-2);
		@imagesetpixel($im, $pointX, $pointY, $pointColor);
	}
	
	@imagestring($im, 5, 5, 1, $randval, $stringColor);
	$ImageFun='Image'.$type;
	$ImageFun($im);
	@ImageDestroy($im);
	
	//产生随机字符串
	function randStr($len=4,$format='NUMBER') {
		switch($format) {
			case 'ALL':
//				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; break;
				$chars='ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789'; break;//去掉容易混淆的字母数字 0 o 0 l 1
			case 'CHAR':
				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; break;
			case 'NUMBER':
				$chars='0123456789'; break;
			default :
//				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
				$chars='ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789'; break;//去掉容易混淆的字母数字 0 o 0 l 1
			break;
		}
		$string="";
		while(strlen($string)<$len)
			$string.=substr($chars,(mt_rand()%strlen($chars)),1);
		return $string;
	}
?>