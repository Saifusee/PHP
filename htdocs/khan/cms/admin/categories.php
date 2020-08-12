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

                        <div class="col-xs-6">


                        <!--Add new Category on Admin Category Tab.-->
                        <?php if(isset($_POST['submit'])){ addCategoryButton(); } ?>


                        <!--Delete Button of admin Category Navigation-->
                        <?php if(isset($_GET['delete'])) 
                        if(isset($_SESSION['user_role'])){
                            if($_SESSION['user_role'] == 'Admin'){
                        { deleteCategoryButton (); } 
                            }
                        }
                        ?>
                            

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" name="cat_content" class="form-control">
                            </div>
                            <div class="form-group">
                                <input name="submit" type="submit" value="Add Category " class="btn btn-primary">
                            </div>
                        </form>

                        <?php 
                        if(isset($_GET['edit'])){
                            $cat_id = $_GET['edit'];
                            include "includes/categories_update.php";
                        }
                        ?>



                        </div>
                    
                        <div class="col-xs-6">

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>


                                <!--Show Data to Category Tab of Admin on Load-->
                                    <?php findAllCategories(); ?>
                                     

                                </tbody>
                            </table>
                        </div>  

                            
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>