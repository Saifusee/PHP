<?php ob_start(); ?>
<?php session_start(); ?>

<?php
define('URL', 'http://localhost/khan/cms/admin/');
define('ROOT', '/opt/lampp/htdocs/khan/cms/admin/');

define('URL_1', 'http://localhost/khan/cms/');
define('ROOT_1', '/opt/lampp/htdocs/khan/cms/');


?>

<?php 
if(!isset($_SESSION['user_role'])){
    header("Location: " . URL_1 . "home");
  } else if ($_SESSION['user_role'] !== "Admin"){
    header("Location: " . URL_1 . "home");
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS-Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL;?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo URL;?>css/sb-admin.css" rel="stylesheet">
    <!--For Loading css of Admin--->
    <!-- <link href="css/loader.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <link href="<?php echo URL;?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

    <script src="https://cdn.tiny.cloud/1/b3uh0d0es9tvdfmgc6cgy9syv7oqlxkjkryrqkcznr93oynb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    


</head>
<!--For Loading css of Admin--->
<!-- <div id="load-screen"><div id="loading"></div></div> -->

<body>
    <div id="wrapper">