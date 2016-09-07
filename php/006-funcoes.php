<meta charset="utf-8">
<?php

# Sem retorno
function somar($num1, $num2) {
	echo "Soma: " . ($num1+$num2) . "<br>";
}
somar(234, 3);

# Com retorno
function subtrair($num1, $num2) {
	return $num1 - $num2;
}
echo "Subtração: " . subtrair(10, 8) . "<br>";

# Valor Padrão
function multiplicar($a, $b = 2) {
	return $a * $b;
}
echo "Multiplicação: " . multiplicar(2) . "<br>";

# Escopo
$idade = 19;
$i = 0;
function buscarIdade() {
	global $idade, $i;

	$i = 12;

	return $idade;
}
echo buscarIdade();
echo $i;

?>