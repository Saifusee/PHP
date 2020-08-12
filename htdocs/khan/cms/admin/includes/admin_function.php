
<?php 


function confirmQuery($a){
    global $connection;
    if(!$a){
        die("Query failed Man." . mysqli_error($connection));
    
    }
}


function escape($a){
    global $connection;
    return mysqli_real_escape_string($connection, trim($a));
}



function users_online (){
  //  die("Hello");
   
    $session = session_id();
    // die($session);
    $time = time();
    $time_out_in_seconds = 60;
    $time_out = $time - $time_out_in_seconds;
    global $connection;
    $connection = $connection;
    
    if(!empty($session)){
        $query = "SELECT * FROM user_online WHERE session = '$session'";
        $send_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($send_query);
        // $a = mysqli_query($connection, "UPDATE `user_online` SET `time` = 2 WHERE `session` = '{$session}'");
        
        if($count == 0) {
            
            mysqli_query($connection, "INSERT INTO user_online(session, time) VALUES('$session',{$time})");
            
            
        } else {
            
            mysqli_query($connection, "UPDATE user_online SET `time` = {$time} WHERE `session` = '{$session}'");
            
            
            
        }}
        if(isset($_GET['onlineusers'])){
            
            $db["server"] = "localhost";
            $db["username"] = "root";
            $db["password"] = "";
            $db["database"] = "cms";
                
            $connection = mysqli_connect($db["server"], $db["username"], $db["password"], $db["database"]);
            //we can do all this work simply, just learning some new features to try this.
                
         $users_online_query =  mysqli_query($connection, "SELECT * FROM user_online WHERE time > {$time_out}");
        $online_users_count = mysqli_num_rows($users_online_query);
        echo $online_users_count; 
    }}
    users_online();
    
    function findAllCategories(){
        global $connection;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while($result = mysqli_fetch_assoc($select_categories)){

        $cat_id = $result["cat_id"]; 
        $cat_content = $result["cat_content"];

        echo "<tr>";
        echo "<td>{$cat_id}</td>" . "<td>{$cat_content}</td>";
        echo "<td style='text-align:center' onClick=\"javascript: return confirm('Are you sure to delete it permanently')\"><a href='" . URL . "categories/delete/{$cat_id}'><i class='fa fa-trash'style='font-size:20px' aria-hidden='true'></i></a></td>";
        echo "<td style='text-align:center'><a href='" . URL . "categories/edit/{$cat_id}'><i class='fa fa-pencil' style='font-size:20px' aria-hidden='true'></i></a></td>";
        echo  "</tr>";
    }
}



function addCategoryButton() {
    global $connection;
           $cat_content = escape($_POST['cat_content']);
             if($cat_content == "" || empty($cat_content)){
                                  echo "Field Shouldn't be empty";
             } else {
                 $query = "INSERT INTO categories(cat_content) VALUE('{$cat_content}')";
                     $create_category = mysqli_query($connection, $query);
                     header("Location: " . URL . "categories");

             if (!$create_category){
                    echo mysqli_error($connection);
             }
        }

    }



    function deleteCategoryButton(){
        global $connection;
        $get_cat_id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE cat_id = '{$get_cat_id}'";
            $delete_query = mysqli_query($connection, $query);
            header("Location: " . URL . "categories");
        }


?>