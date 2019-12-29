<?php
session_start();
// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
    header("Location: logout.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<form action="list.php" method="post">
<p>ようこそ<u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さん</p><br>
<strong>【投稿一覧】</strong>　　　　
<input type="submit" name="main" value="メイン画面へ">
<input type="submit" name="toukouhe" value="投稿欄へ">
<input type="submit" name="logout" value="ログアウト"><br><br>
------------------------------------------- <br><br>
　投稿者　投稿内容<br><br>
</form>
</body>
</html>
<?php
if(isset($_POST["main"])){
    header("Location: main.php");  
    exit(); 
}
if(isset($_POST["toukouhe"])){
    header("Location: toukouform.php");  
    exit(); 
}
if(isset($_POST["logout"])){
    header("Location: logout.php");  
    exit(); 
}
//sqlで接続とテーブル作成
$dsn = 'mysql:dbname=;host=localhost';
$user = '';
$password = '';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
//session_start();
echo "<html>";
echo "<body>";
echo "<form action=\"comment.php\" method=\"post\">";
//フォームの下記に表示
$sql = 'SELECT * FROM toukou5';
$stmt = $pdo->query($sql);
$results = $stmt->fetchAll();
foreach ($results as $row){ 
    if(empty($row['comment'])){
        $string =  $row['name'].",".$row['topic'];
        $string2 = $row['name'] ."　" .$row['topic'] ;
        //$str = urlencode($string);
        //echo "<a href=\"comment.php?$str\">" . $string . "</a>";
        //echo "<hr>";
        echo "<input type=\"radio\" name=\"itiran\" value=\"$string\"> $string2<br><br>";
     }
}
echo "<input type=\"submit\" value=\"コメント欄へ\"><br><br>";
echo "</body>";
echo "</html>";
?>