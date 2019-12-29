<?php
//sqlで接続とテーブル作成
$dsn = 'mysql:dbname=データベース名;host=localhost';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
$sql = "CREATE TABLE IF NOT EXISTS tbtest"
." ("
. "id INT AUTO_INCREMENT PRIMARY KEY,"
. "name char(32),"
. "comment TEXT"
.");";
//投稿・削除・編集の共通パスワード設定
$pass = "z";
$sen = "";
//編集処理
if(!empty($_POST["edit"])){
    if($_POST["editpass"] == $pass) { 
	$id = $_POST["edit"]; 
        $sql = "SELECT * FROM tbtest where id=$id";
        $stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
		 $edit_id = $row['id'].',';
		 $edit_name = $row['name'];
		 $edit_comment = $row['comment'];
	}
    }else {
         $sen = "パスワードが違います。<br>";
     }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<form action="mission_5-1.php" method="post">
【投稿フォーム】<br>
名前：
　　　　　<input type="text" name="name"  value="<?php if(isset($edit_name)) { echo $edit_name ;} ?>"><br>
コメント：
　　　<input type="text" name="comment" value="<?php if(isset($edit_comment)) { echo $edit_comment;} ?>"><br>
パスワード：
　　<input type="text" name="namepass">
<input type="submit" value="送信">
<input type="hidden" name="judge" value="<?php if(!empty($_POST["edit"])) { echo $_POST["edit"] ; }?>" > 
</form><br>
<form action="mission_5-1.php" method="post">
【削除フォーム】<br>
削除対象番号：
　<input type="text" name="delete" ><br>
パスワード：
　　<input type="text" name="deletepass">
<input type="submit" value="削除"><br>
</form><br>
<form action="mission_5-1.php" method="post">
【編集フォーム】<br>
編集対象番号：
　<input type="text" name="edit"><br>
パスワード：
　　<input type="text" name="editpass">
<input type="submit" value="編集"><br><br>
</body>
</html>
<?php
//投稿処理
if(!empty($_POST["name"]) && !empty($_POST["comment"])){
    if($_POST["namepass"] == $pass) { 
        if(empty($_POST["judge"])){  //新規投稿
              $stmt = $pdo->query($sql);
	      $sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
	      $sql -> bindParam(':name', $name, PDO::PARAM_STR);
	      $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
 	      $name = $_POST["name"];
	      $comment = $_POST["comment"]; 
	      $sql -> execute();
         }else {  //編集投稿
              $id = $_POST["judge"]; 
              $name = $_POST["name"];
              $comment = $_POST["comment"];
              $sql = 'update tbtest set name=:name,comment=:comment where id=:id';
	      $stmt = $pdo->prepare($sql);
	      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
	      $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
	      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	      $stmt->execute();
           }
    }else {
        $sen = "パスワードが違います。<br>" ;
     }
}
//削除処理
if(!empty($_POST["delete"])){
    if($_POST["deletepass"] == $pass) {
        $id = $_POST["delete"];
	$sql = 'delete from tbtest where id=:id';
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
    }else {
        $sen = "パスワードが違います。<br>";
     }
}
if($sen != "") {
    echo "!-----------------------------!<br>";
    echo $sen;
    echo "!-----------------------------!<br>";
}
echo "------------------------------------------------<br>";
echo "【投稿一覧】<br><br>";
//フォームの下記に表示
$sql = 'SELECT * FROM tbtest';
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
		echo $row['id'].',';
		echo $row['name'].',';
		echo $row['comment'].'<br>';
	echo "<hr>";
	}
?>
