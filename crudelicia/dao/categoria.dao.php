<?php
	require_once('../db/conexao.php');

	function buscarTodasCategorias() {

		global $conexao;

		$categorias = [];

		if($conexao) {

			$sql = "select * from categoria";
			$rs = $conexao->query($sql);

			if($rs) {
				
				$categoria = [];
				while($registro = $rs->fetch_assoc()) {
					
					$categoria['codigo'] = $registro['codigo'];
					$categoria['nome'] = $registro['nome'];

					$categorias[] = $categoria;
				}
			}
			else {
				return false;
			}
		}

		return $categorias;
	}

	function cadastrarCategoria($categoria) {

		global $conexao;

		if($conexao) {

			$sql = "insert into categoria (nome) values ('{$categoria['nome']}')";
			$rs = $conexao->query($sql);

			if($conexao->affected_rows == 1) {
				return true;
			}
		}

		return false;
	}

	function deletarCategoriaPorCodigo($codigo) {

		global $conexao;

		if($conexao) {

			$sql = "delete from categoria where codigo = $codigo";
			$rs = $conexao->query($sql);

			if($conexao->affected_rows == 1) {
				return true;
			}
		}

		return false;
	}

	function buscarCategoriaPorCodigo($codigo) {

		global $conexao;

		if($conexao) {

			$sql = "select * from categoria where codigo = $codigo";
			$rs = $conexao->query($sql);

			if($conexao->affected_rows == 1) {
				return $rs->fetch_assoc();
			}
		}

		return false;
	}

	function atualizarCategoria($categoria) {

		global $conexao;

		if($conexao) {

			$sql = "update categoria set nome = '{$categoria['nome']}' where codigo = {$categoria['codigo']}";
			$rs = $conexao->query($sql);

			if($conexao->affected_rows == 1) {
				return true;
			}
		}

		return false;
	}

?>