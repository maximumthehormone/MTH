<?php
session_start();
//sqlで接続
$dsn = 'mysql:dbname=データベース名;host=localhost';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
/*if(empty($_POST["comment"])){
    $intArray = explode(",",urldecode($_SERVER['QUERY_STRING']));
    echo $intArray[1] . "," . $intArray[2] ."<br>";
}
$check = $intArray[1];
$judge =  $intArray[2];*/
if(isset($_POST["itiran"])){
$_SESSION["ITIRAN"] = $_POST["itiran"];
//echo $_SESSION["ITIRAN"];
$v = explode(",", $_SESSION["ITIRAN"]);
$_SESSION["CHECK"] = $v[0];
$_SESSION["JUDGE"] = $v[1];
//echo "投稿者:" .$v[0] ."　投稿内容:" .$v[1];
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<form action="comment.php" method="post">
【コメント欄】<br>
<input type="text" name="comment"><br><br>
<input type="submit" value="送信"><br><br>
</body>
</html>
<?php
if(empty($_POST["comment"])){ 
    echo "投稿者:" .$_SESSION["CHECK"] ."　投稿内容:" .$_SESSION["JUDGE"] ."<br><br>";
    echo "-------【コメント一覧】---------  <br>";
    echo "<投稿者>　　　　<コメント>　　　　<br><br>";
    $check2 = $_SESSION["CHECK"];
    $judge2 = $_SESSION["JUDGE"];
    $sql = "SELECT * FROM toukou5 ";
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll();
    foreach ($results as $row){
        if($row['name'] == $check2 && $row['topic'] == $judge2 && !empty($row['comment'])){
            echo $row['commentname'];
            echo "　　　" .$row['comment'].'<br>';
	    echo "<hr>";
         }
    }
}
if(!empty($_POST["comment"])){ 
    //echo $_SESSION["ITIRAN"] . "<br><br>";
    echo "投稿者:" .$_SESSION["CHECK"] ."　投稿内容:" .$_SESSION["JUDGE"] ."<br><br>";
    echo "-------【コメント一覧】---------  <br>";
    echo "<投稿者>　　　　<コメント>　　　　<br><br>";
    $check2 = $_SESSION["CHECK"];
    $judge2 = $_SESSION["JUDGE"];
    $sql = $pdo -> prepare("INSERT INTO toukou5 (name, topic, commentname, comment) VALUES (:name, :topic, :commentname, :comment)");
    $sql -> bindParam(':name', $name, PDO::PARAM_STR);
    $sql -> bindParam(':topic', $topic, PDO::PARAM_STR);
    $sql -> bindParam(':commentname', $commentname, PDO::PARAM_STR);
    $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
    $name = $check2;
    $topic = $judge2;
    $commentname = $_SESSION["NAME"];
    $comment = $_POST["comment"]; 
    $sql -> execute();
    $sql = "SELECT * FROM toukou5 ";
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
            if($row['name'] == $check2 && $row['topic'] == $judge2 && !empty($row['comment'])){
		//echo $row['id'].',';
               // echo $row['name']. ",". $check2. ",". $row['topic']. ",".$judge2. "<br>";
               	echo $row['commentname'];
		echo "　　　" .$row['comment'].'<br>';
	        echo "<hr>";
            }
	}
  
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<form action="comment.php" method="post">
<input type="submit" name="toukouhe" value="投稿一覧へ">
<input type="submit" name="gazouhe" value="画像一覧へ">
<input type="submit" name="logout" value="ログアウト">
</body>
</html>
<?php
if(isset($_POST["toukouhe"])){
    header("Location: list.php");  
    exit(); 
}
if(isset($_POST["gazouhe"])){
    header("Location: newindex.php");  
    exit(); 
}
if(isset($_POST["logout"])){
    header("Location: logout.php");  
    exit(); 
}
?>