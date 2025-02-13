<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>TAREAS</title>
        <style>
            body {
                background-image: url(mamusume.gif);
                background-position: center;
                background-size: 100%;
            }
            h1{
                text-align: center;
                background-color: white;
            }
            tr{
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
        <a href="Gestion.php">AÑADIR TAREAS</a> <a href="iniciosesion.php">SALIR</a>
        <h1>BIENVENIDOs</h1>
        
        <?php
         include_once 'conexionH2.php';
        $sql = "SELECT * FROM tareas";
        $resultao3 = mysqli_query($conexionH2, $sql);
        //Para que realice una consulta que muestre todas las tareas
         
        if ($resultao3 == false) {
            echo "Error en la consulta: " . mysqli_error($conexionH2);
        } else {
            if (mysqli_num_rows($resultao3) > 0) {
                echo "<h1>LISTA DE TAREAS</h1>";
                echo "<table border='1'>
                <tr>
                <th>Titulo tarea</th>
                <th>Tipo tarea</th>
                
                </tr>";
                while ($row = mysqli_fetch_assoc($resultao3)) {
                echo "<tr>
                        <td>" . $row['titulo_tarea'] . "</td>
                        <td>" . $row['tipo_tarea'] . "</td>
                
                  
              </tr>";
              //Para que se muestre una tabla con las tareas
        }
        echo "</table>";
        } else {
        echo "No hay registros disponibles.";
    }
}

mysqli_close($conexionH2);
        ?>
    </body>
</html>