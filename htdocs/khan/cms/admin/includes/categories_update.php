<?php
  if(isset($_POST['update_category'])){
  $upt_cat_title = $_POST['cat_content'];
  $query = "UPDATE categories SET cat_content = '{$upt_cat_title}' WHERE cat_id = '{$cat_id}'";
  $update_category = mysqli_query($connection,$query);
  header("Location: " . URL . "categories");
  }
?>


<form action="" method="post">
       <div class="form-group">
            <label for="cat-title">Update Category</label>

               <?php 
                  if(isset($_GET['edit'])){
                     $cat_id = $_GET['edit'];
                    $query = "SELECT * FROM categories WHERE cat_id = {$cat_id}";
                     $sel = mysqli_query($connection, $query);

                  while($result = mysqli_fetch_assoc($sel)){

                        $cat_id = $result["cat_id"]; 
                        $cat_content = $result["cat_content"];
                
                ?>                                                    


            <input type="text" value="<?php echo $cat_content; ?>" name="cat_content" class="form-control">


             <?php }} ?>


         </div>
        <div class="form-group">
           <input name="update_category" type="submit" value="Update Category" class="btn btn-primary">
        </div>
</form>