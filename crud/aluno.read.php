<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alunos</title>
</head>
<body>
<?php
	//error_reporting(0);
	require('aluno.dao.php');

	function formatarData($data) {
		$aux = explode('-', $data);
		return ($aux[2] . '/' . $aux[1] . '/' . $aux[0]);
	}

	$alunos = buscarTodosAlunos();
?>

	<p><a href="aluno.create.php">Cadastrar novo aluno</a></p>

	<?php if($alunos===false): ?>
		<p>Não foi possível buscar alunos.</p>
	<?php else: ?>

	<table border="1">
		<tr>
			<th>Código</th>
			<th>Nome</th>
			<th>Nascimento</th>
			<th>Ações</th>
		</tr>

		<?php if(sizeof($alunos)==0): ?>
			<tr>
				<td colspan="4">Não existem alunos cadastrados.</td>
			</tr>
		<?php else: ?>

			<?php foreach ($alunos as $aluno): ?>
			<tr>
				<td><?= $aluno['codigo'] ?></td>
				<td><?= $aluno['nome'] ?></td>
				<td><?= formatarData($aluno['nascimento']) ?></td>
				<td>
					<a href="aluno.update.php?codigo=<?= $aluno['codigo'] ?>">Editar</a>
					<a href="aluno.delete.php?codigo=<?= $aluno['codigo'] ?>">Excluir</a>
				</td>
			</tr>
			<?php endforeach; ?>

		<?php endif; ?>
	</table>

	<?php endif; ?>
</body>
</html>