<html>
<head>
	<title>EJERCICIO 26</title>
</head>

<body>
	<h1>EJERCICIO 26: ANALISIS DE FORMULARIO Version 3 Todo en una pagina</h1>
	<br>
	<h1>Rellena los campos (form.html)</h1>
	<form action="26_analisis.php" method="post">
		<input type="radio" name="gender" value="0"> Sr.
		<input type="radio" name="gender" value="1"> Sra.<br>
		Tu apellido:<br>
		<input type="text" name="lastname">
		<input type="submit" name="submitbutton" value="Envialo!">
	</form>

<?php

/* isset — Determina si una variable está definida y no es NULL
 * si $_POST['gender'] y $_POST['lastname'] están definidas y no son null
 * y $_POST['lastname'] no es igual a una cadena de texto vacía entonces
 * ejecutamos el if. Si no ponemos el última && podríamos pasar espacios en
 * blanco en el imput.
 */

if (isset($_POST['gender']) && isset($_POST['lastname']) && $_POST['lastname'] != "") {
	if($_POST['gender'] == 0) {
		echo "Hola Sr. ";
	} else {
		echo "Hola Sra. ";
	}
	echo "<b>{$_POST['lastname']}</b>, encantado de saludarte.\n";
} else {
	if (isset($_POST['submitbutton'])) {
		echo "Por favor rellena todos los campos" ;
	}
}

?>

</body>
</html>