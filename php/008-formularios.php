<?php

if(isset($_GET['form-codigo'])) {

	$codigo = $_GET['form-codigo'];

	if(strlen(trim($codigo)) < 5) {
		$mensagem = "O código deve ter pelo menos 5 dígitos!";
	}
	else {
		$mensagem = "O código pesquisado foi: $codigo";
	}
}

if(isset($_GET['form-ano'])) {

	$ano = $_GET['form-ano'];
	var_dump($ano);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>HTML + PHP</title>
</head>
<body>
	<form method="GET" action="<?= $_SERVER['PHP_SELF'] ?>">
		<label for="codigo">Código:</label>
		<input type="text" id="codigo" name="form-codigo" autocomplete="off">

		<label for="ano">Ano de nascimento:</label>
		<select id="ano" name="form-ano">
			<?php foreach(range(date('Y'), 1993, -1) as $contador): ?>
				<option><?= $contador ?></option>
			<?php endforeach; ?>
		</select>

		<button type="submit">Pesquisar</button>
	</form>

	<?= isset($mensagem)?'<p>'.$mensagem.'</p>':'' ?>
</body>
</html>