<?php

/*conexión a la base de datos*/
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tiendaropa";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("no hay conexión manin!: " . mysqli_connect_error());
};
  // 2) Almacenamos los datos del envío POST
  // a) generar variables para cada dato a almacenar en la bbdd
  $tipo_prenda = $_POST ['tipo_prenda'];
  $marca = $_POST['marca'];
  $talle = $_POST['talle'];
  $precio = $_POST['precio'];
  $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));


  // 3) Preparar la orden SQL
  // INSERT INTO nombre_tabla (campos_tabla) VALUES (valores_a_ingresar)
  // => Ingresa dentro de la siguiente tabla los siguientes valores
  // a) generar la consulta a realizar
$consulta = "INSERT INTO prendas (id,descripcion,marca,talle,precio,imagen)
        VALUES ('','$tipo_prenda','$marca','$talle','$precio','$imagen')";
  // 4) Ejecutar la orden y ingresamos datos
  mysqli_select_db($conn,$dbname);
  // a) ejecutar la consulta
  mysqli_query($conn,$consulta);
  // a) rederigir a index
  header('location: welcomestore.php');
?>
