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

	if(isset($_GET['codigo'])) {
		
		$rs = deletarCategoriaPorCodigo($_GET['codigo']);

		if($rs) {
			mover("Categoria excluída com sucesso!");
		}
		else {
			mover("Não foi possível excluir a categoria.");
		}
	}
	else {
		mover("Não foi possível realizar a ação.");
	}
?>