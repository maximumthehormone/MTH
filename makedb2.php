<?php
//sqlで接続とテーブル作成
$dsn = 'mysql:dbname=;host=localhost';
$user = '';
$password = '';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
$sql = "CREATE TABLE IF NOT EXISTS user2"
." ("
. "id INT(5) AUTO_INCREMENT PRIMARY KEY,"
. "name varchar(20),"
. "mail varchar(35),"
. "password varchar(100) "
.");";
$stmt = $pdo->query($sql);
//id （int（5）） ... primary key設定、AUTO_INCREMENT（idの被りを無くすため）
//name （varchar（20））
//password （varchar（100）） ... ハッシュ化するから少し大きめ
?>