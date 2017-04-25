<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/4/25
 * Time: 9:47
 */

error_reporting(E_ALL);

echo "<h2>TCP/IP Connection</h2>\n";

// 获取端口
$service_port = '10000';
$address = '127.0.0.1';


$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if ($socket === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
} else {
    echo "OK.\n";
}

echo "Attempting to connect to '$address' on port '$service_port'...";

$result = socket_connect($socket, $address, $service_port);

if ($result === false) {
    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
} else {
    echo "OK.\n";
}
$in = "HEAD / HTTP/1.1\r\n";
$in .= "Host: 127.0.0.1:10000\r\n";
//$in .= "Connection: keep-alive\r\n\r\n";
$in .= "Connection: Close\r\n\r\n";

//$in = "Ho\r\n";
//$in .= "first blood\r\n";
$out = '';

echo "Sending HTTP HEAD request...";
socket_write($socket, $in, strlen($in));
echo "OK.\n";

echo "Reading response:\n\n";
while ($out = socket_read($socket, 2048)) {
    echo $out;
}

echo "Closing socket...";
socket_close($socket);
echo "OK.\n\n";