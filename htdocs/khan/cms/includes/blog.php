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
            $limit_page_per_post = 8;
            $query = "SELECT * FROM posts WHERE post_status = 'Published'";
            $sel_all_posts = mysqli_query($connection, $query);
                $count = mysqli_num_rows($sel_all_posts);
                $count_page = ceil($count / $limit_page_per_post);
            
            ?>

            <?php  
                $precede = 0;
                if(isset($_GET['page'])){
                   $page_number = $_GET['page'];
                   if($page_number == 1 || $page_number == '') {
                       $precede = 0;
                   } else {
                    $precede = ($page_number * $limit_page_per_post) - $limit_page_per_post;

                   }
                }
            
            ?>



        <!-- Blog Creater /////////////////////
        ///////////////////////////////////////
        ////////////////////////////////////-->
        <?php
            $query = "SELECT * FROM posts WHERE post_status = 'Published' ORDER BY post_id DESC LIMIT {$precede},{$limit_page_per_post}";
            $select_all_posts = mysqli_query($connection, $query);
            $postcontent = blogcontent($select_all_posts);
            foreach($postcontent as $content){         //we start loop to reach values of array 
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
        <img class="img-responsive" src="<?php echo URL ?>images/<?php echo $content['post_image']; ?>" alt="<?php echo $content['post_image']; ?>">
            </a>
        <hr>
        <p> <?php echo $content['post_content'] ?> </p>
        <a class="btn btn-primary" href="post/<?php echo $content['post_id'];?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>


        <?php } ?> <!--for each ending-->





        <!-- Pager -->
        <ul class="pager">

        <?php 
            for($i = 1; $i <= $count_page; $i++){
           echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                
            }
        
        ?>
        </ul> 

    </div>