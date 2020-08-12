<?php 
    $connection = mysqli_connect("localhost", "root", "", "loginapp"); 
    if( !$connection) {
        echo "Connection to SQL Database fail.";
    } else {
        echo "<br> Connection to SQL established <br>";
    }
?>
