<?php
/**
 * Created by PhpStorm.
 * User: whaichao
 * Date: 2017/3/30
 * Time: 14:01
 */

echo is_array([]);
echo is_array('')."\n";
echo is_array(['e']);

//http_build_query

$a = [
    'chao' => 1,
    'wh' => 2,
];
echo "\r\n";
echo  http_build_query($a, '', '; ');

echo "\r\n";
echo  http_build_query($a);
echo "\r\n";

