<meta charset="utf-8">
<?php

// ---------------------
// WHILE
// ---------------------

$i = 10;

while($i>0) {
	echo $i . "<br>";
	$i--;
}

// ---------------------
// DO WHILE
// ---------------------

$estouFazendo = "guerra";

do {
	echo "Faça amor, não faça " . $estouFazendo . "<br>";
	$estouFazendo = "amor";
}
while($estouFazendo != "amor");

// ---------------------
// FOR
// ---------------------

for($j=1; $j<=10; $j++) {
	echo $j . ($j==1?" elefante incomoda":" elefantes incomodam") . " muita gente. " . ($j+1) . " elefantes incomodam muito mais...<br>";
}

?>