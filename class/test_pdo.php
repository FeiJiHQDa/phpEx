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
//$ox = $DB->getOne("SELECT num FROM test_prepare WHERE id = ?", [2]);

//$up = $DB->update('update test_prepare set num = ? WHERE id = ?', [44, 1]);
//$up = $DB->affected_rows('update test_prepare set num = 45 WHERE id = 1');
//var_dump($ox);
$ins = $DB->insert('test_prepare', ['num' => 999]);


//$ins = $DB->query("insert into test_prepare (num) values ('?')", [3]);
// [['num' => 1, 'version' => '399'], ['num' => 333, 'version' => '1.23']]
// [['num' => 1], ['num' => 333]]

var_dump($ins);
