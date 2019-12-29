<?php
$dsn = 'mysql:dbname=データベース名;host=localhost';
$user = 'ユーザーネーム';
$password = 'パスワード';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
?>	