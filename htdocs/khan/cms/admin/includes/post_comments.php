<?php 
    if(isset($_GET['id'])){
        $post_id_of_comments = $_GET['id'];
    }

?>


<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Post</th>
            <th>E-mail</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php
        
        $query = "SELECT * FROM comments WHERE comment_post_id = {$_GET['id']} ";
        $post_query = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($post_query)) {
            if(empty($row)){
                echo "NO Comments";
            } else {
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];
            $comment_email = $row['comment_email'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];}
            
            

            echo "<tr>";
            echo "<td>$comment_id</td>";
            echo "<td>$comment_author</td>";

            $query = "SELECT * FROM posts WHERE post_id =  $comment_post_id";
                $aa = mysqli_query($connection,$query);
                confirmQuery($aa);
                while($commentPostRelation = mysqli_fetch_assoc($aa)){
                    $post_title = $commentPostRelation['post_title'];
                    $post_id = $commentPostRelation['post_id'];
                    echo "<td><a href=../post.php?p_id={$post_id}>{$post_title}</a></td>";
                    echo "<td>$comment_email</td>";

                }
            echo "<td>$comment_content</td>";
            echo "<td>$comment_status</td>";
           
                                              
            echo "<td>$comment_date</td>";
            echo "<td style='text-align:center'><a href='" . URL . "comments/post_comment/approve/{$comment_id}/{$_GET['id']}'><i class='fa fa-thumbs-o-up' aria-hidden='true' style='font-size:20px'></i></a></td>";
            echo "<td style='text-align:center'><a href='" . URL . "comments/post_comment/unapprove/{$comment_id}/{$_GET['id']}'><i class='fa fa-thumbs-o-down' aria-hidden='true' style='font-size:20px'></a></td>";
            echo "<td style='text-align:center' onClick=\"javascript: return confirm('Are you sure to delete it permanently')\"><a href='" . URL . "comments/post_comment/delete/{$comment_id}/{$_GET['id']}'><i class='fa fa-trash'style='font-size:20px' aria-hidden='true'></i>
                  </a></td>";
            echo "</tr>";
            }

        ?>


    </tbody>
</table>


<?php

/* delete comments*/ 
if(isset($_GET['delete'])){
    if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role'] == 'Admin'){
    $the_Comment_id = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id = {$the_Comment_id}";
    $delete_comments = mysqli_query($connection,$query);
    confirmQuery($delete_comments);
    header("Location: " . URL . "comments/post_comment/{$_GET['id']}");
}}}

/* Set status to approve*/ 
if(isset($_GET['approve'])){
    if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role'] == 'Admin'){
    $the_Comment_id = $_GET['approve'];

$query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$the_Comment_id}";  
    $approve_query = mysqli_query($connection,$query);
    confirmQuery($approve_query);
    header("Location: " . URL . "comments/post_comment/{$_GET['id']}");
}}}



/* Set status to unapprove*/ 

if(isset($_GET['unapprove'])){
    if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role'] == 'Admin'){
    $the_Comment_id = $_GET['unapprove'];

$query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = {$the_Comment_id}";
    $unapprove_query = mysqli_query($connection,$query);
    confirmQuery($unapprove_query);
    header("Location: " . URL . "comments/post_comment/{$_GET['id']}");
}}}

?>