<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">


<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="<?php echo URL ?>search" method="post">
    <div class="input-group">
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>




<!-- Login well -->
<div class="well">
    <h4>Login</h4>
    <form action="<?php echo URL; ?>includes/login.php" method="post">
    <div class="form-group">
        <input name="username" type="text" class="form-control" placeholder="Enter Username">

    </div>
    <div class="input-group">
    <input name="password" type="password" class="form-control" placeholder="Enter Password">
        <span class="input-group-btn">
              <button style="background-color:blue; color:white" name="login" class="btn btn-default" type="submit"> Login </button>
        </span>
    </div>
    <br><a href="<?php echo URL; ?>registration">Create new Account</a>
    </form>
    <!-- /.input-group -->
</div>



<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">

            <?php 

            $query = "SELECT * FROM categories";
            $select_all_catetgories_query = mysqli_query($connection, $query);
            while($result = mysqli_fetch_assoc($select_all_catetgories_query)){
                $cat_id = $result["cat_id"];
                $cat_content = $result["cat_content"];
                echo "<li><a href=" . URL . "category/{$cat_id}>{$cat_content}</a></li>";
            }

            ?>

            </ul>
        </div>
        
    </div>
    <!-- /.row -->
</div>

</div>

</div>
<!-- /.row -->

<hr>
