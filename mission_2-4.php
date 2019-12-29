<?php
$filename = "mission_2-3.txt";
//$fp = fopen($filename, "r");
//$array[0] = fgets($fp);
//$array[1] = fgets($fp);
//$array[2] = fgets($fp);
//echo $array[0] . "<br>";
//echo $array[1] . "<br>";
//echo $array[2] . "<br>";
//fclose($fp);
if(is_file($filename)){
    $array = file( $filename, FILE_IGNORE_NEW_LINES);
    foreach($array as $value){
        echo $value . "<br>";
    }
 }else{ 
     echo "指定されたファイルがありません。";
}
?>
