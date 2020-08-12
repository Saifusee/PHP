<?php include "../includes/connection_sql.php" ?>
<?php include "includes/admin_function.php" ?>

<?php  include "includes/admin_header.php" ?>

<?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Welcome to Admin, <?php echo $_SESSION['username']; ?> 
                        </h1>


                            <?php
                            if(isset($_GET['source'])) {
                                $source = $_GET['source'];
                            } else {
                                $source = "";
                            }
                                switch($source){
                                   
                                    case 'post_comment';
                                    include ROOT . "includes/post_comments.php";
                                    break;

                                    default:
                                    include ROOT . "includes/view_all_comments.php";
                                    break;
                                    
                                }
                           
                            
                            ?>
                            
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>