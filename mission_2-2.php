<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<form action="mission_2-2.php" method="post">
<input type="text" name="comment" value="コメント"><br><br>
<input type="submit" value="送信"><br>
</body>
</html>
<?php
//$hensu = $_POST["comment"];
if (!isset($_POST["comment"])) {
  echo "入力されていません。" ;
} else {
  if ($_POST["comment"] == "完成！") {
    echo "よく頑張った！";
  } else {
    echo $_POST["comment"] . "を受け付けました" ;
  }
  $filename = "mission_2-2.txt";
 file_put_contents($filename, $_POST["comment"] . "を受け付けました。");
 //$fp = fopen($filename, "w");
 //fwrite( $fp ,$_POST["comment"] . "を受け付けました。" );
  //fclose( $fp );
}
?>
