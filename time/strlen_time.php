<?php

// 测试时间 2015-5 的长度

$c = strlen("2015-06");
date_default_timezone_set('PRC');
$zhTime = strtotime("2016-10-31 08:28:48");

$zhTime1 = strtotime('2016-10-31 08:28:48 -2 minute');


echo $zhTime;

echo "\n";
echo $zhTime1;
echo "\n";
echo strtotime('0000-00-00 00:00:00');
echo "\n";


$toHour = doubleval(date('H.i', false));        //设置 PRC 时 ，date(?, false) 会是 8:00

// 过滤时间
if (($toHour >= 6 && $toHour <= 8) || ($toHour >= 16 && $toHour <= 19)) {
    print_r($toHour);
    echo 'ok';
//                $FilterArr[] = $val;
}
echo $toHour . "\n";

date_default_timezone_set("UTC");
echo date("Y-m-d H:i:s", mktime(6, 54, 02)) . "\n";
echo gmdate("Y-m-d H:i:s", mktime(6, 54, 02)) . "\n";

date_default_timezone_set('PRC');

$字符串 = '000222';
echo strlen($字符串) . "\n";

for ($i = 0; $i < strlen($字符串); $i++) {
    echo $字符串[$i];
}

//Jan 01 2000 00:00:00Dec 31 1999 16:00:00