<?php
	require('aluno.dao.php');

	if($_POST) {

		$nome = trim($_POST['form-nome']);
		$nascimento = $_POST['form-nascimento'];

		if(strlen($nome) == 0) {
			$mensagem = "Não deixe o campo nome vazio.";
		}
		else if(strlen($nascimento) != 10) {
			$mensagem = "Preencha corretamente o campo nascimento.";
		}
		else {
			
			$aluno = [
				'nome' => $nome, 
				'nascimento' => $nascimento
			];

			$rs = cadastrarAluno($aluno);
			
			if($rs) {
				$mensagem = "Aluno cadastrado com sucesso!";
			}
			else {
				$mensagem = "Não foi possível cadastrar o aluno.";
			}
		}
	}
	else {
		# Valores padrões
		$nome = $nascimento = "";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inserir Aluno</title>
</head>
<body>

	<p><a href="aluno.read.php">Voltar</a></p>

	<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
		<label for="nome">Nome:</label>
		<input type="text" id="nome" name="form-nome" value="<?= $nome ?>" autocomplete="off" required>

		<label for="nascimento">Nascimento:</label>
		<input type="date" id="nascimento" name="form-nascimento" value="<?= $nascimento ?>" required>

		<button type="submit">Cadastrar</button>
	</form>

	<?= isset($mensagem)?"<p>$mensagem</p>":'' ?>
</body>
</html>