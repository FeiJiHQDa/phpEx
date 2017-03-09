<?php

//$a = 'anfan0757';

//$b = md5($a);

//echo $b;

$user = 'lstest1';
$passwd = '123456';

// echo md5('P'.$user.'T'.$passwd.'S');

$password =  123456;

echo substr ( md5 ( md5 ( $password ) ), 8, 16 );

echo '<br/>';
// http://whc.com/pts/ruinian/?g=Admin&c=Member&a=sms&phone=18316540501&type=13

$a = '11201311261943240000000789';
$b = 'V-Tech-Service';
$c = date('Y-m-d');

$d = substr(md5($a.$c.$b), 0, 10);
echo $d;


echo "\n".count([['id'=>1],['oo'=>2]])."\n";

$e = '[{"create_time":"2017-03-08 08:02:35","type":"1","url":"http:\/\/"},{"create_time":"2017-03-08 08:02:55","type":"1"},{"create_time":"2017-03-08 08:03:12","type":"1"},{"create_time":"2017-03-08 08:23:34","type":"1"},{"create_time":"2017-03-08 08:25:22","type":"1"}]';
$f = json_decode($e, true);

unset($f[4]);

print_r($f);