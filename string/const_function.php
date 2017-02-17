<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/1/24
 * Time: 20:51
 */

class const_function {
    const c = 'woj';
}


function st($s, $x) {
    return $s. "----" .$x;
}

$a = 'woo';
$b = 'xxxxs';

//echo st($a, $b);

function &wooo($s, $x) {
    return $s. "=======". $x;
}

echo wooo($a, $b);