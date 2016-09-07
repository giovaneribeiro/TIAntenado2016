<?php
	require('../dao/categoria.dao.php');

	if($_POST) {

		$nome = trim($_POST['form-nome']);

		if(strlen($nome) == 0) {
			$mensagem = "Não deixe o campo nome vazio.";
		}
		else {
			
			$categoria = [
				'nome' => $nome
			];

			$rs = cadastrarCategoria($categoria);
			
			if($rs) {
				$mensagem = "Categoria cadastrada com sucesso!";
			}
			else {
				$mensagem = "Não foi possível cadastrar a categoria.";
			}
		}
	}
	else {
		# Valores padrões
		$nome = "";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastrar Categoria</title>
</head>
<body>
	<h1>Cadastrar Categoria</h1>

	<ul>
		<li><a href="categoria.read.php">Voltar</a></li>
	</ul>

	<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
		<label for="nome">Nome:</label>
		<input type="text" id="nome" name="form-nome" value="<?= $nome ?>" autocomplete="off" required>

		<button type="submit">Cadastrar</button>
	</form>

	<?= isset($mensagem)?"<p>$mensagem</p>":'' ?>
</body>
</html>