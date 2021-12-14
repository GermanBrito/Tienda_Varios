<?php
  // 1) Conexion
  // a) realizar la conexion con la bbdd
  // b) seleccionar la base de datos a usar
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tiendaropa";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
    die("no hay conexión manin!: ".mysqli_connect_error()); 
};

$id = $_GET['id'];
  // 3) Preparar la orden SQL
  // DELETE FROM nombre_tabla WHERE campo_tabla=dato
  // => Elimina de la siguiente tabla el registro donde este campo sea igual a este dato
  // DELETE FROM nombre_tabla
  // => Elimina todos los registros de la siguiente tabla
  // a) generar la consulta a realizar
$consulta = "DELETE FROM prendas WHERE id=$id";
  // 4) Ejecutar la orden y eliminamos el regitro seleccionado
  // a) ejecutar la consulta
mysqli_query($conn,$consulta);

  // a) rederigir a index
  header('location: welcomestore.php');
?>
