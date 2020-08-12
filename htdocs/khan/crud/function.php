<?php include "connection_sql.php"?>



<?php

    function create(){
        if(isset($_POST["create"])){
            global $connection;
            $username = $_POST["username"];
            $password = $_POST["password"];
            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);
            $password = md5($password);             
        
            $query = "INSERT INTO users(username,password) ";
            $query .= "VALUES ('$username', '$password')";
            $result = mysqli_query($connection, $query);
            if(!$result) {
                die('Query FAILED' . mysqli_error());
            }    
            echo $query . "statement false";
        }    
    }



    function update(){
        if(isset($_POST["update"])){
            global $connection;
            $username = $_POST["username"];
            $password = $_POST["password"];  
            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);
            $password = md5($password);             
        
            $id = $_POST["id"];             
        $query = "UPDATE users SET ";
        $query .= "username = '$username', ";
        $query .= "password = '$password' ";
        $query .= "WHERE id = $id ";
        $result = mysqli_query($connection, $query);
        echo $query . "statement false";
    }
}



function delete (){
    if(isset($_POST["delete"])){
        global $connection;
        $id = $_POST['id'];
        $query = "DELETE FROM users ";
        $query .= "WHERE id = $id ";
        $result = mysqli_query($connection, $query);
        echo $query . "statement false";
    }
}


function id() {
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Query FAILED' . mysqli_error());
    }
    while($row = mysqli_fetch_assoc($result)) {
       $id = $row['id'];      
    echo "<option value='$id'>$id</option>";
    }  
}


?>