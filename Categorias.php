<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ejercicio Formulario 2</title>
</head>

<body>
    
<h1>Hotel</h1><br>

<?php

$host='localhost';
$usuario='root';
$contraseña='';
$bd='t3';
$conexion=mysqli_connect($host,$usuario,$contraseña,$bd)
    or die('Problemas con la conexión');
$datos=mysqli_query($conexion,"select categoria from platos
GROUP BY categoria")
    or die('Problemas al seleccionar: '.mysqli_error($conexion));

    echo "<form name='form1' method='post'>
        Habitacion <select name='Categorias'>";
                while($fila=mysqli_fetch_array($datos)){
                    echo "<option name='1' value='$fila[categoria]'>$fila[categoria]</option><br>";
                    }
    echo "</select>";
    echo "<br><input type='submit' name='categoria' value='Selecciona tipo de platos'></form>";
    session_start();
    
        if(isset($_REQUEST['categoria'])){
            $datos=mysqli_query($conexion,"select *
                                          from platos
                                          where categoria='$_REQUEST[Categorias]'")
            or die('Problemas al seleccionar: '.mysqli_error($conexion));
            while($fila=mysqli_fetch_array($datos)){
                echo "<br>$fila[nombre]<br>";
                echo "---------------------";
                }
        }
    
?>