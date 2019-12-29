<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<form action="mission_3-2.php" method="post">
名前 : 
<input type="text" name="name"><br>
コメント :
<input type="text" name="comment" ><br><br>
<input type="submit" value="送信する"><br><br>
</body>
</html>
<?php
if(!empty($_POST["name"]) && !empty($_POST["comment"])){
   
    $now = date('Y/m/d H:i:s');
    $filename = "mission_3-2.txt";
    $fp = fopen($filename,"a");
    $count = count( file( $filename ) );
    $count = $count + 1;
    fwrite( $fp ,$count . "<>". $_POST["name"] . "<>" .  $_POST["comment"] . "<>" . $now . "\n" ) ;
    fclose( $fp );
    $array = file ($filename);
    foreach ($array as $value) {
        $word  =  explode("<>" , $value) ;
        foreach ($word as $w){
           echo $w . " "  ;
        }
        echo "<br>";
    }
}   
?>