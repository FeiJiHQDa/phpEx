<?php


$BeginDate=date('Y-m-01', strtotime(date("Y-m-d"))); //获取当前月份第一天
echo $BeginDate;
echo date('Y-m-d', strtotime("$BeginDate +1 month -1 day"));     //加一个月减去一天


select id from pts_zhanhui where 1 and ( 1459440000 <= zh_tiem and end_time <= 1461945600)
