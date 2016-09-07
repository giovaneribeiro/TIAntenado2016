<?php
	require('aluno.dao.php');

	function mover($mensagem) {
		$mover  = "<meta charset='utf-8'>";
		$mover .= "<script>";
		$mover .= "alert('$mensagem');";
		$mover .= "window.location = 'aluno.read.php';";
		$mover .= "</script>";

		echo $mover;
	}

	if($_GET) {
		
		if(isset($_GET['codigo'])) {

			$codigo = $_GET['codigo'];

			# Pesquisa o aluno
			$aluno = buscarAlunoPorCodigo($codigo);

			if($aluno) {
				$nome = $aluno['nome'];
				$nascimento = $aluno['nascimento'];
			}
			else {
				mover("Aluno de código: '$codigo' não existe.");
			}
		}
		else {
			mover("Não foi possível pesquisar o aluno");
		}
	}
	else if($_POST) {
		
		$codigo = $_POST['form-codigo'];
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
				"codigo" => $codigo,
				"nome" => $nome,
				"nascimento" => $nascimento
			];

			# Atualiza as informações do aluno
			$rs = atualizarAluno($aluno);

			if($rs) {
				mover("Aluno atualizado com sucesso!");
			}
			else {
				mover("Não foi possível atualizar o aluno.");
			}
		}
	}
	else {
		mover("Não foi possível realizar a ação.");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Atualizar Aluno</title>
</head>
<body>

	<p><a href="aluno.read.php">Voltar</a></p>

	<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">

		<input type="hidden" name="form-codigo" value="<?= $codigo ?>">

		<label for="nome">Nome:</label>
		<input type="text" id="nome" name="form-nome" value="<?= $nome ?>" autocomplete="off" required>

		<label for="nascimento">Nascimento:</label>
		<input type="date" id="nascimento" name="form-nascimento" value="<?= $nascimento ?>" required>

		<button type="submit">Atualizar</button>
	</form>

	<?= isset($mensagem)?"<p>$mensagem</p>":'' ?>
</body>
</html>