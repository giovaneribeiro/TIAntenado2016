<?php
	require('../dao/categoria.dao.php');

	function mover($mensagem) {
		$mover  = "<meta charset='utf-8'>";
		$mover .= "<script>";
		$mover .= "alert('$mensagem');";
		$mover .= "window.location = 'categoria.read.php';";
		$mover .= "</script>";

		echo $mover;
	}

	if($_GET) {
		
		if(isset($_GET['codigo'])) {

			$codigo = $_GET['codigo'];

			# Pesquisa a categoria
			$categoria = buscarCategoriaPorCodigo($codigo);

			if($categoria) {
				$nome = $categoria['nome'];
			}
			else {
				mover("Categoria de código: '$codigo' não existe.");
			}
		}
		else {
			mover("Não foi possível pesquisar a categoria");
		}
	}
	else if($_POST) {
		
		$codigo = $_POST['form-codigo'];
		$nome = trim($_POST['form-nome']);

		if(strlen($nome) == 0) {
			$mensagem = "Não deixe o campo nome vazio.";
		}
		else {
			
			$categoria = [
				"codigo" => $codigo,
				"nome" => $nome
			];

			# Atualiza as informações da categoria
			$rs = atualizarCategoria($categoria);

			if($rs) {
				mover("Categoria atualizada com sucesso!");
			}
			else {
				mover("Não foi possível atualizar a categoria.");
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
	<title>Atualizar Categoria</title>
</head>
<body>
	<h1>Atualizar Categoria</h1>

	<ul>
		<li><a href="categoria.read.php">Voltar</a></li>
	</ul>

	<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">

		<input type="hidden" name="form-codigo" value="<?= $codigo ?>">

		<label for="nome">Nome:</label>
		<input type="text" id="nome" name="form-nome" value="<?= $nome ?>" autocomplete="off" required>

		<button type="submit">Atualizar</button>
	</form>

	<?= isset($mensagem)?"<p>$mensagem</p>":'' ?>
</body>
</html>