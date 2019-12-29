<?php
//sqlで接続とテーブル作成
$dsn = 'mysql:dbname=;host=localhost';
$user = '';
$password = '';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
$sql = "SELECT * FROM toukou4 ";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
            echo $row['id'].',';
            echo $row['name'].',';
            echo $row['topic'].',';
            echo $row['commentname'].',';
            echo $row['comment'].'<br>';
	    echo "<hr>";
        }
?>