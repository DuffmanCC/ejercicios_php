<?php
if (isset($_POST['pw'])) {
	$pw = $_POST['pw'];
	if ($pw == "magic") {
		header ("Location: newpage1.html");
	} elseif ($pw == "abracadabra" ){
		header ("Location: newpage2.html");
	} else {
		header ("Location: sorry.html");
	}
}

/* 
 * header() es usado para enviar encabezados HTTP sin formato.
 * Existen dos casos especiales en el uso de header. El primero el 
 * encabezado que empieza con la cadena "HTTP/", es utilizado para 
 * averiguar el código de status HTTP a enviar.
 * El segundo caso especial es el encabezado "Location:" No solamente 
 * envía el encabezado al navegador, sino que también devuelve el 
 * código de status (302) REDIRECT al navegador a no ser que el código 
 * de status 201 o 3xx ya haya sido enviado.
 */
?>

<html>
<head>
	<title>Ejemplo de password y header</title>
</head>

<body>
	<h1> Ejemplo de password y funcion header </h1>
	<!-- cundo redirige al mismo archivo no hace falta poner nada o se pone el mismo archivo -->
	<form action="27_pass1.php" method="post">
		<input type="text" name="pw">
		<input type="submit" value="Envialo">
	</form>
</body>
</html>