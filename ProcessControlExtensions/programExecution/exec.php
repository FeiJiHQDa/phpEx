<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/5/3
 * Time: 9:36
 *
 * 测试添加一个程序 是否能启动
 */

//Notepad++
//echo exec('Notepad++');
//print_r( shell_exec('Notepad++'));
//print_r( shell_exec('ls'));
//shell_exec

system("C:\\Program Files (x86)\\Tencent\\WeChat\\WeChat.exe", $info);
echo $info;

// exec("C:\\Program Files (x86)\\Tencent\\WeChat\\WeChat.exe", $b);
//print_r($b);
//print_r($a);