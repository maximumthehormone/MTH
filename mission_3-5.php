<?php
$pass3 = "z";
if(!empty($_POST["edit"])){
    if($_POST["editpass"] == $pass3) { 
        $filename = "mission_3-5.txt";
        $array = file ($filename);
        foreach ($array as $value) {
            $word = explode("<>" , $value) ;
            if($word[0] == $_POST["edit"]){
                $data1 = $word[1] ;
                $data2 = $word[2] ;
            }
        }
    }else {
         echo "パスワードが違います";
     }
} 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<form action="mission_3-5.php" method="post">
【投稿フォーム】<br>
名前   : 
　　　　　<input type="text" name="name" value="<?php if(!empty($data1)) { echo $data1 ;} ?>"><br>
コメント  :
　　　<input type="text" name="comment" value="<?php if(!empty($data2)) { echo $data2 ;} ?>"><br>
パスワード :
　　<input type="text" name="namepass">
<input type="submit" value="送信">
<input type="hidden" name="judge" value="<?php if(!empty($_POST["edit"])) { echo $_POST["edit"] ; }?>" >
</form><br>
<form action="mission_3-5.php" method="post">
【削除フォーム】<br>
削除対象番号 :
　<input type="text" name="delete" ><br>
パスワード :
　　<input type="text" name="deletepass">
<input type="submit" value="削除"><br>
</form><br>
<form action="mission_3-5.php" method="post">
【編集フォーム】<br>
編集対象番号 :
　<input type="text" name="edit"><br>
パスワード :
　　<input type="text" name="editpass">
<input type="submit" value="編集"><br><br>
</body>
</html>
<?php
$pass1 = "x";
if(!empty($_POST["name"]) && !empty($_POST["comment"])){
    if($_POST["namepass"] == $pass1) { 
        if(empty($_POST["judge"])) {
            $now = date('Y/m/d H:i:s');
            $filename = "mission_3-5.txt";
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
            $filename = "mission_3-5.txt";
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
    }else {
         echo "パスワードが違います";
     }
}
if(!empty($_POST["name"]) && empty($_POST["comment"])) {
    echo "コメントが入力されていません";
}
if(empty($_POST["name"]) && !empty($_POST["comment"])) {
    echo "名前が入力されていません";
}   
$pass2 = "y";
if(!empty($_POST["delete"])){
    if($_POST["deletepass"] == $pass2) {
        $filename = "mission_3-5.txt";
        $array = file ($filename);
        $fp = fopen($filename, "a");
        ftruncate($fp, 0);
        fseek($fp, 0);
        foreach ($array as $value) {
            $word  =  explode("<>" , $value) ;
            if($word[0] == $_POST["delete"]){
                 continue ;
            }
            foreach ($word as $w){
               echo $w . " "  ;
            }
            fwrite( $fp ,$value ) ;
            echo "<br>" ;
         }
         fclose( $fp ) ;
    }else {
         echo "パスワードが違います";
     }
}
?>
