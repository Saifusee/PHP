<?php

function blogcontent($a) {
    $cont = [];
    while($result = mysqli_fetch_assoc($a)){
         $cont[] = $result;   
   }
 return $cont;  
}



function confirmQuery($a){
    global $connection;
    if(!$a){
        die("Query failed Man." . mysqli_error($connection));
    }
}
?>