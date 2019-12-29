<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<form action="mission_2-1.php" method="post">
<input type="text" name="comment" value="コメント"><br>
<input type="submit" value="送信"><br>
</body>
</html>
<?php
$hensu = $_POST["comment"];
echo $hensu . "を受け付けました" ;
?>