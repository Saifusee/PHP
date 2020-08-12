<!-- //Getting user details to show on the form for the selected the user -->
<?php

if(isset($_GET['u_id'])){
    
    $the_user_id = $_GET['u_id'];

    }


    $query = "SELECT * FROM `users` WHERE `user_id` = $the_user_id  ";
    $select_user_by_id = mysqli_query($connection,$query);  
    confirmQuery($select_user_by_id);

    while($row = mysqli_fetch_assoc($select_user_by_id)) {
    $user_id            = $row['user_id'];
    $user_firstname          = $row['user_firstname'];
    $user_lastname         = $row['user_lastname'];
    $user_email   = $row['user_email'];
    $username        = $row['username'];
    $user_password         = $row['user_password'];
    $user_role       = $row['user_role'];
    }

?>



<!-- //Getting user details to Update on the database for the selected the user -->
<?php

if(isset($_POST['update_user'])) {
   
   $user_firstname        = escape($_POST['user_firstname']);
   $user_lastname         =  escape($_POST['user_lastname']);
   $username            =    escape($_POST['username']);
   $user_email       =  escape($_POST['user_email']);

//    $post_image        =  $_FILES['image']['name'];
//    $post_image_temp   =  $_FILES['image']['tmp_name'];


   $user_password         =  escape($_POST['user_password']);
   $user_role      =  escape($_POST['user_role']); 

   $query = "UPDATE users SET ";
   $query .= "user_firstname = '{$user_firstname}', ";
   $query .= "user_lastname = '{$user_lastname}', ";
   $query .= "username = '{$username}', ";
   $query .= "user_email = '{$user_email}', ";
   if(!empty($user_password)){
       $user_password = mysqli_real_escape_string($connection,$user_password);
       
       $user_password = md5($user_password);//MD5 password Encryption
       $query .= "user_password = '{$user_password}', ";
   }
   $query .= "user_role = '{$user_role}' ";
   $query .= "WHERE user_id = {$the_user_id} ";
   $update_user_by_id = mysqli_query($connection,$query);
    confirmQuery($update_user_by_id);
    header("Location: " . URL .  "users.php");
}

?>
   
   
   
    <form action="" method="post" enctype="multipart/form-data">    

      <div class="form-group">
         <label for="user_firstname">Firstname</label>
          <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
      </div>


      <div class="form-group">
         <label for="user_lastname">Lastname</label>
          <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
      </div>

        
    <div class="form-group">
        <label for="user_role">User Role:</label>
            <select name="user_role" id="">
                    <option value="<?php echo $user_role; ?>"><?php 
                    if ($user_role == ''){
                        echo "Select Options";
                    } else {
                    echo $user_role; }?></option>

                    <?php
                    if($user_role == ''){
                        echo "<option value='Admin'>Admin</option>";
                        echo "<option value='Subscriber'>Subscriber</option>";
                    } else if($user_role == "Admin") {
                        echo "<option value='Subscriber'>Subscriber</option>";
                    } else {
                        echo "<option value='Admin'>Admin</option>";

                    }
                    ?>
            </select>
    </div>



      <div class="form-group">
         <label for="user_email">E-mail</label>
          <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
      </div>


      <div class="form-group">
         <label for="username">Username</label>
          <input type="text" value="<?php echo $username; ?>"class="form-control" name="username">
      </div>


      <div class="form-group">
         <label for="user_password">Password</label>
          <input type="password" placeholder="Current Password or Update New Password" class="form-control" name="user_password">
      </div>

      <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Update User" name="update_user">
      </div>
      
      </form>
    