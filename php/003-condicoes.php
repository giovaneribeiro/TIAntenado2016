<meta charset="utf-8">
<?php

$i = -2;
$j = 1;

// == IGUAL
// != DIFERENTE
// <> DIFERENTE
// >  MAIOR
// <  MENOR
// >= MAIOR OU IGUAL
// <= MENOR OU IGUAL

// ---------------------
// IF ELSEIF ELSE
// ---------------------

if($i > $j) {
	echo "i maior que j";
}
else if($i < $j) {
	echo "i menor que j";
}
else {
	echo "i e j sao iguais";
}
echo "<br>";

// === IDENTICO
// !== NAO IDENTICO

$n = -1;
$m = "-1";

if($n === $m) {
	echo "sao identicos";
}
elseif($n == $m) {
	echo "sao iguais";
}
elseif($n !== $m) {
	echo "nao sao identicos";
}
elseif($n != $m) {
	echo "sao diferentes";
}
echo "<br>";

// ---------------------
// SWITCH
// ---------------------

$i = 4;

switch($i) {
	case 1:
		echo "igual a 1";
		break;
	case 2:
		echo "igual a 2";
		break;
	default:
		echo "diferente de 1 e 2";
}

// ---------------------
// OPERADOR TERNARIO
// ---------------------

# CONDICAO?VERDADEIRO:FALSO

echo "<p>";
echo (1==1?"SIM":"NÃO");
echo "</p>";

?>