<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/6/15
 * Time: 22:37
 */
require ('DB.php');

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=test','root','');
//$str = $pdo->prepare("SELECT * FROM test_prepare");


//var_dump($str->execute([]));

//var_dump($str->fetchAll(PDO::FETCH_ASSOC));

$DB = DB::setInstall('mysql:host=localhost;port=3306;dbname=test','root','');
//$ox = $DB->getAll("SELECT * FROM test_prepare ");
$ox = $DB->getOne("SELECT num FROM test_prepare WHERE id = ?", [2]);

var_dump($ox);
