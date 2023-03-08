<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ejercicio Formulario 2</title>
</head>

<body>

<h2>Pagina Inicial</h2> <br>

<form method="post">
    <input type="submit" name="ok" value="Categorias"><br><br>
    <input type="submit" name="ok2" value="Añadir Platos"><br><br>
    <input type="submit" name="ok3" value="Carrito compra"><br><br>
</form>

<?php
// isset() devuelve true si la variable está definida
// En este caso sólo entramos al if si hemos clicado en "Enviar"
session_start();
if(isset($_SESSION['usuario2'])){
    echo "<br>Bienvenido a la página principal, $_SESSION[usuario2].<br>";

if(isset($_REQUEST['ok'])){
header("location:Categorias.php");
}
if(isset($_REQUEST['ok2'])){
    header("location:añadirplatos.php");
}
if(isset($_REQUEST['ok3'])){
    header("location:carrito.php");
}
}
else{
    die;
}


?>


</body>
</html>