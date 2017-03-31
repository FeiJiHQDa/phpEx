<?php
/**
 * Created by PhpStorm.
 * User: whaichao
 * Date: 2017/3/31
 * Time: 15:46
 */

require_once 'curl.php';

$re = new curl();
//$get = $re->get('http://checks.com/api/test/ok');
//$get = $re->post('http://checks.com/api/test/pok', ['body' => ['bocy'=>'oss', 'vs' => '2017']]);
$get = $re->post('http://checks.com/api/test/pok', [
    'json' => ['bocy'=>'oss', 'vs' => '2017'],
    'cookies' => [
        'fruit' => 'apple',
        'colour' => 'red'
    ]
]);


print_r($get);