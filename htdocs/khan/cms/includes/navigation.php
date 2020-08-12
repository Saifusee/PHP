<!-- Navigation -->

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo URL ?>home"><i class="fa fa-home" style="font-size:35px; margin-right:35px;" aria-hidden="true"></i>
</a>
                <a class="navbar-brand" style="margin-top:2px" href="<?php echo URL ?>admin">Admin</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                <!-- Navigation Content Titles
               //////////////////////////////////////////
               ////////////////////////////////////////////
               //////////////////////////////////////// -->
                <?php
                $query = "SELECT * FROM categories";
                $select_all_catetgories_query = mysqli_query($connection, $query);
                while($result = mysqli_fetch_assoc($select_all_catetgories_query)){
                    $cat_id= $result["cat_id"];
                    $cat_content = $result["cat_content"];
                    echo "<li><a href=" . URL . "category/{$cat_id}>{$cat_content}</a></li>";
                }
                ?>
                <!--////////////////////////////////////
                ////////////////////////////////////////
                ////////////////////////////////////////
                /////////////////////////////////////-->


                <?php

                if(isset($_SESSION['user_role'])){
                    if(isset($_GET['p_id'])){
                        $post_id = $_GET['p_id'];
                        echo "<li><a href='admin/posts.php?source=edit_post&p_id={$post_id}'>Edit Post</a></li>";
                    }
                }

                ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
