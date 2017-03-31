<?php
/**
 * Created by PhpStorm.
 * User: whaichao
 * Date: 2017/3/31
 * Time: 15:46
 */

/*
 * 测试 curl
 */
require_once 'curl.php';

$re = new curl();
//$get = $re->get('http://checks.com/api/test/ok');
$get = $re->get('http://checks.com/api/test/ok',['ox'=>'s']);

//$get = $re->post('http://checks.com/api/test/pok', ['body' => ['bocy'=>'oss', 'vs' => '2017']]);

//$get = $re->post('http://checks.com/api/test/pok', [
//    'json' => ['bocy'=>'oss', 'vs' => '2017'],
//    'cookies' => [
//        'fruit' => 'apple',
//        'colour' => 'red'
//    ]
//]);

//$get = $re->post('http://checks.com/api/test/pok', [
//    'form' => ['bocy'=>'oss', 'vs' => '2017'],
//]);

print_r($get);