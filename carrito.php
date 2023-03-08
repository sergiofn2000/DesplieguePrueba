<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
</head>

<body>


<?php
$host='localhost';
$usuario='root';
$contraseña='';
$bd='t3';
$conexion=mysqli_connect($host,$usuario,$contraseña,$bd)
    or die('Problemas con la conexión');
session_start();

if(empty($_SESSION)){
    echo 'Tu carrito está vacío.<br>';}
else{
    echo 'Los siguientes platos han sido añadidos al carrito: <br>';
foreach($_SESSION['$plato'] as $val){
    echo "<br>";
    echo $val;
}
    echo "<br><br><form method='post'><input type='submit' name='pedido' value='Hacer pedido'><input type='submit' name='inicio' value='Ir a inicio'>";}

$clv=array_keys($_SESSION['$plato']);
$val=array_values($_SESSION['$plato']);


if(isset($_REQUEST['pedido'])){
     $datos=mysqli_query($conexion,"INSERT INTO pedidos(codigo,usuario,Fecha,platos)
                                                values('','$_SESSION[usuario2]','$_SESSION[fecha]','$_SESSION[total]')")
            or die('Problemas al seleccionar: '.mysqli_error($conexion));
}
if(isset($_REQUEST['inicio'])){
      header("location:inicio.php");
}
?>
</section>

</body>
</html>