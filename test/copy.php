<?php

// $source = 'http://120.26.220.65:8088/bespoke/download/designer/SDN00004/SDN00004_1.png';
$source = "SDN00004_1.png";
$dest = "http://115.29.249.196:8080/bespoke/upload/order/SDN00004_1.png";

if (!copy($source, $dest)) {
	echo "failed to copy $source ...\n";
} else 
	echo "OK";

?>
