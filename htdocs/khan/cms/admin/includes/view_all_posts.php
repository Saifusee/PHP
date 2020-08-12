<!-- Checkbox functionality-->
<?php
  if(isset($_POST["checkBoxArray"])){

    foreach($_POST['checkBoxArray'] as $checkOption){
          $bulk_option = $_POST['bulk_option'];

          switch($bulk_option){

            case 'publish';
            $query = "UPDATE posts SET post_status = 'Published' WHERE post_id = '{$checkOption}'";
            $publish_query = mysqli_query($connection,$query);
            confirmQuery($publish_query); 
            break;

            case 'draft';
            $query = "UPDATE posts SET post_status = 'Drafted' WHERE post_id = '{$checkOption}'";
            $draft_query = mysqli_query($connection,$query);
            confirmQuery($draft_query); 
            break;

            case 'delete';
            $query = "DELETE FROM posts WHERE post_id = '{$checkOption}'";
            $delete_query = mysqli_query($connection,$query);
            confirmQuery($delete_query); 
            break;

            case 'clone';

            $query = "SELECT * FROM posts WHERE post_id = '{$checkOption}'";
            $post_query = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($post_query)) {
                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_date = $row['post_date'];
                $date = date("Y-m-d H-i-s"); 


                $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags,post_status) ";
                            
                $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}','{$date}','{$post_image}','{$post_content}','{$post_tags}', 'Drafted') "; 
                        
                $clone_post_query = mysqli_query($connection, $query);  
                confirmQuery($clone_post_query);
            }
        
            
            break;

          }
    }
  }

  ?>

<form action="" method="post">

       <div id="bulkOptionContainer" class="col-xs-4">
           <select class="form-control" name="bulk_option" id="selectAllBoxes">
               <option value="">Select Options</option>
               <option value="publish">Publish</option>
               <option value="draft">Draft</option>
               <option value="clone">Clone</option>
               <option value="delete">Delete</option>
           </select>
           <br>
       </div>

       <div class="col-xs-4">
           <input type="submit" name="submit" value="Apply" class="btn btn-success">
           <a href="<?php echo URL ?>posts/add" class="btn btn-primary">Add New</a><br>
       </div>

<table class="table table-bordered table-hover">
<thead>
    <tr>
        <th><input type="checkbox" id="selectAll"></input></th>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Views</th>
        <th>Date</th>
        <th>Publish</th>
        <th>Draft</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
</thead>
<tbody>

    <?php
    
    $query = "SELECT * FROM posts ORDER BY post_id DESC";
    $post_query = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($post_query)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_date = $row['post_date'];

        echo "<tr>";
        ?>




       <td><input type='checkbox' class='checkBox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'>
       </input></td>




         <?php
        echo "<td>$post_id</td>";
        echo "<td>$post_author</td>";
        echo "<td><a href='" . URL_1 . "post/{$post_id}'>{$post_title}</a></td>";
    
    
    $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
    $catid_and_postcatid_equal = mysqli_query($connection,$query);
    confirmQuery($catid_and_postcatid_equal);
    while($_cat = mysqli_fetch_assoc($catid_and_postcatid_equal)) {
        $cat_id = $_cat['cat_id'];
        $cat_content = $_cat['cat_content'];
        echo "<td>$cat_content</td>";
    }
    

    
        echo "<td>$post_status</td>";
        echo "<td><img width='100' src='" . URL_1 . "images/{$post_image}' alt='$post_image'></td>";
        echo "<td>$post_tags</td>";


        $query = "SELECT COUNT(comment_id) AS comm FROM comments WHERE comment_post_id = $post_id" ;
        $comments_show = mysqli_query($connection,$query);
        $comments_show = mysqli_fetch_assoc($comments_show);
        $comm = $comments_show['comm'];
        confirmQuery($comments_show);
        echo "<td><a href='" . URL . "comments/post_comment/{$post_id}'>$comm</a></td>";
        //Alternate way/////////////////////////////////////////////////////////////////////////////////
        // $query = "SELECT COUNT(comment_id) FROM comments WHERE comment_post_id = $post_id" ;
        // $comments_show = mysqli_query($connection,$query);
        // $comm= mysqli_fetch_row($comments_show);
        // confirmQuery($comments_show); 
        // echo "<td>$comm[0]</td>";


         $query = "SELECT post_views_count FROM posts WHERE post_id = {$post_id}";
         $query_views_count = mysqli_query($connection,$query);
         $views_count = mysqli_fetch_array($query_views_count);
         echo "<td> $views_count[0] </td>";


        echo "<td>$post_date</td>";
        echo "<td style='text-align:center'><a href=" . URL . "posts/post_approve/{$post_id}><i class='fa fa-thumbs-o-up' aria-hidden='true' style='font-size:20px'></i></a></td>";
        echo "<td style='text-align:center'><a href=" . URL . "posts/post_unapprove/{$post_id}><i class='fa fa-thumbs-o-down' aria-hidden='true' style='font-size:20px'></a></td>";
        echo "<td style='text-align:center'><a href=" . URL . "posts/delete/{$post_id}><i class='fa fa-trash'style='font-size:20px' aria-hidden='true'></i>
        </a></td>";
        echo "<td style='text-align:center'><a href='" . URL . "posts/edit/{$post_id}'><i class='fa fa-pencil' style='font-size:20px' aria-hidden='true'></i>
        </a></td>";                                 
        echo "</tr>";
    }

    ?>


</tbody>
</table>
</form>


<?php
if(isset($_GET['delete'])){
    if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role'] == 'Admin'){
$the_Post_id = $_GET['delete'];

$query = "DELETE FROM posts WHERE post_id = {$the_Post_id}";
$delete_post = mysqli_query($connection,$query);
confirmQuery($delete_post);
header("Location: " . URL . "posts");

}}}


if(isset($_GET['post_approve'])){
    if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role'] == 'Admin'){
$the_Post_id = $_GET['post_approve'];

$query = "UPDATE posts SET post_status = 'Published' WHERE post_id = {$the_Post_id}";
$post_approve = mysqli_query($connection,$query);
confirmQuery($post_approve);
header("Location: " . URL . "posts");
}}}

    
if(isset($_GET['post_unapprove'])){
    if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role'] == 'Admin'){
$the_Post_id = $_GET['post_unapprove'];

$query = "UPDATE posts SET post_status = 'Drafted' WHERE post_id = {$the_Post_id}";
$post_unapprove = mysqli_query($connection,$query);
confirmQuery($post_unapprove);
header("Location: " . URL . "posts");
}
}}




















?>