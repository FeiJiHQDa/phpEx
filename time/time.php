<?php 

// $birther = strtotime('1969-06-15');

// print_r($birther.'-');

// $time = date('Y-m-d', $birther);

// date_default_timezone_set('PRC');
// $time = strtotime(date("Y-m-d", time()));

// echo date('Y-m-d H:i:s', $time);
// $toTime = strtotime(date('Y-m-d H:i:s', $time));
// echo '-';

date_default_timezone_set('PRC');
        $time = strtotime(date("Y-m-d", time()));
        $toTime = strtotime(date('Y-m-d H:i:s', $time));
//echo $toTime;


$times = date('Y-m-d H:i:s');

echo $times;

 ?>
