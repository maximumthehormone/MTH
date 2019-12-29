<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<form action="mission_3-3.php" method="post">
名前 : 
<input type="text" name="name"><br>
コメント :
<input type="text" name="comment" >
<input type="submit" value="送信"><br><br>
</form><br>
<form action="mission_3-3.php" method="post">
削除対象番号：
<input type="text" name="number" >
<input type="submit" value="削除">
</form>
</body>
</html>
<?php
if(!empty($_POST["name"]) && !empty($_POST["comment"])){
   
    $now = date('Y/m/d H:i:s');
    $filename = "mission_3-3.txt";
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
if(!empty($_POST["number"])){
    $filename = "mission_3-3.txt";
    $array = file ($filename);
    $fp = fopen($filename, "a");
    ftruncate($fp, 0);
    fseek($fp, 0);
    foreach ($array as $value) {
        $word  =  explode("<>" , $value) ;
        if($word[0] == $_POST["number"]){
             continue ;
        }
        foreach ($word as $w){
           echo $w . " "  ;
        }
        fwrite( $fp ,$value  ) ;
        echo "<br>" ;
     }
     fclose( $fp ) ;
}
?>