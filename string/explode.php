<?php
/**
 * Created by PhpStorm.
 * User: whaichao
 * Date: 2017/3/4
 * Time: 14:34
 */

$a = 'cache/201703/32377_01010104.hex';

$b = explode('/', $a);

//print_r($b);

$c = strstr( explode('/', $a)[2],'_');

//$d = strstr($b[2], $c);

//echo  $d;
echo $c;