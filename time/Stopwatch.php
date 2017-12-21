<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/12/21
 * Time: 9:58
 */

class Stopwatch {

    private $oldTime = '';

    public function __construct() {
        $this->oldTime = $this->getTime();
    }

    //--------------------- 时间函数 ------------------------
    private function getTime() {
        $time = explode(' ', microtime());
        return $time[1] . substr($time[0], 1);
    }

    public function runTime($l = 3) {
        $dir = $this->getTime() - $this->oldTime;
        return ' ' . number_format($dir, $l);
    }
}