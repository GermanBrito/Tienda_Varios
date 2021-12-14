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

  // 2) Almacenamos los datos del envío POST
  // a) generar variables para cada dato a almacenar en la bbdd

  $usuario = $_POST['username'];
  $correo = $_POST['email'];
  $contrasenia = $_POST['pass'];
  $contrasenia1 = $_POST['pass1'];
  $admin = ""; 

if(isset($_POST['cbox']))
{
    if($_POST['cbox'] == '1'){
        $admin ='1';
    }else{
        $admin ='0';
    }
}else
{
    $admin ='0';
}
  // 3) Preparar la orden SQL
  // INSERT INTO nombre_tabla (campos_tabla) VALUES (valores_a_ingresar)
  // => Ingresa dentro de la siguiente tabla los siguientes valores
  // a) generar la consulta a realizar

$ingusuario = "INSERT INTO usuarios (id,usuario,tipousuario,pass,email)
        VALUES ('', '$usuario','$admin', '$contrasenia','$correo')";

  // 4) Ejecutar la orden e ingresamos datos



  // a) ejecutar la consulta

  mysqli_select_db($conn,$dbname);

  if (mysqli_query($conn, $ingusuario)) {
    echo "New record created successfully";
    ?><button id="cancel" type="submit" formaction="welcomestore.php">
    Cancelar
    </button><?php
    header('Location: welcomestore.php');
  } else {
    echo "Error: " . $ingusuario . "<br>" . mysqli_error($conn);
    header('Location: register.html');

  }
  
  mysqli_close($conn);

?>