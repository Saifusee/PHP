<?php  include "includes/connection_sql.php"; ?>
<?php  include "includes/function.php"; ?>
 <?php  include "includes/header.php"; ?>

<?php 
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $date = date("Y-m-d H-i-s");
        if(!empty($username) && !empty( $email) && !empty($password)){
            $username = mysqli_real_escape_string($connection, $username);
            $email = mysqli_real_escape_string($connection, $email);
            $password = mysqli_real_escape_string($connection, $password); 
            $password = md5($password);//MD5 password Encryption
            //$password = password_hash($password, PASSWORD_BCRYPT, array("cost" => 8));//password hash enryption
    
            $query = "INSERT INTO users(username, user_email, user_password, user_date) ";
                        
            $query .= "VALUES('{$username}','{$email}','{$password}','{$date}') "; 
                    
            $create_user_query = mysqli_query($connection, $query);  
            confirmQuery($create_user_query);
            echo "<p><h3 class='bg-success' style='text-align: center'>User Registered, Login to Continue - <a href=" . URL . "home>Click Here</a>.</h3></p>";
        } else {
            echo "<p><h3 class='bg-warning' style='text-align: center'>Fields cannot be empty.</h3></p>";

        }

       
       }
?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="<?php echo URL; ?>home/registration" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
