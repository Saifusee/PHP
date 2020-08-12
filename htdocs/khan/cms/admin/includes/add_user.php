<?php

if(isset($_POST['create_user'])) {
   
   $user_firstname        = escape($_POST['user_firstname']);
   $user_lastname         =  escape($_POST['user_lastname']);
   $user_email       =  escape($_POST['user_email']);


   $username            =    escape($_POST['username']);
   $username = mysqli_real_escape_string($connection,$username);

//    $post_image        =  $_FILES['image']['name'];
//    $post_image_temp   =  $_FILES['image']['tmp_name'];

   $user_password         =  escape($_POST['user_password']);
   $user_password = mysqli_real_escape_string($connection,$user_password);
  $user_password = md5($user_password);//MD5 password Encryption
   $user_role      =  escape($_POST['user_role']); 
   $user_date = date("Y-m-d H-i-s"); 


//    move_uploaded_file($post_image_temp, "../images/$post_image");

   $query = "INSERT INTO users(user_firstname, user_lastname, username, user_email, user_password, user_role, user_date) ";
             
   $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$username}','{$user_email}','{$user_password}','{$user_role}', '{$user_date}') "; 
          
   $create_user_query = mysqli_query($connection, $query);  
   confirmQuery($create_user_query);
   echo "<p><h3 class='bg-success' style='text-align: center'>User Created Successfully <a href= " . URL . "users>Click here to see user list</a></h3></p>";

}


?>
   
   
   
    <form action="" method="post" enctype="multipart/form-data">    

      <div class="form-group">
         <label for="user_firstname">Firstname</label>
          <input type="text" class="form-control" name="user_firstname">
      </div>


      <div class="form-group">
         <label for="user_lastname">Lastname</label>
          <input type="text" class="form-control" name="user_lastname">
      </div>

        
    <div class="form-group">
        <label for="user_role">User Role:</label>
            <select name="user_role" id="">
                    <option value="Subscriber">Select Options</option>
                    <option value="Admin">Admin</option>
                    <option value="Subscriber">Subscriber</option>   
            </select>
    </div>



      <div class="form-group">
         <label for="user_email">E-mail</label>
          <input type="email" class="form-control" name="user_email">
      </div>


      <div class="form-group">
         <label for="username">Username</label>
          <input type="text" class="form-control" name="username">
      </div>


      <div class="form-group">
         <label for="user_password">Password</label>
          <input type="password" class="form-control" name="user_password">
      </div>



<!-- 
      <div class="form-group">
         <label for="post-image">Post Image</label>
          <input type="file" name="image">
      </div> -->

     
      

      <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Add User" name="create_user">
      </div>
      
      </form>
    