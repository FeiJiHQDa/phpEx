<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/11/10
 * Time: 15:16
 */


//$m0 = memory_get_usage();
//$k = range(1,200000);
//$m1 = memory_get_usage();
//echo round(($m1-$m0)/pow(1024,2),4) ."MB\n";
//foreach ($k as $i){
//    $n1 = "kk$i";
//    $n2 = "tt$i";
//    list($$n1,$$n2) = [$i,$i*3];
//}
//$m2 = memory_get_usage();
//echo round(($m2-$m1)/pow(1024,2),4) ."MB\n";
//
//
//$m1 = memory_get_usage();
//foreach ($k as $i){
//    $n1 = "kk$i";
//    $n2 = "tt$i";
//    $$n1 = $i+time();
//    $$n2 = 2*time();
//}
//$m2 = memory_get_usage();
//echo round(($m2-$m1)/pow(1024,2),4) ."MB\n";


$m0 = memory_get_usage();
$m4 = [];
for ($i = 0; $i < 500000; $i++) {
    $m4[$i] = $i;
}

$m1 = memory_get_usage();
echo round(($m1-$m0)/pow(1024,2),4) ."MB\n";