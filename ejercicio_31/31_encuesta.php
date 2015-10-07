<?php 

// creamos una cookie con valor 1 solo si
// $_POST['submit'] está definida y no es igual a 0
if (isset($_POST['submit'])) {
	setcookie("vote", 1);
}

?>

<html>
<head>
	<title>Encuesta de opinión</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>

<body>
	<h1>Encuesta</h1>
	<h3>¿Qué opinas de este curso de php?</h3>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label for="value0">Excelente, he aprendido mucho.</label>
		<input type="radio" id="value0" name="reply" value="0" /><br />
		<label for="value1">Más o menos, es complicado.</label>
		<input type="radio" id="value1" name="reply" value="1" /><br />
		<label for="value2">No me ha servido de nada.</label>
		<input type="radio" id="value2" name="reply" value="2" /><br />

		<input type="submit" name="submit" value="vota!">


<?php 

$cookie = $_COOKIE['vote'];

if ($cookie == 1) {
	echo "<p>Ya has votado, no puedes volver a votar, no se contabilizarán más votos<p/>";
	echo "<p>Gracias por tu voto</p>";
} else {

	//¿Formulario enviado?
	if (isset($_POST['reply'])) {

		// guardamos nombre de archivo en la variable $file
		$file = "results.txt";
		// abrimos el archivo con permisos de escritura
		$recurso = fopen($file, "r+");
		// leemos el archivo y lo guardamos en la variable $vote
		$vote = fread($recurso, filesize($file));
		// descomponemos la string que tenemos en $vote en un array con coma como separador
		// explode convierte la string en un array
		$arr_vote = explode(",", $vote); 
		// almacemos el valor de la respuesta (0, 1 ó 2) en $reply
		$reply = $_POST['reply'];
		// le sumamos 1 al valor que guarde el array para el índice que conicida con $reply
		$arr_vote[$reply]++;
		// volvemos a montar la string
		// implode vincula elementos de la array a string
		$vote = implode(",", $arr_vote);
		// rebobinamos la posición del puntero en el archivo results.txt
		rewind($recurso);
		// sxcribimos nueva string en el archivo
		fputs($recurso, $vote);
		// cerramos el archivo
		fclose($recurso);
	}
}
 ?>
	</form>

	<p>
		<a href="results.php" target="_blank">ver resultados de la encuesta</a>
	</p>
</body>
</html>


















