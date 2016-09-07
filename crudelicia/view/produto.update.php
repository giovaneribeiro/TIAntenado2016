<?php
	require('../dao/produto.dao.php');
	require('../dao/categoria.dao.php');

	$categorias = buscarTodasCategorias();

	function mover($mensagem) {
		$mover  = "<meta charset='utf-8'>";
		$mover .= "<script>";
		$mover .= "alert('$mensagem');";
		$mover .= "window.location = 'produto.read.php';";
		$mover .= "</script>";

		echo $mover;
	}

	if($_GET) {
		
		if(isset($_GET['codigo'])) {

			$codigo = $_GET['codigo'];

			# Pesquisa a categoria
			$produto = buscarProdutoPorCodigo($codigo);

			if($produto) {
				$nome = $produto['nome'];
				$descricao = $produto['descricao'];
				$codigo_categoria = $produto['codigo_categoria'];
				$categoria = $produto['categoria'];
				$preco = $produto['preco'];
			}
			else {
				mover("Produto de código: '$codigo' não existe.");
			}
		}
		else {
			mover("Não foi possível pesquisar o produto");
		}
	}
	else if($_POST) {
		
		$codigo = $_POST['form-codigo'];
		$nome = trim($_POST['form-nome']);
		$descricao = trim($_POST['form-descricao']);
		$codigo_categoria = $_POST['form-categoria'];
		$preco = str_replace(',', '.', trim($_POST['form-preco']));

		if(strlen($nome) == 0) {
			$mensagem = "Não deixe o campo nome vazio.";
		}
		else if(strlen($preco) == 0 || !is_numeric($preco)) {
			$mensagem = "Preencha corretamente o campo preço.";
		}
		else {
			
			$produto = [
				"codigo" => $codigo,
				"nome" => $nome,
				"descricao" => $descricao,
				"categoria" => $codigo_categoria,
				"preco" => $preco
			];

			# Atualiza as informações do produto
			$rs = atualizarProduto($produto);

			if($rs) {
				mover("Produto atualizado com sucesso!");
			}
			else {
				mover("Não foi possível atualizar o produto.");
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
	<title>Atualizar Produto</title>
</head>
<body>
	<h1>Atualizar Produto</h1>

	<ul>
		<li><a href="produto.read.php">Voltar</a></li>
	</ul>

	<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">

		<input type="hidden" name="form-codigo" value="<?= $codigo ?>">

		<label for="nome">Nome:</label>
		<input type="text" id="nome" name="form-nome" value="<?= $nome ?>" autocomplete="off" required>

		<label for="descricao">Descrição:</label>
		<input type="text" id="descricao" name="form-descricao" value="<?= $descricao ?>" autocomplete="off">

		<label for="categoria">Categoria:</label>
		<select id="categoria" name="form-categoria">
			<?php foreach($categorias as $categoria): ?>
				<option value="<?= $categoria['codigo'] ?>" <?= ($categoria['codigo']==$codigo_categoria?'selected':'') ?>>
					<?= $categoria['nome'] ?>
				</option>
			<?php endforeach; ?>
		</select>

		<label for="preco">Preço:</label>
		<input type="text" id="preco" name="form-preco" value="<?= number_format($preco, 2, ',', '') ?>" autocomplete="off" required>

		<button type="submit">Atualizar</button>
	</form>

	<?= isset($mensagem)?"<p>$mensagem</p>":'' ?>
</body>
</html>