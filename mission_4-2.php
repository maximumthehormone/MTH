<?php
$dsn = 'mysql:dbname=�f�[�^�x�[�X��;host=localhost';
$user = '���[�U�[��';
$password = '�p�X���[�h';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
$sql = "CREATE TABLE IF NOT EXISTS tbtest"
." ("
. "id INT AUTO_INCREMENT PRIMARY KEY,"
. "name char(32),"
. "comment TEXT"
.");";
$stmt = $pdo->query($sql);
?>	