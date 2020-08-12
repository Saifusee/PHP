<?php include "includes/connection_sql.php" ?>
<?php include "includes/function.php" ?>

<?php include "includes/header.php" ?>

<?php include "includes/navigation.php" ?>


<!-- Page Content -->
<div class="container">

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="page-header">
            Page Heading
            <small>Secondary Text</small>
        </h1>



        <?php
        if(isset($_GET['p_id'])){
            $post_id = $_GET['p_id'];

        $query_views_count = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = '{$post_id}'";
            $query_sql_views = mysqli_query($connection, $query_views_count);
        

        /// Blog Creater /////////////////////
        ///////////////////////////////////////
        ////////////////////////////////////
        
            $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
            $select_all_posts = mysqli_query($connection, $query);
            $postcontent = blogcontent($select_all_posts);
            foreach($postcontent as $content){         //we start loop to reach values of array 
                                                       //and stopping loop after first blog post so it loop again.
        ?>


        <!-- First Blog Post -->
        <h2>
            <a href="<?php echo URL ?>post/<?php echo $content['post_id'];?>"> <?php echo $content['post_title']; ?> </a>
        </h2>
        <p class="lead">
            by <a href="<?php echo URL ?>author/<?php echo $content['post_author'];?>"> <?php echo $content['post_author']; ?> </a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $content['post_date'] ?> </p>
        <hr><a href="<?php echo URL ?>post/<?php echo $content['post_id'];?>">
        <img class="img-responsive" src="<?php echo URL ?>images/<?php echo $content['post_image']; ?>" alt="<?php echo $content['post_image']; ?>"></a>
        <hr>
        <p> <?php echo $content['post_content'] ?> </p>

        <hr>


        <?php }} ?> <!--for each ending-->




<!-- Collect Comments Data Here-->
<?php 
$message = '';
if(isset($_POST['create_comment'])){
   $comment_author = mysqli_real_escape_string($connection,$_POST['comment_author']);
   $comment_email = mysqli_real_escape_string($connection,$_POST['comment_email']);
   $comment_content = mysqli_real_escape_string($connection,$_POST['comment_content']);
   $comment_post_id = $_POST['comment_post_id'];
   $date = date("Y-m-d H-i-s");//year(4digit bcz of capital Y)-month-day hours(24hr format bcz of capital H)-minute-seconds[include a with s for am and pm only with 12 hour format]
   

   if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){
       
   $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date ) ";
   $query .= "VALUES ({$comment_post_id}, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'Unapproved', '{$date}')";

   $comment_query = mysqli_query($connection,$query);
   confirmQuery($comment_query);
   $message = '<h4 class="bg-success">Comment submitted, please wait for Admin approval to display</h4>';
   
} else{
      $message = '<h4 class="bg-danger">Alert: Fields cannot be empty</h4>';
} 
}



?>




                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment :</h4>
                    <form action="" method="post">
                        <div class="form-group">
                        <label for="author">Author</label>
                           <input type="text" class="form-control" value="<?php echo $_SESSION['username']; ?>" name="comment_author">
                        </div>

                        <div class="form-group">
                        <label for="email">E-Mail</label>
                           <input type="email" class="form-control" value="<?php echo $_SESSION['user_email']; ?>" name="comment_email">
                        </div>

                        <div class="form-group">
                        <label for="author">Your Comment</label>
                           <textarea class="form-control" name="comment_content"></textarea>
                        </div>
                        <input type="hidden" name="comment_post_id" value= "<?php echo $_GET['p_id']; ?>">
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                        <?php echo $message ?>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php
                    $post_id = $_GET['p_id'];
                    $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id} ";
                    $query .= "AND comment_status = 'Approved' ";
                    $query .= "ORDER BY comment_id DESC ";
                    $select_comment_query = mysqli_query($connection, $query);
                    confirmQuery($select_comment_query);
                    while ($row = mysqli_fetch_array($select_comment_query)) {
                        $comment_date   = $row['comment_date']; 
                        $comment_content= $row['comment_content'];
                        $comment_author = $row['comment_author'];
                        ?>

            
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="#">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>


                <?php } ?>
               

<!-- Pager -->
<ul class="pager">
            <li class="previous">
                <a href="#">&larr; Older</a>
            </li>
            <li class="next">
                <a href="#">Newer &rarr;</a>
            </li>
        </ul> 

    </div>

<?php include "includes/sidebar.php" ?>

<?php include "includes/footer.php" ?>