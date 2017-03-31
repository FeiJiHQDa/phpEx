<?php
/**
 * Created by PhpStorm.
 * User: whaichao
 * Date: 2017/3/30
 * Time: 17:59
 */

preg_match_all("|<[^>]+>(.*)</[^>]+>|U",
    "<b>example: </b><div align=left>this is a test</div>",
    $out, PREG_PATTERN_ORDER);

//print_r($out);

$a = 'HTTP/1.1 200 OK
Date: Fri, 31 Mar 2017 01:31:15 GMT
Server: Apache/2.4.23 (Win32) OpenSSL/1.0.2h PHP/7.0.9
X-Powered-By: PHP/7.0.9
Cache-Control: no-cache, private
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

    0k';

print_r($a);

$pattern = '#HTTP/\d\.\d.*?$.*?\r\n\r\n#ims';

preg_match_all($pattern, $a, $matches);
//print_r($matches);

echo "\r\n";
$headers_string = array_pop($matches['0']);

$headers = explode("\r\n", str_replace("\r\n\r\n", '', $headers_string));

$c = str_replace($headers_string, '', $a);

$version_and_status = array_shift($headers);

print_r(
    $version_and_status
);

preg_match('#HTTP/(\d\.\d)\s(\d\d\d)\s(.*)#', $version_and_status, $matches);
$d['Http-Version'] = $matches[1];
$d['Status-Code'] = $matches[2];
$d['Status'] = $matches[2].' '.$matches[3];

# Convert headers into an associative array
foreach ($headers as $header) {
    preg_match('#(.*?)\:\s(.*)#', $header, $matches);
    $d[$matches[1]] = $matches[2];
}

//$e['body'] = $c;
$e['headers'] = $d;

//print_r($d);
echo "\r\n";
print_r($e);