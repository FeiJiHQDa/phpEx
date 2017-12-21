<?php

// $birther = strtotime('1969-06-15');

// print_r($birther.'-');

// $time = date('Y-m-d', $birther);

// date_default_timezone_set('PRC');
// $time = strtotime(date("Y-m-d", time()));

// echo date('Y-m-d H:i:s', $time);
// $toTime = strtotime(date('Y-m-d H:i:s', $time));
// echo '-';

date_default_timezone_set('PRC');
$time   = strtotime(date("Y-m-d"));

var_dump( $time);

$toTime = strtotime(date('Y-m-d H:i:s', $time));
//echo $toTime;

// WX1706130002556
// 2201400076831810
$times = date('Y-m-d H:i:s');

echo $times;

echo "\n";

$a = strtotime('20170317104308');

$b = date('Y-m-d H:i:s', $a);
echo $a . "\n";
echo $b. "\n";
echo '----------------'."\n";
echo strtotime("3 seconds");
//echo $c. "\n";

echo realpath('C:\xampp\htdocs\ty\longlink/upload/')."\n";

$e = ['a' => '1111', 'c' => '993jdlfsjdlf'];

echo http_build_query($e, '', '; ')."\n";


print_r(list($usec, $sec) = explode(" ", microtime()));
print_r( (float) $sec . intval( (float)$usec * 10000 ));

echo "\n";

$g = intval(true);
echo $g;
if (isset($g)) {
    echo 'ppp';
} else {
    echo 'wooot';
}

echo "\n";


echo 'Single digit odd numbers from range():  ';
//foreach (range(1, 9, 2) as $number) {
//    echo "$number ";
//}

print_r(range(1, 9, 2));


function rangex($start, $limit, $step = 1) {
    $item = [];
    if ($start < $limit) {
        if ($step <= 0) {
            throw new LogicException('Step must be +ve');
        }

        for ($i = $start; $i <= $limit; $i += $step) {
            $item[] = $i;
        }
    }
    return $item;
}

function xrange($start, $limit, $step = 1) {
//    $item = [];
    if ($start < $limit) {
        if ($step <= 0) {
            throw new LogicException('Step must be +ve');
        }

        for ($i = $start; $i <= $limit; $i += $step) {
            yield $i;
        }
    }else {
        if ($step >= 0) {
            throw new LogicException('Step must be -ve');
        }

        for ($i = $start; $i >= $limit; $i += $step) {
            yield $i;
        }
    }


//    return $item;
}

print_r(rangex(1, 9, 2));
//print_r(xrange(1, 9, 2));
echo "\n";

echo 'Single digit odd numbers from xrange(): ';
foreach (xrange(1, 9, 2) as $number) {
    echo "$number ";
}



echo "\n";

echo strtotime("now"), "\n";