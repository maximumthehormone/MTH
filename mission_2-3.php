<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<form action="mission_2-3.php" method="post">
<input type="text" name="comment" value="コメント"><br><br>
<input type="submit" value="送信"><br>
</body>
</html>
<?php
//$hensu = $_POST["comment"];
if (empty($_POST["comment"] )) {
  echo "入力されていません。" ;
} else {
  $hensu = $_POST["comment"];
  if ($_POST["comment"] == "完成！") {
    echo "よく頑張った！";
  } else {
    echo $_POST["comment"] . "を受け付けました" ;
  }
  $filename = "mission_2-3.txt";
 //file_put_contents($filename, $_POST["comment"] . "を受け付けました。");
 $fp = fopen($filename, "a");
 fwrite( $fp ,$_POST["comment"] . "を受け付けました。". "\n" ); 
 fclose( $fp );
}
?>
