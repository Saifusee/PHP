<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>E-mail</th>
            <th>Role</th>
            <th>Date</th>
            <th>Make Admin</th>
            <th>Make Subscriber</th>
            <th>Delete</th>
            <th>Edit</th>
            
           
        </tr>
    </thead>
    <tbody>

        <?php
        
        $query = "SELECT * FROM `users` ORDER BY `user_id` DESC";
        $user_view_query = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($user_view_query)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_password = $row['user_password'];
            $user_role = $row['user_role'];
            $user_date = $row['user_date'];
            
            

            echo "<tr>";
            echo "<td>$user_id</td>";
            echo "<td><a href='" . URL_1 . "author/{$username}'>$username</a></td>";
            echo "<td>$user_firstname</td>";
            echo "<td>$user_lastname</td>";
            echo "<td>$user_email</td>";

            echo "<td>$user_role</td>"; 
            echo "<td>$user_date</td>";                                    
            echo "<td style='text-align:center'><a href='" . URL . "users/user_status_admin/{$user_id}'><i class='fa fa-anchor' aria-hidden='true' style='font-size:20px'></i>

            </a></td>";
            echo "<td style='text-align:center'><a href='" . URL . "users/user_status_subscriber/{$user_id}'><i class='fa fa-user' aria-hidden='true' style='font-size:20px'></i>
            </a></td>";
            echo "<td style='text-align:center'><a href='" . URL . "users/delete/{$user_id}'><i class='fa fa-trash'style='font-size:20px' aria-hidden='true'></i>
                  </a></td>";
            echo "<td style='text-align:center'><a href='" . URL . "users/edit/{$user_id}'><i class='fa fa-pencil' style='font-size:20px' aria-hidden='true'></i>
                  </a></td>";
            echo "</tr>";
            }

        ?>


    </tbody>
</table>


<?php

/* delete user*/ 
if(isset($_GET['delete'])){
    if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role'] == 'Admin'){

    $the_user_id = $_GET['delete'];

    $query = "DELETE FROM `users` WHERE `user_id` = {$the_user_id}";
    $delete_users = mysqli_query($connection,$query);
    confirmQuery($delete_users);
    header("Location: " . URL .  "users.php");
}}}

/* mkae admin*/ 
if(isset($_GET['user_status_admin'])){
    if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role'] == 'Admin'){
    $the_user_id = $_GET['user_status_admin'];

$query = "UPDATE `users` SET `user_role` = 'Admin' WHERE `user_id` = {$the_user_id}";  
    $admin_query = mysqli_query($connection,$query);
    confirmQuery($admin_query);
    header("Location: " . URL .  "users.php");
}}}



/* make subscriber*/ 

if(isset($_GET['user_status_subscriber'])){
    if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role'] == 'Admin'){
    $the_user_id = $_GET['user_status_subscriber'];

    $query = "UPDATE `users` SET `user_role` = 'Subscriber' WHERE `user_id` = {$the_user_id}";  
    $subscriber_query = mysqli_query($connection,$query);
    confirmQuery($subscriber_query);
    header("Location: " . URL .  "users.php");
}}}

?>