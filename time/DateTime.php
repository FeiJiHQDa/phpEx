<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/12/20
 * Time: 14:06
 */


//date_default_timezone_set('UTC');

//echo date('Y-m-d H:i:s');
//echo "\n";



function toTimeZone($src, $from_tz = 'UTC', $to_tz = 'Asia/Shanghai', $fm = 'Y-m-d H:i:s') {

    $ttt = date('H:i:s', mktime(substr($src, 0, 2), substr($src, 2, 2), substr($src, 4)));

    $datetime = new DateTime($ttt, new DateTimeZone($from_tz));
    echo $datetime->format($fm) . "\n";
    $la_time = new DateTimeZone($to_tz);
    $datetime->setTimezone($la_time);
    return $datetime->format($fm);

}

$time = date('Y-m-d H:i:s');
//toTimeZone($time);
echo toTimeZone('204034.930');