<?php
	require('aluno.dao.php');

	function mover($mensagem) {
		$mover  = "<meta charset='utf-8'>";
		$mover .= "<script>";
		$mover .= "alert('$mensagem');";
		$mover .= "window.location = 'aluno.read.php';";
		$mover .= "</script>";

		echo $mover;
	}

	if(isset($_GET['codigo'])) {
		
		$rs = deletarAlunoPorCodigo($_GET['codigo']);

		if($rs) {
			mover("Aluno excluído com sucesso!");
		}
		else {
			mover("Não foi possível excluir o aluno.");
		}
	}
	else {
		mover("Não foi possível realizar a ação.");
	}
?>