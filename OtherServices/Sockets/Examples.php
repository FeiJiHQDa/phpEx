<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/4/24
 * Time: 10:44
 *   这个只能链接 一个 例子， 不能处理任意链接数
 */

error_reporting(E_ALL);

set_time_limit(0);
ob_implicit_flush();

$address = '127.0.0.1';
$port    = 10000;

if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
}

//if (!socket_set_option($sock, SOL_SOCKET, SO_REUSEADDR, 1)) {
//    echo "socket_set_option() failed: reason: " . socket_strerror(socket_last_error($sock));
//    exit;
//}

if (socket_bind($sock, $address, $port) === false) {
    echo "socket_bind() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
}

if (socket_listen($sock, 5) === false) {
    echo "socket_listen() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
}

// 使用服务， do while() 要比 while() 好
do {

    if (($msgsock = socket_accept($sock)) === false) {
        echo "socket_accept() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
        break;
    }

    $msg = "\nWelcome to the PHP Test Server. \n" .
        "To quit, type 'quit'. To shut down the server type 'shutdown'.\n";
    socket_write($msgsock, $msg, strlen($msg));

    do {
        if (false === ($buf = socket_read($msgsock, 2048, PHP_NORMAL_READ))) {
            echo "socket_read() failed: reason: " . socket_strerror(socket_last_error($msgsock)) . "\n";
            break 2;
        }

        if (!$buf = trim($buf)) {   // 空 continue
            continue;
        }

        if ($buf == 'quit') {
            break;
        }

        if ($buf == 'shutdown') {
            socket_close($msgsock);
            break 2;
        }

        $talkback = "PHP: You said '$buf'.\n";
        socket_write($msgsock, $talkback, strlen($talkback));
        echo "$buf\n";

    } while (true);

} while (true);

socket_close($sock);