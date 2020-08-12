<?php include "includes/connection_sql.php" ?>
<?php include "includes/function.php" ?>

<?php include "includes/header.php" ?>

<?php include "includes/navigation.php" ?>

<?php
        if(isset($_GET['author'])){
            $post_author = $_GET['author'];
        }
        ?>


<!-- Page Content -->
<div class="container">

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="page-header" style="text-align:center">
            Posts by <?php echo $post_author;  ?>
           
        </h1>



       

        <?php

        /// Blog Creater /////////////////////
        ///////////////////////////////////////
        ////////////////////////////////////
        
            $query = "SELECT * FROM posts WHERE post_author = '{$post_author}' ORDER BY post_id DESC";
            $select_author_posts = mysqli_query($connection, $query);
            $postcontent = blogcontent($select_author_posts);
            foreach($postcontent as $content){         //we start loop to reach values of array 
                                                       //and stopping loop after first blog post so it loop again.
        ?>


        <!-- First Blog Post -->
        <h2>
            <a href="<?php echo URL ?>post/<?php echo $content['post_id'];?>"> <?php echo $content['post_title']; ?> </a>
        </h2>
        <p class="lead">
            by <a href="<?php echo URL ?>author/<?php echo $content['post_author'] ?>"> <?php echo $content['post_author']; ?> </a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $content['post_date'] ?> </p>
        <hr><a href="<?php echo URL ?>post/<?php echo $content['post_id'];?>">
        <img class="img-responsive" src="<?php echo URL ?>images/<?php echo $content['post_image']; ?>" alt="<?php echo $content['post_image']; ?>"></a>
        <hr>
        <p> <?php echo $content['post_content'] ?> </p>
        <a class="btn btn-primary" href="<?php echo URL ?>post/<?php echo $content['post_id'];?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        <hr>


        <?php } ?> <!--for each ending-->







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