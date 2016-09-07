<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>HTML + PHP</title>
</head>
<body>
	<h1>
		<?php echo "Hello, World."; ?>
	</h1>

	<?php
		$lista = [
			['item' => 'Página Inicial', 		'link' => 'index.php'], 
			['item' => 'Blog', 					'link' => 'blog.php'], 
			['item' => 'Galeria', 				'link' => 'galeria.php'], 
			['item' => 'Sobre Nós', 			'link' => 'sobre-nos.php'],
			['item' => 'Fale conosco', 			'link' => 'fale-conosco.php'],
			['item' => 'Pesquise no Google', 	'link' => 'http://www.google.com.br']
		];

		echo "<ul>";
		foreach($lista as $menu) {
			echo "<li><a href='$menu[link]'>$menu[item]</a></li>";
		}
		echo "</ul>";
	?>

	<ul>
		<?php foreach($lista as $menu) { ?>
			<li><a href="<?= $menu['link'] ?>"><?= $menu['item'] ?></a></li>
		<?php } ?>
	</ul>

	<p>
		<?php if(sizeof($lista) >= 10): ?>
			Lista possui 10 ou mais itens.
		<?php else: ?>
			Lista possui menos de 10 itens.
		<?php endif; ?>
	</p>

	<?php
		$cabecalho = range(1993, 1999, 1);
		array_unshift($cabecalho, 'Meses');

		$meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'];
	?>

	<table border="1">
		<tr>
			<?php foreach($cabecalho as $coluna): ?>
				<th><?= $coluna ?></th>
			<?php endforeach; ?>
		</tr>
		<?php foreach($meses as $mes): ?>
			<tr>
				<td><?= $mes ?></td>
				<?php
					for($i=1; $i<sizeof($cabecalho); $i++) {
						echo "<td>R$ ". number_format(rand(0, 600), 2, ',', '.') ."</td>";
					}
				?>
			</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>