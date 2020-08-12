<?php
session_start();
$_SESSION["happy"] = "Session created <br>";

print_r($_GET);
print_r($_SESSION);
$id = "submit";
$name = "SAIful";
$value = 652;
$expiration = time() + (60*60*24*8760*10);

setcookie($name,$value,$expiration);
if (isset($_COOKIE)){
    $name = $_COOKIE["SAIful"];
    echo $name;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="web.php?id=game,src=<?php echo $id; ?>">Home</a>
    
</body>
</html>