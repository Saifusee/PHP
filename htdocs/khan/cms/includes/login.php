<?php include "connection_sql.php" ?>
<?php include "function.php" ?>
<?php session_start();  ?>

<?php

define('URL', 'http://localhost/khan/cms/admin/');
define('ROOT', '/opt/lampp/htdocs/khan/cms/admin/');

define('URL_1', 'http://localhost/khan/cms/');
define('ROOT_1', '/opt/lampp/htdocs/khan/cms/');

?>

<?php
   
   if(isset($_POST['login'])){
       $username = $_POST['username'];
       $password = $_POST['password'];
       
       $username = mysqli_real_escape_string($connection, $username);
       $password = mysqli_real_escape_string($connection, $password);
       $password = md5($password);

   $query = "SELECT * FROM users WHERE username = '{$username}' ";
   $loginQueryUsername = mysqli_query($connection,$query);
   confirmQuery($loginQueryUsername);

   while($row = mysqli_fetch_assoc($loginQueryUsername)){
      $login_user_id = $row['user_id'];
      $login_user_username = $row['username'];
      $login_user_firstname = $row['user_firstname'];
      $login_user_lastname = $row['user_lastname'];
      $login_user_email = $row['user_email'];
      $login_user_password = $row['user_password'];
      $login_user_role = $row['user_role'];


      
    if ($username === $login_user_username && $password === $login_user_password) {

          $_SESSION['username'] = $login_user_username;
          $_SESSION['user_firstname'] = $login_user_firstname;
          $_SESSION['user_lastname'] = $login_user_lastname;
          $_SESSION['user_email'] = $login_user_email;
          $_SESSION['user_role'] = $login_user_role;
          $_SESSION['user_id'] = $login_user_id;
         
          
          header("Location: " . URL . "");
      } else{
            header("Location: " . URL_1 . "home");
      }

    }
 }
?>