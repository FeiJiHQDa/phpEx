<?php

/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/6/15
 * Time: 14:27
 */
class DB
{
    private        $conn = null;
    private static $ins = null;

    public function __construct($a, $b, $c)
    {
//        $this->connect('mysql:host=localhost;port=3306;dbname=test', 'root', '');
        $this->connect($a, $b, $c);
        $this->conn->query('set names utf8');
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
        $this->conn = new PDO($a, $b, $c);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    //设置属性，设置错误：报告抛出Exceptions异常
    }

    /*
     * 执行sql
     */
    public function query($sql, $arr = [])
    {
        $res = $this->conn->prepare($sql);
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

    // 更新


    //返回受影响的行数
    public function affected_rows($sql){
        return $this -> conn -> exec($sql);
    }

    //返回最新的auto_increment列的自增长的值
    public function insert_id(){
        return $this -> conn -> lastInsertId();
    }

    // 支持 [id=>1, num=>2...] && [[num => 3, id => 2], [id=>4, num=>288]]   判断维度 http://blog.csdn.net/lhn_hpu/article/details/52539236
    public function insert($table, $arr) {

        $func = function($value) {
            return '?';
        };

        // 判断 一维数组
        if (count($arr) == count($arr, 1)) {

            $array_keys = array_keys($arr);

            $keySQL = implode(',', $array_keys);
            $valSQL = implode("','",array_map($func, array_values($arr)) );

        } else {
            $keySQL = implode(',',array_keys($arr));
            $valSQL = implode("','",array_values($arr));
        }


        $sql = 'insert into ' . $table . ' (' . $keySQL. ')';
        $sql .= ' values (\'';
        $sql .= $valSQL;
        $sql .= '\')';

//        print_r($sql);
//        print_r(array_values($arr));
//        exit();

        $this->query($sql, array_values($arr));
        return '1';
    }

    public function update($sql, $arr) {
        $this->query($sql, $arr);
        return $this->insert_id();
    }

    public function insertGetId($table, $arr) {

    }


    // 将 insert value 转换 ？
    private function valueQ($n) {
        return '?';
    }
}