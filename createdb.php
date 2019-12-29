<?php
//sqlで接続とテーブル作成
$dsn = 'mysql:dbname=;host=localhost';
$user = '';
$password = '';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
$sql = "CREATE TABLE IF NOT EXISTS media"
." ("
."id INT NOT NULL AUTO_INCREMENT PRIMARY KEY," 
. "fname TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL," 
. "extension TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL," 
. "raw_data LONGBLOB NOT NULL "
.");";
$stmt = $pdo->query($sql);
?>