<?php

$a = array( "JbknfSxfGJm-WU3VLO9Bg0a2mKB_9DUmu9QIBDLZ5XNSkorbnnEmrE0cIoQ47KCl", "JbknfSxfGJm-WU3VLO9Bg0a2mKB_9DUmu9QIBDLZ5XNSkorbnnEmrE0cIoQ47KCl", "JbknfSxfGJm-WU3VLO9Bg0a2mKB_9DUmu9QIBDLZ5XNSkorbnnEmrE0cIoQ47KCl");
// $json = '{"goods_id":1,"goods_id":2}';

$b = json_encode($a);

$c = '["JbknfSxfGJm-WU3VLO9Bg0a2mKB_9DUmu9QIBDLZ5XNSkorbnnEmrE0cIoQ47KCl","JbknfSxfGJm-WU3VLO9Bg0a2mKB_9DUmu9QIBDLZ5XNSkorbnnEmrE0cIoQ47KCl","JbknfSxfGJm-WU3VLO9Bg0a2mKB_9DUmu9QIBDLZ5XNSkorbnnEmrE0cIoQ47KCl"]';
$d = json_decode($c);

print_r($b);

?>
