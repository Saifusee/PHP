<?php

if(isset($_POST['create_post'])) {
   
   $post_title        = $_POST['title'];
   $post_author         =  escape($_POST['author']);
   $post_category_id  =  escape($_POST['post_category']);

   $post_image        =  $_FILES['image']['name'];
   $post_image_temp   =  $_FILES['image']['tmp_name'];


   $post_tags         =  escape($_POST['post_tags']);
   $post_content      =  $_POST['post_content'];
   $post_date         =  date('d-m-y');   
   
   $post_title = mysqli_real_escape_string($connection, $post_title);
   $post_content = mysqli_real_escape_string($connection, $post_content);

   move_uploaded_file($post_image_temp, "../images/$post_image");

   $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags,post_status) ";
             
   $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', 'Drafted') "; 
          
   $create_post_query = mysqli_query($connection, $query);  
   confirmQuery($create_post_query);


//Updation to inform that post created and a link to take you their to post.


//  $query = "SELECT * FROM posts WHERE post_title = '{$post_title}'";
//  $show_query = mysqli_query($connection, $query);  
//  confirmQuery($show_query);
//  while($result = mysqli_fetch_assoc($show_query)){
//  $post_id = $result['post_id'];
// }
//    echo "<p><h3 class='bg-danger' style='text-align: center'>Post Created Successfully with title <a href=../post.php?p_id={$post_id}>{$post_title}</a></h3></p>";
// }
///Alternate way/////
$post_id = mysqli_insert_id($connection);
echo "<p><h3 class='bg-danger' style='text-align: center'>Post Created Successfully with title <a href=" . URL_1 . "post/{$post_id}>{$post_title}</a></h3></p>";
}


?>
   
   
   
    <form action="" method="post" enctype="multipart/form-data">    

      <div class="form-group">
         <label for="title">Post Title</label>
          <input type="text" class="form-control" name="title">
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
          <input type="text" class="form-control" name="author">
      </div>

      <div class="form-group">
         <label for="post-image">Post Image</label>
          <input type="file" name="image">
      </div>

     
      <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input type="text" class="form-control" name="post_tags">
      </div>

      <div class="form-group">
         <label for="post_content">Post Content</label>
          <textarea class="form-control" name="post_content" id="editor" cols="30" rows="10"> 
          </textarea>
      </div>
      

      <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Publish Post" name="create_post">
      </div>
      
      </form>
    