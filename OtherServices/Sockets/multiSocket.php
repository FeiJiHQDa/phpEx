<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/7/18
 * Time: 16:01
 *  处理多个链接
 */

error_reporting(E_ALL);

set_time_limit(0);

ob_implicit_flush();

$address = '127.0.0.1';
$port = 10001;

if (($sock = socket_create(AF_INET, SOCK_STREAM,  SOL_TCP)) === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
}

if (socket_bind($sock, $address, $port) === false ) {
    echo "socket_bind() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
}

if (socket_listen($sock, 5) === false) {
    echo "socket_listen() failed: reason: " . socket_strerror(socket_last_error($sock)) . "\n";
}

$clients = [];

do {

    $read = [];
    $read[] = $sock;

    $read = array_merge($read, $clients);
//    $read_select = ;
//    print_r($read);

    // socket_select 设立一个阻塞调用
//    if (socket_select($read, $write = NULL, $except = NULL, $tv_sec = 5) < 1) {
////        SocketServer::debug("Problem blocking socket_select?");
//        continue;
//    }

    // 处理新连接
    if (in_array($sock, $read)) {

        if (($msgsock = socket_accept($sock)) === false) {
            echo "socket_read() failed: reason: " . socket_strerror(socket_last_error($msgsock)) . "\n";
            break;
        }

        $clients[] = $msgsock;
        $key = array_keys($clients, $msgsock);

        $msg = "\nWelcome to the PHP Test Server. \n" .
            "To quit, type 'quit'. To shut down the server type 'shutdown'.\n";

        socket_write($msgsock, $msg, strlen($msg));

    }

    // 处理输入
    foreach ($clients as $key => $client) {
        if (in_array($client, $read)) {

            if (false === ($buf = socket_read($client, 2048, PHP_NORMAL_READ))) {
                echo "socket_read() failed: reason: " . socket_strerror(socket_last_error($client)) . "\n";
                break 2;
            }

            if (!$buf = trim($buf)) {
                continue;
            }

            if ($buf == 'quit') {
                unset($clients[$key]);
                socket_close($client);
                break;
            }

            if ($buf == 'shutdown') {
                socket_close($client);
                break 2;
            }
            $talkback = "Client {$key} : Usted dijo '$buf'.\n";
            socket_write($client, $talkback, strlen($talkback));
            echo "$buf\n";
        }
    }

} while(true);

socket_close($sock);