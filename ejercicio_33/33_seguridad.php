<html>

<head>
	<title>El gran agujero de seguridad</title>
	<meta charset="utf-8">
</head>

<body>
	<h2>Agujero de seguridad en register_globals = On</h2>

	<form action="33_seguridad.php" method="post">
		<label for="pass">Contraseña:</label><br>
		<input type="password" name="pass" id="pass">
		<input type="submit" value="Enviar">
	</form>
	<p>Pass: abc_xyz_123</p>



<?php


$login = null;

if (isset($_POST['pass'])) {
	$pass = $_POST['pass'];
	if ($pass == "abc_xyz_123") {
		$login = true;
	} else {
		echo "password incorrecto";
	}
}


if ($login):
	echo "<p>Aqui empieza el arma secreta.</p>";

?>

<p>Antiguamente había una falla de seguridad cuando teníamos el <kbd>register_globals = on</kbd>, bastaba con teclear el valor de la variable login como 1, es decir verdadero, <kbd>33_seguridad.php?login=1</kbd> en la url para que nos saltásemos la contraseña.</p>
<p>Desde PHP 5.3.0 esta característica ha sido declarada obsoleta y eliminada desde la versión PHP 5.4.0</p>

<?php endif; ?>

</body>
</html>