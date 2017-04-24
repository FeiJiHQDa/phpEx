<?php
/**
 * Created by PhpStorm.
 * User: whaichao
 * Date: 2017/4/8
 * Time: 11:37
 */

/*
 * 这种方式局限太大
 */
class MyString {
    private $string;

    public function MyString($str) {
        $this->string = $str;
    }

    function len() {
        return strlen($this->string);
    }

    public function trims() {
        $this->string = trim($this->string);
        return $this;
    }
}

$st = new MyString(' sdfsdf  ');

echo $st->trims()->len();

class Str {
    protected  $string;
    protected  $mother = ['trim', 'strlen'];

    public function __construct($string) {
        $this->string = $string;
    }


    /**
     * 单例模式
     */
    public static function getInstance($string) {

        static $_instances  = [];

        if (isset($_instances[$string])) {
            return $_instances[$string];
        }

        return $_instances[$string] = new self($string);
    }
}