<?php

//$a = 'anfan0757';

//$b = md5($a);

//echo $b;

$user = 'lstest1';
$passwd = '123456';

// echo md5('P'.$user.'T'.$passwd.'S');

$password =  123456;

echo substr ( md5 ( md5 ( $password ) ), 8, 16 );

// http://whc.com/pts/ruinian/?g=Admin&c=Member&a=sms&phone=18316540501&type=13
