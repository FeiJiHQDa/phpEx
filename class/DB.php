<?php

/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/6/15
 * Time: 14:27
 */
class DB
{
    private        $con = null;
    private static $ins = null;

    public function __construct($a, $b, $c)
    {
//        $this->connect('mysql:host=localhost;port=3306;dbname=test', 'root', '');
        $this->connect($a, $b, $c);
        $this->con->query('set names utf8');
    }

    // 单例模式
    public static function setInstall($a, $b, $c)
    {

        if (!(self::$ins instanceof self)) {
            return self::$ins = new self($a, $b, $c);
        }
        return self::$ins;
    }

    public function connect($a, $b, $c)
    {
        $this->con = new PDO($a, $b, $c);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    //设置属性，设置错误：报告抛出Exceptions异常
    }

    /*
     * 执行sql
     */
    public function query($sql, $arr = [])
    {
        $res = $this->con->prepare($sql);
        if (is_array($arr)) {
            $res->execute($arr);
            return $res;
        }
        return null;
    }

    //开启事务
    public function begin(){
        return $this -> conn -> beginTransaction();
    }

    //回滚事务
    public function rollback(){
        return $this -> conn -> rollBack();
    }

    //事务确认
    public function commit(){
        return $this -> conn -> commit();
    }

    // 返回一个包含结果集中所有行的数组
    public function getAll($sql, $arr=[]) {
        $rs = $this->query($sql, $arr);
        if ($rs) {
            return $rs->fetchAll(PDO::FETCH_ASSOC);
        }
        return null;
    }

    public function getRow($sql, $arr=[]) {
        $rs = $this->query($sql, $arr);
        if ($rs) {
            return $rs->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }

    public function getOne($sql, $arr=[]) {
        $rs = $this->query($sql, $arr);
        if ($rs) {
            return $rs->fetchColumn();
        }
        return null;
    }


}