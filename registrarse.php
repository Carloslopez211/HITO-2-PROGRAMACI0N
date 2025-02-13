<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <style>
        body {
            background-image: url(litralmenteyoparte2.jpg)
        }
        div {
            padding-left: 450px;
            padding-top: 400px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            font-weight: bold;
            background-color: #b00b69;
            padding: 15px 30px;
            border-radius: 5px; 
            text-align: center;
            transition: background-color 5.7s ease;
        }

        a:hover {
            background-color: #57d7db;
        }

        a:active {
            background-color: #FFF700;
        }
    </style>
</head>
<body>
    <a href="Iniciosesion.php">YA ESTOY REGISTRADO</a>
    <div>
    <h2>Registro</h2>
    <form method="POST" action="registrarse.php">
        <label>Usuario:</label>
        <input type="text" name="nombreusuario"><br>
        <label>Correo Electrónico:</label>
        <input type="email" name="correoelectronico"><br>
        <label>Contraseña:</label>
        <input type="password" name="contrasena"><br>
        <input type="submit" value="CREAR CUENTA">
    </form>
    </div>
    <?php
    include_once "conexionH2.php";
    $nombre = '';
    $contrasena = '';
    $correoelectro = '';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST["nombreusuario"];
        $contrasena = $_POST["contrasena"];
        $correoelectro = $_POST["correoelectronico"];
    }
    //Recoge lo que escribas
    
    $CONSULTA = "SELECT correoelectro FROM usuarios WHERE correoelectro = '$correoelectro'";
    $resultao = mysqli_query($conexionH2, $CONSULTA);
    
    if (mysqli_num_rows($resultao) > 0) {
        echo "YA EXISTE ESE USUARIO";
        //Comprueba que el correo electronico no se repita
    } else {
        $sql = "INSERT INTO usuarios (nombre, contrasena, correoelectro) VALUES ('$nombre', '$contrasena', '$correoelectro')";
        if (mysqli_query($conexionH2, $sql)) {
            header('Location: Inicio.php');
            exit;
            //Te "crea" una cuenta y te tira al menú de inicio de sesión"
        } else {
            echo "Error: " . mysqli_error($conexionH2);
        }
    }
    mysqli_close($conexionH2);
    ?>
</body>
</html>
