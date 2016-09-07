<?php

//$lista = array(1, 2, 3, 4, 5);

$lista = [21, 5, 23, 74, 95, 6];
$lista[] = 7;
//array_push($lista, 8);

$lista[] = "PHP";

var_dump($lista);
//var_dump($lista[1]);

sort($lista);
var_dump($lista);

// -------------------
// PERCORRER LISTA
// -------------------

//for($i=0; $i<sizeof($lista); $i++) {
//	echo "Item: $lista[$i]<br>";
//}

// -------------------
// FOREACH
// -------------------

foreach($lista as $item) {
	echo "Item: $item<br>";
}

// -------------------
// RANGE
// -------------------

$numeros = range(0, 10, 2);
var_dump($numeros);

// -------------------
// ARRAY ASSOCIATIVO
// -------------------

$usuario = [
	"nome" => "Giovane",
	"sobrenome" => "Ribeiro",
	"idade" => 23,
	"curso" => "Ciência da Computação"
];
var_dump($usuario);

echo "$usuario[nome] tem $usuario[idade] anos.";

?>