<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ejercicio Formulario 2</title>
</head>

<body>
    
<h1>Pedido</h1><br>

<?php
session_start();
$host='localhost';
$usuario='root';
$contraseña='';
$bd='t3';
$conexion=mysqli_connect($host,$usuario,$contraseña,$bd)
    or die('Problemas con la conexión');
$datos=mysqli_query($conexion,"select distinct categoria from platos")
    or die('Problemas al seleccionar: '.mysqli_error($conexion));
    echo "<form method='post'>";
    while($fila=mysqli_fetch_array($datos)){
        echo "<h2>$fila[categoria]</h2>";
        $datos2=mysqli_query($conexion,"select nombre from platos
                                       where categoria='$fila[categoria]'")
        or die('Problemas al seleccionar: '.mysqli_error($conexion));
                while($fila=mysqli_fetch_array($datos2)){
                    echo "$fila[nombre]<input type='number' min='0' max='15' name='$fila[nombre]'><br>";
                }
    }
    echo "<br><br><input type='submit' name='carrito' value='Añadir e ir al Carrito'>
    <input type='submit' name='inicio' value='Ir a inicio'></form>";
    
       
            /*
            $datos=mysqli_query($conexion,"INSERT INTO pedidos(codigo,usuario,Fecha,platos)
                                                values('','$_SESSION[usuario2]','$_REQUEST[fecha]','$_REQUEST[numero]')")
            or die('Problemas al seleccionar: '.mysqli_error($conexion));
            */ 
        if(isset($_REQUEST['inicio'])){
            header("location:inicio.php");
        }
        if(isset($_REQUEST['carrito'])){
            $clv=array_keys($_REQUEST);
            $val=array_values($_REQUEST);
            $plato=array();
            $_SESSION['$plato']=$plato;
            for($i=0;$i<count($val);$i++){
                if(!empty($val[$i]) && $val[$i]>0 && is_numeric($val[$i])){
                    if($val[$i]>1){
                        $_SESSION['$plato'][$i]="$val[$i] platos de $clv[$i]";
                    }
                    else{
                        $_SESSION['$plato'][$i]="$val[$i] plato de $clv[$i]";
                    }
                }
            }
            $_SESSION['fecha']=date('d/m/Y');
            header("location:carrito.php");
        }
        
    
?>