<?php

function curl_url_img () {
	//$url = "http://static.oschina.net/uploads/user/125/251355_50.jpg?t=1371297305000";
		$url = "http://mmbiz.qpic.cn/mmbiz/hgWbOr8Wr4WjfWdjKLTLmlTMKMTTZ3IZA73HPBib9yuMU5LZ9P2XH1iaOwaGf08cfR7wK3dpwEY0z1d2tSP7P6HA/0";
	$curl = curl_init($url);
	$filename = './img/'.date("Ymdhis").".jpg";
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
	$imageData = curl_exec($curl);
	curl_close($curl);

	$tp = @fopen($filename, 'a');
	fwrite($tp, $imageData);
	fclose($tp);
}
curl_url_img();
