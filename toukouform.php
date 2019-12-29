<?php
//sqlで接続とテーブル作成
$dsn = 'mysql:dbname=;host=localhost';
$user = '';
$password = '';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
$sql = "CREATE TABLE IF NOT EXISTS toukou5"
." ("
. "id INT AUTO_INCREMENT PRIMARY KEY,"
. "name varchar(20),"
. "topic varchar(200),"
. "commentname varchar(20),"
. "comment varchar(200)"
.");";

?>
<?php
session_start();
echo "ようこそ　" . $_SESSION["NAME"] . "　さん";
echo "<br><br>";
$name2 = $_SESSION["NAME"];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<form action="toukouform.php" method="post">
【投稿欄】<br>
<input type="text" name="comment" value="話題を書いてください。" ><br><br>
<input type="submit" value="送信"><br><br>
<input type="submit" name="main" value="メイン画面へ">
<input type="submit" name="logout" value="ログアウト"><br><br>
</form><br>
</body>
</html>
<?php
//投稿処理
if(!empty($_POST["comment"])){
          $sen2 = $_POST["comment"];          
    echo "<html>";
    echo "<body>";
    echo "------------この内容で送信してよいですか？-----------------<br><br>";
    echo "<form action=\"toukouform.php\" method=\"post\">";
    echo "<input type=\"text\" name=\"comment2\" value=\"$sen2\"><br><br>";
    echo "<input type=\"submit\" value=\"この内容で送信\"><br><br>";
    echo "</body>";
    echo "</html>";
}

if(!empty($_POST["comment2"])){
          $stmt = $pdo->query($sql);
	  $sql = $pdo -> prepare("INSERT INTO toukou5 (name, topic, commentname) VALUES (:name, :topic, :commentname)");
	  $sql -> bindParam(':name', $name, PDO::PARAM_STR);
          $sql -> bindParam(':topic', $comment, PDO::PARAM_STR);
          $sql -> bindParam(':commentname', $name, PDO::PARAM_STR);
 	  $name = $name2;
	  $comment = $_POST["comment2"]; 
	  $sql -> execute();
          header("Location: list.php");  
          exit(); 
}  
if(isset($_POST["main"])){
    header("Location: main.php");  
    exit(); 
} 
if(isset($_POST["logout"])){
    header("Location: logout.php");  
    exit(); 
}
?>
