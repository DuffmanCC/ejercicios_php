<html>
<head>

<title>Mi album de fotografias</title>
<meta charset="utf-8">

</head>

<body>
	<h1> Mi album de fotos en linea </h1>
	<h3> Cargar archivo </h3>
	
	<form action='<?php echo $_SERVER['PHP_SELF'] ?>' method="post" enctype="multipart/form-data">
		<!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
    	<input type="hidden" name="MAX_FILE_SIZE" value="200000" />
		<input type="file" name="archivo" />
		<input type="submit" name="submit" value="Cargar archivo" />
	</form>


<?php 

$ruta="img/";
// el array global $_FILES contendrá toda la información de los los ficheros subidos.
// si hemos cargado un archivo y su tamaño es mayor que 0
if (isset($_FILES['archivo']) && $_FILES['archivo']['size'] > 0) {
	
	$tamanyomax = 200000; // Indicar tamaño en bytes
	$nombretemp = $_FILES['archivo']['tmp_name'];
	$nombrearchivo = $_FILES['archivo']['name'];
	$tamanyoarchivo = $_FILES['archivo']['size'];

	// getimagesize() devuelve un array de hasta 7 elementos. No todos los tipos de imagen incluirán los elementos channels y bits. El índice 2 indica el tipo de imagen.
	$tipoarchivo = GetImageSize( $nombretemp );

	// si es gif o jpg
	if ($tipoarchivo[2] == 1 || $tipoarchivo[2] == 2) {
		if ($tamanyoarchivo <= $tamanyomax) {

			// move_upload_file intenta asegurarse de que el archivo designado es un archivo subido válido (lo que significa que fue subido mediante el mecanismo de subida HTTP POST de PHP). Si el archivo es válido, será movido al nombre de archivo dado.
			if (move_uploaded_file($nombretemp, $ruta.$nombrearchivo)) {
				echo "<p>El archivo se ha cargado <b>con exito</b>.<br>
				Tamaño de archivo: <b>$tamanyoarchivo</b> bytes,<br>
				Nombre de imagen: <b>$nombrearchivo</b><br></p>";
			} else {
				echo "<p>No se ha podido cargar el archivo.</p>";
			}
		} else {
			echo "<p>El archivo tiene mas de <b>$tamanyomax bytes</b> y es demasiado grande.</p>";
		}
	} else {
		echo "<p>No es un archivo GIF o JPG valido.</p>";
	}
	echo "<form action='{$_SERVER['PHP_SELF']}' method='post'>
	<input type='submit' value='OK'></form>";
}

$filehandle = opendir($ruta); // Abrir archivos

while ($file = readdir($filehandle)) {
	if ($file != "." && $file != "..") {
		$tamanyo = GetImageSize($ruta.$file);
		echo "<p><img src='$ruta$file' $tamanyo[3]><br></p>\n";
	}
}

closedir($filehandle); // Fin lectura de archivos


 ?>
</body>
</html>