<?php
	require('../dao/produto.dao.php');

	function mover($mensagem) {
		$mover  = "<meta charset='utf-8'>";
		$mover .= "<script>";
		$mover .= "alert('$mensagem');";
		$mover .= "window.location = 'produto.read.php';";
		$mover .= "</script>";

		echo $mover;
	}

	if(isset($_GET['codigo'])) {
		
		$rs = deletarProdutoPorCodigo($_GET['codigo']);

		if($rs) {
			mover("Produto excluído com sucesso!");
		}
		else {
			mover("Não foi possível excluir o produto.");
		}
	}
	else {
		mover("Não foi possível realizar a ação.");
	}
?>