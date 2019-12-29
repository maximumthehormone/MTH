<?php
if(!empty($_POST["edit"])){
    $filename = "mission_3-4.txt";
    $array = file ($filename);
    foreach ($array as $value) {
        $word = explode("<>" , $value) ;
        if($word[0] == $_POST["edit"]){
            $data1 = $word[1] ;
            $data2 = $word[2] ;
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
<form action="mission_3-4.php" method="post">
名前 : 
<input type="text" name="name" value="<?php if(!empty($data1)) { echo $data1 ;} ?>"><br>
コメント :
<input type="text" name="comment" value="<?php if(!empty($data2)) { echo $data2 ;} ?>">
<input type="submit" value="送信">
<input type="hidden" name="judge" value="<?php if(!empty($_POST["edit"])) { echo $_POST["edit"] ; }?>" >
</form><br>
<form action="mission_3-4.php" method="post">
削除対象番号：
<input type="text" name="number" >
<input type="submit" value="削除"><br><br>
</form><br>
<form action="mission_3-4.php" method="post">
編集対象番号 :
<input type="text" name="edit">
<input type="submit" value="編集"><br><br>
</body>
</html>
<?php
if(!empty($_POST["name"]) && !empty($_POST["comment"])){
    if(empty($_POST["judge"])) {
        $now = date('Y/m/d H:i:s');
        $filename = "mission_3-4.txt";
        $fp = fopen($filename,"a");
        if(count(file($filename)) == 0 ) {
            $count = 1;
        } else {
            $lines = file($filename);
            $tango = explode("<>", end($lines));
            $count = $tango[0];
            $count = $count + 1;
          }
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
    }else {
        $now = date('Y/m/d H:i:s');
        $filename = "mission_3-4.txt";
        $array = file($filename);
        $fp = fopen($filename, "w");
        ftruncate($fp, 0);
        fseek($fp, 0);
        foreach ($array as $value) {
            $word = explode("<>" , $value);
            if($word[0] == $_POST["judge"]) {
                  fwrite( $fp ,$word[0] . "<>". $_POST["name"] . "<>" .  $_POST["comment"] . "<>" . $now . "\n" ) ;
                  echo $word[0] . " ". $_POST["name"] . " " .  $_POST["comment"] . " " . $now . "<br>";
            } else {
                foreach ($word as $w){
                   echo $w . " "  ;
                }
                fwrite($fp ,$value);
                echo "<br>";
            }
         }
         fclose($fp);
    }
}   
if(!empty($_POST["number"])){
    $filename = "mission_3-4.txt";
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
        fwrite( $fp ,$value ) ;
        echo "<br>" ;
     }
     fclose( $fp ) ;
}
?>
