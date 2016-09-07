<?php
	require('../dao/produto.dao.php');

	$produtos = buscarTodosProdutos();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Produtos</title>
</head>
<body>
	<h1>Produtos</h1>

	<ul>
		<li><a href="produto.create.php">Cadastrar novo produto</a></li>
		<li><a href="../index.php">Voltar</a></li>
	</ul>

	<?php if($produtos===false): ?>
		<p>Não foi possível buscar os produtos.</p>
	<?php else: ?>

	<table border="1">
		<tr>
			<th>Código</th>
			<th>Nome</th>
			<th>Descrição</th>
			<th>Categoria</th>
			<th>Preço</th>
			<th>Ações</th>
		</tr>

		<?php if(sizeof($produtos)==0): ?>
			<tr>
				<td colspan="6">Não existem produtos cadastrados.</td>
			</tr>
		<?php else: ?>

			<?php foreach ($produtos as $produto): ?>
			<tr>
				<td><?= $produto['codigo'] ?></td>
				<td><?= $produto['nome'] ?></td>
				<td><?= $produto['descricao'] ?></td>
				<td><?= $produto['categoria'] ?></td>
				<td><?= 'R$ ' . number_format($produto['preco'], 2, ',', '') ?></td>
				<td>
					<a href="produto.update.php?codigo=<?= $produto['codigo'] ?>">Editar</a>
					<a href="produto.delete.php?codigo=<?= $produto['codigo'] ?>">Excluir</a>
				</td>
			</tr>
			<?php endforeach; ?>

		<?php endif; ?>
	</table>

	<?php endif; ?>
</body>
</html>