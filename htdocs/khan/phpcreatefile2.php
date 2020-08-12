<?php
$file = "phpcreatefile.php";
if($permission = fopen($file, "r")){
    fwrite($permission, "I am here.");
   echo fread($permission, 100);

} else {
    fclose($permission);

}
?>