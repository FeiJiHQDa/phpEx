<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/8/15
 * Time: 10:23
 */


/*
 * 步骤总结如下：

    第一步：调用curl_multi_init
    第二步：循环调用curl_multi_add_handle
    这一步需要注意的是，curl_multi_add_handle的第二个参数是由curl_init而来的子handle。
    第三步：持续调用curl_multi_exec
    第四步：根据需要循环调用curl_multi_getcontent获取结果
    第五步：调用curl_multi_remove_handle，并为每个字handle调用curl_close
    第六步：调用curl_multi_close
 */

function one() {
    echo date("Y-m-d H:m:s", time());
    echo " ";
    echo floor(microtime() * 1000);
    echo "<br>";
    $mtime  = explode(" ", microtime());
    $mtime  = $mtime[1] . ($mtime[0] * 1000);
    $mtime2 = explode(".", $mtime);
    $mtime  = $mtime2[0];
    echo $mtime;
    echo "<br>";
    $urls = [
        'http://www.webkaka.com',
        'http://www.webkaka.com',
        'http://www.webkaka.com',
        'http://www.webkaka.com',
        'http://www.webkaka.com'];

    print_r(async_get_url($urls)); // [0] => example1, [1] => example2


    echo "<br>";
    echo date("Y-m-d H:m:s", time());
    echo " ";
    echo floor(microtime() * 1000);
    echo "<br>";
    $mtime_  = explode(" ", microtime());
    $mtime_  = $mtime_[1] . ($mtime_[0] * 1000);
    $mtime2_ = explode(".", $mtime_);
    $mtime_  = $mtime2_[0];
    echo $mtime_;
    echo "<br>";
    echo $mtime_ - $mtime;


}

// 多线程
function async_get_url($url_array, $wait_usec = 0) {
    if (!is_array($url_array))
        return false;
    $wait_usec = intval($wait_usec);
    $data      = [];
    $handle    = [];
    $running   = 0;
    $mh        = curl_multi_init(); // multi curl handler
    $i         = 0;
    foreach ($url_array as $url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return don't print
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // 302 redirect
        curl_setopt($ch, CURLOPT_MAXREDIRS, 7);
        curl_multi_add_handle($mh, $ch); // 把 curl resource 放进 multi curl handler 里
        $handle[$i++] = $ch;
    }
    /* 执行 */
    do {
        curl_multi_exec($mh, $running);
        if ($wait_usec > 0) /* 每个 connect 要间隔多久 */
            usleep($wait_usec); // 250000 = 0.25 sec
    } while ($running > 0);
    /* 读取资料 */
    foreach ($handle as $i => $ch) {
        $content  = curl_multi_getcontent($ch);
        $data[$i] = (curl_errno($ch) == 0) ? $content : false;
    }
    /* 移除 handle*/
    foreach ($handle as $ch) {
        curl_multi_remove_handle($mh, $ch);
    }
    curl_multi_close($mh);
    return $data;
}


// 多线程
$t       = getTime();
$total   = 10;
$url_arr = [];
$active  = null;
for ($i = 0; $i < $total; $i++) {
    $url_arr[] = 'http://checks.com/api/test/ok';
//    $url_arr[] = 'http://checks.com/api/test/ok';
}

$mh = curl_multi_init();

foreach ($url_arr as $key => $val) {
    $conn[$key] = curl_init();

    curl_setopt($conn[$key], CURLOPT_URL, $val);
    curl_setopt($conn[$key], CURLOPT_RETURNTRANSFER, 1); // 设置返回页面输出内容
    curl_multi_add_handle($mh, $conn[$key]);             // 添加线程
}

// ------------- 执行批量处理句柄 -----------

do {
    $mrc = curl_multi_exec($mh,$active);
//    print_r($mrc."\n");
}while ($active > 0);
//}while ($mrc == CURLM_CALL_MULTI_PERFORM);

//while ($active and $mrc == CURLM_OK) {
//    if (curl_multi_select($mh) != -1) {
//        do {
//            $mrc = curl_multi_exec($mh, $active);
//        } while ($mrc == CURLM_CALL_MULTI_PERFORM);
//    }
//}


// ================ 获取数据 ===============
$rs = [];
foreach ($url_arr as $i => $url) {
    $rs[$i] = curl_multi_getcontent($conn[$i]);
    curl_multi_remove_handle($mh, $conn[$i]);
    curl_close($conn[$i]);
}

curl_multi_close($mh);


foreach ($rs as $r => $v) {
    echo $v."\n";
}

runTime($t);
//--------------------- 时间函数 ------------------------
function getTime() {
    $time = explode(' ', microtime());
    return $time[1] . substr($time[0], 1);
}

function runTime($t, $l = 3) {
    $dir = getTime() - $t;
    echo ' ' . number_format($dir, $l);
}

//echo gettime();
//
//print_r($url_arr);