<?php

$mystring = '|2|63|6|';
$findme   = '|2|';
$pos = strpos($mystring, $findme);

if ($pos !== false) {
	echo $pos;
} else {
	echo "NO";
}
// 
// $mystring = '|a|b|c|';
// $findme   = '|c|';
// $pos = strpos($mystring, $findme);

// // 使用 !== 操作符。使用 != 不能像我们期待的那样工作，
// // 因为 'a' 的位置是 0。语句 (0 != false) 的结果是 false。
// if ($pos !== false) {
//      echo "The string '$findme' was found in the string '$mystring'";
//          echo " <br/>and exists at position $pos";
// } else {
//      echo "The string '$findme' was not found in the string '$mystring'";
// }

echo "\n";
$c = 'beats_20170309172718';

$d = strstr($c, '_', TRUE);
$e = strpos ($c, '_');
echo $d."\n";
echo $e;