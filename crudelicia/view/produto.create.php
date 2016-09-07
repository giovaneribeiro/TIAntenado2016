<?php
	require('../dao/produto.dao.php');
	require('../dao/categoria.dao.php');

	$categorias = buscarTodasCategorias();

	if($_POST) {

		$nome = trim($_POST['form-nome']);
		$descricao = trim($_POST['form-descricao']);
		$categoria = $_POST['form-categoria'];
		$preco = str_replace(',', '.', trim($_POST['form-preco']));

		if(strlen($nome) == 0) {
			$mensagem = "Não deixe o campo nome vazio.";
		}
		else if(strlen($preco) == 0 || !is_numeric($preco)) {
			$mensagem = "Preencha corretamente o campo preço.";
		}
		else {
			
			$produto = [
				'nome' => $nome,
				'descricao' => $descricao,
				'categoria' => $categoria,
				'preco' => $preco
			];

			$rs = cadastrarProduto($produto);
			
			if($rs) {
				$mensagem = "Produto cadastrado com sucesso!";
			}
			else {
				$mensagem = "Não foi possível cadastrar o produto.";
			}
		}
	}
	else {
		# Valores padrões
		$nome = $descricao = $categoria = "";
		$preco = '0,00';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastrar Produto</title>
</head>
<body>
	<h1>Cadastrar Produto</h1>

	<ul>
		<li><a href="produto.read.php">Voltar</a></li>
	</ul>

	<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
		<label for="nome">Nome:</label>
		<input type="text" id="nome" name="form-nome" value="<?= $nome ?>" autocomplete="off" required>

		<label for="descricao">Descrição:</label>
		<input type="text" id="descricao" name="form-descricao" value="<?= $descricao ?>" autocomplete="off">

		<label for="categoria">Categoria:</label>
		<select id="categoria" name="form-categoria">
			<?php foreach($categorias as $categoria): ?>
				<option value="<?= $categoria['codigo'] ?>"><?= $categoria['nome'] ?></option>
			<?php endforeach; ?>
		</select>

		<label for="preco">Preço:</label>
		<input type="text" id="preco" name="form-preco" value="<?= $preco ?>" autocomplete="off" required>

		<button type="submit">Cadastrar</button>
	</form>

	<?= isset($mensagem)?"<p>$mensagem</p>":'' ?>
</body>
</html>