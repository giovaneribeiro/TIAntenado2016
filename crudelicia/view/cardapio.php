<?php
	require('../dao/categoria.dao.php');
	require('../dao/produto.dao.php');

	$categorias = buscarTodasCategorias();

	if($_POST) {

		$descricao = $_POST['form-descricao'];
		$codigo_categoria = $_POST['form-categoria'];
		$faixa = $_POST['form-faixa'];

		$produtos = buscarProdutosPorFiltros($descricao, $codigo_categoria, $faixa);
	}
	else {
		$produtos = []; //buscarTodosProdutos();
		$descricao = "";
		$codigo_categoria = $faixa = 0;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cardápio</title>
</head>
<body>
	<h1>Cardápio</h1>

	<ul>
		<li><a href="../index.php">Voltar</a></li>
	</ul>

	<form method="POST" action="cardapio.php">
		<label for="descricao">Palavra-chave:</label>
		<input type="text" id="descricao" name="form-descricao" value="<?= $descricao ?>">

		<label for="categoria">Categoria:</label>
		<select id="categoria" name="form-categoria">
			<option value="0">Todas</option>
			<?php foreach($categorias as $categoria): ?>
				<option value="<?= $categoria['codigo'] ?>" <?= ($categoria['codigo']==$codigo_categoria?'selected':'') ?>>
					<?= $categoria['nome'] ?>
				</option>
			<?php endforeach; ?>
		</select>

		<label for="faixa">Faixa de preço:</label>
		<select id="faixa" name="form-faixa">
			<option value="0">Todas</option>
			<option value="1" <?= $faixa==1?'selected':'' ?>>Até R$ 15</option>
			<option value="2" <?= $faixa==2?'selected':'' ?>>De R$ 15 a R$ 35</option>
			<option value="3" <?= $faixa==3?'selected':'' ?>>De R$ 35 a R$ 75</option>
			<option value="4" <?= $faixa==4?'selected':'' ?>>Acima de R$ 75</option>
		</select>

		<button type="submit">Procurar</button>
	</form>

	<?php if(sizeof($produtos) > 0): ?>

		<h2>Resultados da pesquisa</h2>

		<table border="1">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Categoria</th>
					<th>Preço</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($produtos as $produto): ?>
				<tr>
					<td><?= $produto['nome'] ?></td>
					<td><?= $produto['descricao'] ?></td>
					<td><?= $produto['categoria'] ?></td>
					<td><?= "R$ " . number_format($produto['preco'], 2, '.', ''); ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	<?php else: ?>
		<p>Não há resultados para a pequisa.</p>
	<?php endif; ?>
</body>
</html>