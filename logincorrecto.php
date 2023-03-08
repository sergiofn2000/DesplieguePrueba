<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ejercicio Formulario 2</title>
</head>

<body>

Inicia Sesion<br>

<form method="post">
	Usuario <input type="text" name="usuario2" required><br>
    Contraseña <input type="password" name="pass1" required><br>
    <input type="submit" name="ok" value="Enviar"><br>
</form>

<?php
// isset() devuelve true si la variable está definida
// En este caso sólo entramos al if si hemos clicado en "Enviar"
$contar;
if(isset($_REQUEST['ok'])){
    $host='localhost';
    $usuario='root';
    $contraseña='';
    $bd='T3';

    $conexion=mysqli_connect($host,$usuario,$contraseña,$bd)
        or die('Problemas con la conexión');
    
    $datos=mysqli_query($conexion,"select usuario,password from usuarios
                                where usuario='$_REQUEST[usuario2]'")
        or die('Problemas al seleccionar: '.mysqli_error($conexion));
    $datos2=mysqli_query($conexion,"select usuario,password from usuarios
                                where usuario='$_REQUEST[usuario2]'")
        or die('Problemas al seleccionar: '.mysqli_error($conexion));
    // mysqli_query devolverá un objeto mysqli con los datos filtrados cuando le damos un select
    session_start();
    while($fila=mysqli_fetch_array($datos)){
        
            if(isset($_REQUEST['usuario2']) or isset($_SESSION['usuario2'])){
                $_SESSION['usuario2']=$_REQUEST['usuario2'];
                $_SESSION['pass1']=$_REQUEST['pass1'];
                echo "Hola, $_SESSION[usuario2].<br>";
                header("location:inicio.php");
            }   
        
        
    }

         
    mysqli_close($conexion);}



?>


</body>
</html>