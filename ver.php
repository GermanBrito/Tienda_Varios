<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Tienda de ropa</title>
</head>

<body>
    <main>
        <div class="cont logo"><a href="./welcomestore.php"><img src="./img/logo.jpg" alt="logo triforce?" style="width:42px;height:42px;"></a>
            <p>Inicio</p>
        </div>
        <div class="cont container">
            <div class="buttones">
                <p>¿Necesitas ayuda?</p>
            </div>
            <div class="buttones">
                <a HREF="register.html">Registrarse</a>
            </div>
            <div class="buttones">
                <a HREF="login.html">Iniciar Sesión</a>
            </div>
        </div>
        <div class="cont" id="formis">
            <div class="consformis">
                <FORM action="busqueda.php" method="$_POST">
                    Filtrar: <INPUT TYPE="text" NAME="dato" value="">
                    <input type="submit" name="submit" value="Buscar">

                </FORM>
            </div>
            <div class="consformis">
                <form method="POST" action="agregar.php" enctype="multipart/form-data">
                    <label>Tipo de prenda</label>
                    <input type="text" name="tipo_prenda" placeholder="Tipo de prenda" required>
                    <br>
                    <label>Marca</label>
                    <input type="text" name="marca" placeholder="Marca" required>
                    <br>
                    <label>Talle</label>
                    <input type="text" name="talle" placeholder="Talle" required>
                    <br>
                    <label>Precio</label>
                    <input type="text" name="precio" placeholder="Precio" required>
                    <br>
                    <label>Imagen</label>
                    <input type="file" name="imagen" placeholder="imagen">
                    <input type="submit" name="submit" value="Ingresar">
                </form>
            </div>
        </div>
        <div class="cont" id="contcard">
            <?php
                 /*conexión a la base de datos*/
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "tiendaropa";

            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

            $id = $_GET["id"];


            if (!$conn) {
                die("no hay conexión manin!: " . mysqli_connect_error());
            };
            $consulta = "SELECT * FROM prendas WHERE id= '$id'";
            $datos = mysqli_query($conn, $consulta);

            while ($reg = mysqli_fetch_array($datos)) { ?>
                <div class="card col-sm-12 col-md-6 col-lg-3" >
                    <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen']) ?>" alt="imagen" width="100px" height="100px" )>
                    <a href="ver.php?id=<?php echo $reg['id']; ?>" class="card-body">
                        <h3 class="card-title" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['marca']) ?></h3>
                        <span>$ <?php echo $reg['precio']; ?></span>
                    </a>
                </div>
                <div>
                    <form action="modificar.php" method="$_POST">
                    <a href="ver.php?id=<?php echo $reg['id']; ?>" class="card-body">
                    <input type="submit" name="id" value="Modificar">
                    </form>
                </div>

            <?php } ?>


        </div>
        <div class="cont">Tienda online / catálogo prendas de vestir</div>
    </main>

</body>

</html>