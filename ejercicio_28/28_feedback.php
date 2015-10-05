<html>
<head>
	<title>Feedback-Mailer</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
</head>

<body>
	<h1>Feedback-Mailer</h1>
	<h2>¡Enviame un e-mail!</h2>
	<form action="" method="post">
		<label for="Mail">Tu direcciòn de e-mail:</label>
		<input type="text" name="Mail" >
		<br>
		<label for="message">Tu comentario:</label>
		<br>
		<textarea name="message" cols="50" rows="5"></textarea>
		<br>
		<input type="submit" value="Enviar">
	</form>

<?php
$receiver_mail = "tudireccion@tudominio.es"; // escribe aqui tu dirección
if (isset($_POST['Mail']) && $_POST['message'] != "") {
	if (mail ($receiver_mail, "¡Tienes correo nuevo!", $_POST['message'], "From:$_POST[Mail]")) {
		echo "<p>Gracias por enviarme tu opiniòn.</p>\n";
	} else {
		echo "<p>Lo siento, ha ocurrido un error.</p>\n";
	}
}
?>

</body>
</html>