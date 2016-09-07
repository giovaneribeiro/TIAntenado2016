<?php
	require('../dao/categoria.dao.php');

	$categorias = buscarTodasCategorias();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Categorias</title>
</head>
<body>
	<h1>Categorias</h1>
	
	<ul>
		<li><a href="categoria.create.php">Cadastrar nova categoria</a></li>
		<li><a href="../index.php">Voltar</a></li>
	</ul>

	<?php if($categorias===false): ?>
		<p>Não foi possível buscar as categorias.</p>
	<?php else: ?>

	<table border="1">
		<tr>
			<th>Código</th>
			<th>Nome</th>
			<th>Ações</th>
		</tr>

		<?php if(sizeof($categorias)==0): ?>
			<tr>
				<td colspan="3">Não existem categorias cadastradas.</td>
			</tr>
		<?php else: ?>

			<?php foreach ($categorias as $categoria): ?>
			<tr>
				<td><?= $categoria['codigo'] ?></td>
				<td><?= $categoria['nome'] ?></td>
				<td>
					<a href="categoria.update.php?codigo=<?= $categoria['codigo'] ?>">Editar</a>
					<a href="categoria.delete.php?codigo=<?= $categoria['codigo'] ?>">Excluir</a>
				</td>
			</tr>
			<?php endforeach; ?>

		<?php endif; ?>
	</table>

	<?php endif; ?>
</body>
</html>