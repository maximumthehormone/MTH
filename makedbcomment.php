<?php
$dsn = 'mysql:dbname=;host=localhost';
$user = '';
$password = '';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
$sql = "CREATE TABLE IF NOT EXISTS Comment"
." ("
. "id INT AUTO_INCREMENT PRIMARY KEY,"
. "comment varchar(200)"
.");";
$stmt = $pdo->query($sql);
?>