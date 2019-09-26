<?php
function raw_color($raw){
	if($raw % 2 == 0){
		$color = "background-color:#ddf;";
	} 
	else {
		$color = "background-color:#dfd;";
	}
	return $color;
}

function encode($str){
	$key = sha1('key');	
	for($i=0; $i < strlen($str); $i++){
		$ordStr = ord(substr($str,$i,1));
		if($j == strlen($key)){$j = 0;}
		$ordKey = ord(substr($key,$j,1));
		$j++;
		$hash.=strrev(base_convert(dechex($ordStr + $ordKey),16,36));
	}
	return $hash;
}
function decode($str){
	$key = sha1('key');
	for($i=0; $i < strlen($str); $i+=2){
		$ordStr = hexdec(base_convert(strrev(substr($str,$i,2)),36,16));
		if($x == strlen($key)){$x = 0;}
		$ordKey = ord(substr($key,$x,1));
		$x++;
		$hash.= chr($ordStr - $ordKey);
	}
	return $hash;
}

/*
$pathDir = "photos";
if(!@mkdir($pathDir, 0777, true)){
	//die("Can't create directory!");
}
*/
