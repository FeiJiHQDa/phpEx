<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2018/1/4
 * Time: 15:14
 */

class TestStatic {

//public static $_instances = null;

    private $string = '';
    public function __construct($string) {
        $this->string = $string;
    }

    public static function  install($string) {
        static $_instances = null;
        if (isset($_instances)) {
            print_r($_instances);
            return $_instances;
        }
        return $_instances  = new self($string);
    }

    public function getIns () {
        return 0;
    }

    public function setString($string) {
        $this->string = $string;
        return $this;
    }
}
//
$sx = TestStatic::install('kx');
//
print_r($sx->getIns());
//print_r($sx->setString('okx'));
//print_r($sx->install('yyy'));


class useStatic {


    public function clint($string) {
        static $_instances = null;
        if (isset($_instances)) {
            return $_instances;
        }
        return $_instances = new TestStatic($string);
    }

    public function use () {

        $x = $this->clint('ok');

        print_r($x);
    }

    public function usex () {

        $x = $this->clint('xxx');
        $x->setString('yow');

        print_r($x);
    }
}
//
//$st = new useStatic();
//$st->use();
//$st->usex();