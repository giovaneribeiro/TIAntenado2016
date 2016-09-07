<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1>CRUDelicia</h1>
	<?php
		$menu = [
			[
				"nome" => "Categoria",
				"link" => "view/categoria.read.php"
			],
			[
				"nome" => "Produto",
				"link" => "view/produto.read.php"
			],
			[
				"nome" => "Cardápio",
				"link" => "view/cardapio.php"
			]
		];
	?>
	<ul>
		<?php foreach ($menu as $item): ?>
			<li><a href="<?= $item['link'] ?>"><?= $item['nome'] ?></a></li>
		<?php endforeach; ?>
	</ul>
</body>
</html>