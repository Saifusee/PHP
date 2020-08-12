
<!-- Page Content -->
<div class="container">

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="page-header">
            Page Heading
            <small>Secondary Text</small>
        </h1>


        <!-- Blog Creater /////////////////////
        ///////////////////////////////////////
        ////////////////////////////////////-->
        <?php
            if(isset($_POST['submit'])){
                $search = mysqli_real_escape_string($connection,$_POST['search']);
            
                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                $result_a = mysqli_query($connection, $query);
                $search_content = blogcontent($result_a);
                foreach($search_content as $content){
                                                       //and stopping loop after first blog post so it loop again.
        ?>


        <!-- First Blog Post -->
        <h2>
            <a href="post/<?php echo $content['post_id'];?>"> <?php echo $content['post_title']; ?> </a>
        </h2>
        <p class="lead">
            by <a href="author/<?php echo $content['post_author'];?>"> <?php echo $content['post_author']; ?> </a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $content['post_date'] ?> </p>
        <hr><a href="post/<?php echo $content['post_id'];?>">
        <img class="img-responsive" src="<?php echo URL ?>images/<?php echo $content['post_image']; ?>" alt="<?php echo $content['post_image']; ?>"></a>
        <hr>
        <p> <?php echo $content['post_content'] ?> </p>
        <a class="btn btn-primary" href="post/<?php echo $content['post_id'];?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>


        <?php }} ?> <!--for each ending-->

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