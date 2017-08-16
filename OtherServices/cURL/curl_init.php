<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/8/15
 * Time: 10:17
 */

$mtime = explode(" ", microtime());
$mtime = $mtime[1].($mtime[0] * 1000);
$mtime2 = explode(".", $mtime);
$mtime = $mtime2[0];
echo $mtime;
echo "<br>";
for($i=1; $i<=5; $i++){
    $szUrl = 'http://www.webkaka.com/';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $szUrl);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_ENCODING, '');
    $data=curl_exec($curl);
    echo $data;
    echo "<br>";
    $mtime_ = explode(" ", microtime());
    $mtime_ = $mtime_[1].($mtime_[0] * 1000);
    $mtime2_ = explode(".", $mtime_);
    $mtime_ = $mtime2_[0];
    echo $mtime_;
    echo "<br>";
    echo $mtime_ - $mtime;
}