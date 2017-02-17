<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2016/7/26
 * Time: 16:30
 */

$utf = 'dfesef的地方捏脸';

$gbk = iconv('utf-8','gbk', $utf);

echo $gbk;