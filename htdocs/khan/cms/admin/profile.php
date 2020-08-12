<?php include "../includes/connection_sql.php" ?>
<?php include "includes/admin_function.php" ?>

<?php  include "includes/admin_header.php" ?>

<?php include "includes/admin_navigation.php" ?>



<!-- //Getting user details to Update on the database for the selected the user -->
<?php

if(isset($_POST['update_profile'])) {
   $user_id = $_POST['user_id'];
   $user_firstname        = escape($_POST['user_firstname']);
   $user_lastname         =  escape($_POST['user_lastname']);
   $username            =    escape($_POST['username']);
   $_SESSION['username'] = escape($username);
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
   $query .= "user_password = '{$user_password}', ";
   $query .= "user_role = '{$user_role}' ";
   $query .= "WHERE user_id = '{$user_id}' ";
   $update_user_by_user_id = mysqli_query($connection,$query);
    confirmQuery($update_user_by_user_id);
    header("Location: " . URL . "profile");
}

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                       <?php echo $_SESSION['username']; ?>
                        </h1>

                            <?php 
                              if(isset($_SESSION['user_id'])){
                                 $user_id = $_SESSION['user_id'];

                                 $query = "SELECT * FROM `users` WHERE `user_id` = '{$user_id}'";
                                 $select_user_by_user_id = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($select_user_by_user_id)) {
                                    $user_id            = $row['user_id'];
                                    $user_firstname          = $row['user_firstname'];
                                    $user_lastname         = $row['user_lastname'];
                                    $user_email   = $row['user_email'];
                                    $username        = $row['username'];
                                    $user_password         = $row['user_password'];
                                    $user_role       = $row['user_role'];
                                    }
                              }
                              
                            ?>



                                <form action="<?php echo URL ?>profile" method="post" enctype="multipart/form-data">    

                                    <div class="form-group">
                                        <label for="user_firstname">Firstname</label>
                                        <input type="hidden" value="<?php echo $user_id; ?>"" name="user_id">
                                        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
                                    </div>


                                    <div class="form-group">
                                        <label for="user_lastname">Lastname</label>
                                        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
                                    </div>

                                        
                                    <div class="form-group">
                                        <label for="user_role">User Role:</label>
                                            <select name="user_role" id="">
                                                    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
                                                    <?php
                                                    if($user_role == "Admin"){
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
                                        <input type="password" value="<?php echo $user_password; ?>" placeholder="Current Password or Update New Password" class="form-control" name="user_password">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Update Profile" name="update_profile">
                                    </div>
                                    
                             </form>
    
                            
                            
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>