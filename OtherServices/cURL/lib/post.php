<?php

require 'curl.php';


$curl = new curl();

$json = '{"type":"type_1","data":[288,289,389]}';

//$item = $curl->post('http://120.25.203.90:8181/engine/api/index.php?action=locator&func=multiCard', ['body'=> $json]);
$item = $curl->post('http://192.168.111.1/engine/api/index.php?action=locator&func=multiCard', ['body'=> $json]);

$times = date('Y_m_d_H_i_s',time());

file_put_contents('../'.$times.'.txt', $item['body']);
