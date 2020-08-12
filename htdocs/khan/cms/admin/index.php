<?php include "/opt/lampp/htdocs/khan/cms/includes/connection_sql.php" ?>

<?php include "includes/admin_header.php" ?>

<?php include "includes/admin_function.php" ?>

<?php  include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome to Admin, <?php echo $_SESSION['username']; ?> 
                        </h1>
                    
                            
                    </div>
                </div>


                    <!-- Count queries for all the data of admin and CMS -->
                <?php 

                    $query = "SELECT * FROM posts";
                    $post_counts_query = mysqli_query($connection,$query);
                    $posts_count = mysqli_num_rows($post_counts_query);

                    $query = "SELECT * FROM comments";
                    $comments_counts_query = mysqli_query($connection,$query);
                    $comments_count = mysqli_num_rows($comments_counts_query);

                    $query = "SELECT * FROM users";
                    $users_counts_query = mysqli_query($connection,$query);
                    $users_count = mysqli_num_rows($users_counts_query);

                    $query = "SELECT * FROM categories";
                    $categories_counts_query = mysqli_query($connection,$query);
                    $categories_count = mysqli_num_rows($categories_counts_query);
                
                ?>

                <!--  Widgets to show Acuurate Number of Data in the Dashboard Panel -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $posts_count; ?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'><?php echo $comments_count; ?></div>
                                    <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'><?php echo $users_count; ?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $categories_count; ?></div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <br><br>        
                
                <?php 
                //Counts of Approved and Unapproved Comments
                    $query = "SELECT * FROM comments WHERE comment_status = 'Approved'";
                    $approved_comments_query = mysqli_query($connection, $query);
                    confirmQuery($approved_comments_query);
                    $approved_comments = mysqli_num_rows($approved_comments_query);
                    $unapproved_comments = $comments_count - $approved_comments;

                //Counts of Published and Drafted Posts
                    $query = "SELECT * FROM posts WHERE post_status = 'Published'";
                    $published_posts_query = mysqli_query($connection, $query);
                    confirmQuery($published_posts_query);
                    $published_posts = mysqli_num_rows($published_posts_query);
                    $drafted_posts = $posts_count - $published_posts;
                    
                //Counts of Subscriber
                    $query = "SELECT * FROM users WHERE user_role = 'Subscriber'";
                    $subscriber_query = mysqli_query($connection, $query);
                    confirmQuery($subscriber_query);
                    $subscribers = mysqli_num_rows($subscriber_query);
                    $admin = $users_count - $subscribers;
                   
                    
                ?>


                <!-- Graph work here -->
                <div class="row">

                    <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                ['Data', 'Values'],
                               
                                <?php
                                $count = [ $published_posts, $drafted_posts, $approved_comments, $unapproved_comments,$users_count, $admin, $subscribers, $categories_count];
                                $section = ['Published Posts', 'Drafted Posts', 'Posted Comments', 'Pending Comments','Users', 'Admins', 'Subscribers', 'Categories'];
                                for($i = 0; $i < 8; $i++){
                                echo "['{$section[$i]}'" . "," . "{$count[$i]}],";
                                }

                                ?>

                                ]);

                                var options = {
                                chart: {
                                    title: 'CMS Report',
                                    subtitle: 'Data of all the Activity on CMS',
                                }
                                };

                                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                    </script>
                    <div id="columnchart_material" style="width: auto; height: 400px;"></div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>