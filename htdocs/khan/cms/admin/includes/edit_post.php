<?php


if(isset($_GET['p_id'])){
    
    $the_post_id = $_GET['p_id'];

    }


    $query = "SELECT * FROM posts WHERE post_id = $the_post_id  ";
    $select_posts_by_id = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_posts_by_id)) {
        $post_id            = $row['post_id'];
        $post_author          = $row['post_author'];
        $post_title         = $row['post_title'];
        $post_category_id   = $row['post_category_id'];
        $post_status        = $row['post_status'];
        $post_image         = $row['post_image'];
        $post_content       = $row['post_content'];
        $post_tags          = $row['post_tags'];
        $post_date          = $row['post_date'];
        
         }


    if(isset($_POST['update_post'])) {
        
   
            $post_title        = escape($_POST['title']);
            $post_author         =  escape($_POST['author']);
            $post_category_id  =  escape($_POST['post_category']);
            $post_status       =  escape($_POST['post_status']);
         
            $post_image        =  $_FILES['image']['name'];
            $post_image_temp   =  $_FILES['image']['tmp_name'];
         
         
            $post_tags         =  escape($_POST['post_tags']);
            $post_content      =  escape($_POST['post_content']);
            $post_date         =  date('d-m-y');   
            header("Location: " . URL . "posts");
    
         
         move_uploaded_file($post_image_temp, "../images/$post_image"); 
        
        if(empty($post_image)) {
        
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection,$query);
        confirmQuery($select_image);
            
        while($row = mysqli_fetch_array($select_image)) {
            
           $post_image = $row['post_image'];
        
        }
        
    }
}
        if(!empty($post_category_id)){
          $query = "UPDATE posts SET ";
          $query .="post_title  = '{$post_title}', ";
          $query .="post_category_id = '{$post_category_id}', ";
          $query .="post_date   =  now(), ";
          $query .="post_author = '{$post_author}', ";
          $query .="post_status = '{$post_status}', ";
          $query .="post_tags   = '{$post_tags}', ";
          $query .="post_content= '{$post_content}', ";
          $query .="post_image  = '{$post_image}' ";
          $query .= "WHERE post_id = {$the_post_id} ";
        
        $update_post = mysqli_query($connection,$query);
        
        confirmQuery($update_post);
        } else { echo "<h3 class=''bg-danger>Choose Category for your post</h3>";}
       
    
?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
   <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>">
</div>

<div class="form-group">
   <label for="post_category">Post Category :</label>
    <select name="post_category" id="">
    
    <?php

        $query = "SELECT * FROM categories";
        $sel = mysqli_query($connection, $query);
        confirmQuery($sel);
        echo "<option>Select Options</option>"; 
        while($result = mysqli_fetch_assoc($sel)){

            $cat_id = $result["cat_id"]; 
            $cat_content = $result["cat_content"];
            

            echo "<option value={$cat_id}>{$cat_content}</option>"; 
        }

     ?>

    </select>
</div>

<div class="form-group">
   <label for="author">Post Author</label>
    <input type="text" class="form-control" name="author" value="<?php echo $post_author; ?>">
</div>

<div class="form-group">
 <select name="post_status" id="">
     <option value=<?php echo $post_status; ?>><?php echo $post_status; ?></option>
     <?php
     if($post_status == 'Drafted'){
       echo  "<option value='Published'>Published</option>";
     } else if ($post_status == 'Published'){
       echo "<option value='Drafted'>Drafted</option>";
     }
     ?>
 </select>
   <!-- <label for="post_status">Post Status</label>
    <input type="text" class="form-control" name="post_status" value="<?php echo $post_status; ?>"> -->
</div>

<div class="form-group">
   <label for="post-image">Post Image</label><br>
   <img src="<?php echo URL_1 . 'images/' . $post_image; ?>" width="100" alt="<?php echo $post_image; ?>">
    <input type="file" name="image" value="<?php echo $post_image; ?>">
</div>


<div class="form-group">
   <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
</div>

<div class="form-group">
   <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="" cols="30" rows="10"> <?php echo $post_content; ?>
    </textarea>
</div>


<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Update Post" name="update_post">
</div>
</form>
