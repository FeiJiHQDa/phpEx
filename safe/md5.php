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
