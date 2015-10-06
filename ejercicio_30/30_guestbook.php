<html>
<head>
	<title>Un libro de visitas muy sencillo</title>
	<meta charset="utf-8">
</head>

<body>
	<h1>Libro de Visitas</h1>

	<form action="" method="POST">
		<label for="comment">Tu comentario:</label><br>
		<textarea name="comment" id="" cols="30" rows="10"></textarea><br>
		<label for="nombre">Tu nombre:</label><br>
		<input type="text" name="nombre"><br>
		<input type="submit" value="enviar">
	</form>

	<h3>Mostrar todos los comentarios</h3>

	<?php 

	$file = "guestbook.txt";
	$comentario = $_POST['comment'];
	$nombre = $_POST['nombre'];
	$date_of_entry = date('j F o');
	$entry = "<p><b>{$nombre}</b> escribió el {$date_of_entry}: {$comentario}</p>";


	echo "<br>";

	if ($comentario != "" && $nombre != "") {
		// abrir el archivo
		$recurso = fopen($file, "r+");

		// leo los datos y los almaceno en una variable.
		$old = fread($recurso, filesize($file));

		// el cursor salta al principio
		rewind($recurso);

		// escribir en la nueva entrada antes de las antiguas
		fputs($recurso, "$entry \n $old");
		
		// cierro el archivo
		fclose($recurso);
	} else {
		echo "Falta por rellenar algo<br>";
	}

	// muestro el archivo
	readfile($file);


	 ?>
</body>