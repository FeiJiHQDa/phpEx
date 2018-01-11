<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2018/1/10
 * Time: 9:31
 */


$arr = array('1' => 'foo');
$obj = (object) array('1' => 'foo');

$str = '100';
$str1 = 'y100';
$str2 = '100y';

//print_r(intval($arr));
print_r((int) $str1);
print_r((int) $str2);

//print_r(intval($obj));