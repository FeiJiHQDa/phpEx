<?php

$arrayName = ['hot' => '1d', 'hui' => '0.52', 'ooo' => '00x'];
foreach ($arrayName AS $key => $val) {
    // print_r($val);
//    if (empty($val))
//        print_r("kong");
    print_r($val."\n");
    $val = 'woooo';
//    unset($val);
}


var_dump($arrayName);

