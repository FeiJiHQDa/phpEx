<?php


$BeginDate=date('Y-m-01', strtotime(date("Y-m-d"))); //获取当前月份第一天
echo $BeginDate;
echo date('Y-m-d', strtotime("$BeginDate +1 month -1 day"));     //加一个月减去一天

echo "\n";

//select id from pts_zhanhui where 1 and ( 1459440000 <= zh_tiem and end_time <= 1461945600)

if (empty(null)) {
    echo '5';
} else {
    echo '0';
}

echo "\n";

$all = ['12' => '3000', 'vo' => '299', 'vs' => '299'];

print_r(in_array(299, $all));

echo "\n";

print_r(date('Y-m-d H:i:s'));
echo "\n";

print_r(time());