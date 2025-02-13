<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            body{
                background-image: url(fondofinla.jpg)
            }
            div {
            background-color: white;
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
        <a href="CRTareas.php">VER TAREAS</a> <a href="iniciosesion.php">SALIR</a>
         <div>
    <h2>SUBIR TAREA</h2>
    <form method="POST" action="Gestion.php">
        <label>Titulo:</label>
        <input type="text" name="titulo_tarea"><br>
        <label>Tipo de tarea:</label>
        <input type="text" name="tipo_tarea"><br>
        <input type="submit" value="SUBIR TAREA">
    </form>
    </div>
        <?php
        include_once "conexionH2.php";
    $titulo_tarea = '';
    $tipo_tarea = '';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulo_tarea = $_POST["titulo_tarea"];
        $tipo_tarea = $_POST["tipo_tarea"];
        //Recoge los datos que pongas
    }
    $CONSULTA2 = "SELECT titulo_tarea FROM tareas WHERE titulo_tarea = '$titulo_tarea'";
    $resultao4 = mysqli_query($conexionH2, $CONSULTA2);
    
    if (mysqli_num_rows($resultao4) > 0) {
        echo "YA EXISTE ESE TITULO";
        //Comprueba que no se repita el título
    } else {
        $sql = "INSERT INTO tareas (titulo_tarea, tipo_tarea) VALUES ('$titulo_tarea', '$tipo_tarea')";
        if ( mysqli_query($conexionH2, $sql)) {
            header('Location: CRTareas.php');
            exit;
    //Añade tu tarea y te tira de vuelta al visor de tareas
        } else {
            echo "Error: " . mysqli_error($conexionH2);
        }
    }
    mysqli_close($conexionH2);
        ?>
    </body>
</html>
