<meta charset="utf-8">
<?php 

$file = "results.txt";
$recurso = fopen($file, "r+");
$vote = fread($recurso, filesize($file));
$arr_vote = explode(",", $vote);
$opcion_a = $arr_vote[0];
$opcion_b = $arr_vote[1];
$opcion_c = $arr_vote[2];

echo "han votado la opción A: {$opcion_a} personas<br>";
echo "han votado la opción B: {$opcion_b} personas<br>";
echo "han votado la opción C: {$opcion_c} personas<br>";




 ?>