<?php


$s = [1, 2];
$a = json_encode($s);

$implodes = implode(',', $s);

print_r($implodes);
print_r($a);