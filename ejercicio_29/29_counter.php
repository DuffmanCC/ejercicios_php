<html>
<head>
	<title>Contador Sencillo</title>
</head>
<body>
	<h1>Contador Sencillo</h1>
	<p>Cantidad de visitas:
		<b>
		<?php
		// fopen — Abre un fichero o un URL,
		// r+ = Apertura para lectura y escritura; 
		// coloca el puntero al fichero al principio del fichero.
		$archivo = "counter.txt";
		$recurso = fopen($archivo, "r+");
		$bytes_totales = filesize($archivo);
		$contador = fread($recurso, $bytes_totales);
		$nuevo_contenido = $contador + 1;
		$posicion_actual = ftell($recurso);

		if ($posicion_actual == $bytes_totales){
			// me muevo al byte 0 para sobreescribir el archivo
			fseek($recurso, 0);
		}

		fwrite($recurso, $nuevo_contenido);
		fclose($recurso);

		echo $nuevo_contenido;
		?>
		</b>
	</p>
</body>
</html>