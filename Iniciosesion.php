<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background-image: url(literalmenteyo.jpg)
        }
        div {
            background-color: white;
        }
        a{
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
            transition: background-color 0.1s ease;
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
    <div>
    <h1>INICIO DE SESION</h1>
    <form method="POST" action="iniciosesion.php">
        <label>Correo Electrónico:</label>
        <input type="email" name="correoelectronico"><br>
        <label>Contraseña:</label>
        <input type="password" name="contrasena"><br>
        <input type="submit" value="INICIO">
    </form><br>
    <a href="registrarse.php">NO TENGO CUENTA</a>
    <!-- Si no tienes cuenta pues le das al botón y te lleva al menú de registrarse -->
    </div>
    <?php
    include_once "conexionH2.php";
    $nombre = '';
    $contrasena = '';
    $correoelectro = '';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $contrasena = $_POST["contrasena"];
        $correoelectro = $_POST["correoelectronico"];
    }
    if ($correoelectro == '' || $contrasena == '') {
        //Guarda los datos con lo que quieras realizar el login
   
    } else {
        $sql = "SELECT correoelectro, contrasena FROM usuarios WHERE correoelectro = '$correoelectro'";
        $resultao2 = mysqli_query($conexionH2, $sql);
        
        if(mysqli_num_rows($resultao2) > 0) {
            $ROW = mysqli_fetch_assoc($resultao2);
            if ($contrasena == $ROW['contrasena']) {
                setcookie('nombre', $nombre, 0, "/");
                header('Location: CRTareas.php');
                exit();
                //Si la contraseña y el correo son correctos te lleva al visor de tareas
            } else {
                echo "CONTRASEÑA INCORRECTA, FUERA";
                }
                } else {
                echo "CORREO INCORRECTO U ERRONEO, FUERA";
            }
        }
    mysqli_close($conexionH2);
    ?>
</body>
</html>


