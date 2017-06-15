<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/5/24
 * Time: 15:45
 */

require_once '../dirname.php';

// 输出 shell 命令 "ls" 的返回结果
// 并且将输出的最后一样内容返回到 $last_line。
// 将命令的返回值保存到 $retval。
//$last_line = system('ls '.escapeshellarg('-ls'), $retval);
// passthru ('ls '.escapeshellarg('-ls'), $retval);
$last_line = exec ('ls '.escapeshellarg('-l'), $retval);

// 打印更多信息
echo '<pre>';
 print_r($last_line);
echo '<pre/>';

echo '<pre>';
 print_r($retval);
echo '<pre/>';

echo dirname(__FILE__);
//echo url;