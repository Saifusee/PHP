<?php session_start(); ?>

<?php

define('URL', 'http://localhost/khan/cms/admin/');
define('ROOT', '/opt/lampp/htdocs/khan/cms/admin/');

define('URL_1', 'http://localhost/khan/cms/');
define('ROOT_1', '/opt/lampp/htdocs/khan/cms/');

?>

<?php

$_SESSION['username'] = null;
$_SESSION['user_firstname'] = null;
$_SESSION['user_lastname'] = null;
$_SESSION['user_email'] = null;
$_SESSION['user_role'] = null;
$_SESSION['user_id'] = null;
$_SESSION['user_password']= null;
header("Location: " . URL_1 . "home");


?>