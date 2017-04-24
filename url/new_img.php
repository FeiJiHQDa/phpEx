<?php
/**
 * Created by PhpStorm.
 * User: whaichao
 * Date: 2017/4/11
 * Time: 14:06
 */

$result  = file_get_contents("https://img3.doubanio.com/view/dale-online/dale_ad/public/c32d89a83836568.jpg", true);

$img = file_put_contents('test.jpg', $result);
print_r($img);


