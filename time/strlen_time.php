<?php

// 测试时间 2015-5 的长度

$c = strlen("2015-06");
date_default_timezone_set('PRC');
$zhTime = strtotime("2015-06-3");


echo $zhTime;
