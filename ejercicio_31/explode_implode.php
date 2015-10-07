<meta charset="utf-8">
<?php 

$cadena = "hola que tal como estás";

echo "Tengo una cadena de texto: {$cadena}<br>";

echo "la convierto en una array<br>";

$mi_array = explode(" ", $cadena);

echo "<pre>";

var_export($mi_array);

echo "</pre>";

echo "la vuelvo a convertir en una strig pero esta vez separada cada palabra por comas<br>";

$nueva_cadena = implode(", ", $mi_array);

echo "imprimo nuevamente la string: {$nueva_cadena}";