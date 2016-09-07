<?php

	define('HOST', 'localhost');
	define('USUARIO', 'root');
	define('SENHA', '');
	define('BANCO', 'tiantenado');

	$conexao = mysqli_connect(HOST, USUARIO, SENHA, BANCO)
		or die ("Não foi possível estabelecer conexão!");
?>