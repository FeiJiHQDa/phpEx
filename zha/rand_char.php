<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/9/27
 * Time: 13:52
 */

function getTime() {
    $time = explode(' ', microtime());
    return $time[1] . substr($time[0], 1);
}

function runTime($t, $l = 3) {
    $dir = getTime() - $t;
    echo ' ' . number_format($dir, $l);
}

function generate_fun($chars, $length = 8) {
    // 密码字符集，可任意添加你需要的字符
//    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~`+=,.;:/?|';


    $password = '';
    for ($i = 0; $i < $length; $i++) {
        // 这里提供两种字符获取方式
        // 第一种是使用 substr 截取$chars中的任意一位字符；
        // 第二种是取字符数组 $chars 的任意元素
        // $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        $password .= $chars[mt_rand(0, strlen($chars) - 1)];
    }

    return $password;
}


$chars_one   = '123456789';
$chars_twe   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$chars_three = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';


$t = getTime();

//1168000
// 不加锁
// 不加锁 && % 1000
$txt = '';
$i = 0;
$j = 0;
$arrb = [];
//for ($i = 0; $i < 1168000; $i++) {
while ($i != 1168000) {

    $j++;

    $txt2 = '000001' . generate_fun($chars_one, 3) . generate_fun($chars_twe, 3) . generate_fun($chars_three, 6);

    if (in_array($txt2, $arrb)) {
        continue;
    }



    $arrb[] = $txt2;
    $txt .= $txt2 . "\n";
    $i++;
//    if ($i % 1000 == 0) {
//
//        $txt = '';
//    }

    if ($i % 10000 == 0) {
        echo "\n".$i . ' --- '. $j;
    }
}
file_put_contents('116800071.txt', trim($txt),   LOCK_EX);
runTime($t);

echo "\n".$i . ' --- '. $j;