<?php
/*conexión a la base de datos*/
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tiendaropa";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$user = $_GET['username'];
$pass = $_GET['pass'];
if (!$conn) {
    die("no hay conexión manin!: ".mysqli_connect_error()); 
};

/*Validación de usuario*/


$query = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario= '$user' AND pass= '$pass'");

$nr = mysqli_num_rows($query);

if ($nr == 1) {
    header('Location: welcomestore.php');
} else if ($nr == 0){
    echo "incorrecto" .$user;
};

?>