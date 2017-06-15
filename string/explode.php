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
//echo $c;

$e = explode(' ', trim('ls -l www.baidu.com/php  

'));
/*
print_r($e);
print_r(empty($e[4]) ? '' : $e[4]);
print_r(strlen(''));
*/

function getValue($str) {
    $str = trim($str);
    $arr = explode(' ', $str);

    if ($arr[0] === 'download') {
        $arr_o = [
            'type'  => 'download',
            'param' => [
                'url' => $arr[1],
                'dir' => empty($arr[2]) ? '' : $arr[2],
            ],
        ];
    } else if ($arr[0] === 'upload') {
        $arr_o = [
            'type'  => 'upload',
            'param' => [
                'file' => $arr[1],
                'url'  => empty($arr[2]) ? '' : $arr[2],
            ],
        ];
    } else {
        $arr_o = [
            'type' => 'shell',
            'param' => [
                'run' => $str
            ]
        ];
    }

    return array_merge($arr_o, ['packid' => 22]);
}

$f = getValue('ls -l');
print_r($f);

// 获取最后一行内容
$text = "Line 1\nLine 542\nLine 3";
$last = substr(strrchr($text, 10), 1 );

//echo $last;

$g = strpos('!!!###start{"return":1,"message":"\u6ca1\u6709\u6700\u65b0\u7684shell"}end###!!!', '!!!###start');
$h = strrpos('!!!###start{"return":1,"message":"\u6ca1\u6709\u6700\u65b0\u7684shell"}end###!!!', 'end###!!!');
$i = substr('!!!###start{"return":1,"message":"\u6ca1\u6709\u6700\u65b0\u7684shell"}end###!!!', 11, bcsub($h, 11));
print_r( $i);
//print_r( $h);
//print_r($i);