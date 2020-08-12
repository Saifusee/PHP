<?php
$db["server"] = "localhost";
$db["username"] = "root";
$db["password"] = "";
$db["database"] = "cms";
forEach($db as $key => $value){
    define(strtoupper($key), $value);
}    
$connection = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
//we can do all this work simply, just learning some new features to try this.
?> 