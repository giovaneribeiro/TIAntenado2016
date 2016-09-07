<?php
	require_once('conexao.php');

	function buscarTodosAlunos() {

		global $conexao;

		$alunos = [];

		if($conexao) {

			$sql = "select * from aluno";
			$rs = $conexao->query($sql);

			if($rs) {
				
				$aluno = [];
				while($registro = $rs->fetch_assoc()) {
					
					$aluno['codigo'] = $registro['codigo'];
					$aluno['nome'] = $registro['nome'];
					$aluno['nascimento'] = $registro['nascimento'];

					$alunos[] = $aluno;
				}
			}
			else {
				return false;
			}
		}

		return $alunos;
	}

	function cadastrarAluno($aluno) {

		global $conexao;

		if($conexao) {

			$sql = "insert into aluno (nome, nascimento) values ('{$aluno['nome']}', '{$aluno['nascimento']}')";
			$rs = $conexao->query($sql);

			if($conexao->affected_rows == 1) {
				return true;
			}
		}

		return false;
	}

	function deletarAlunoPorCodigo($codigo) {

		global $conexao;

		if($conexao) {

			$sql = "delete from aluno where codigo = $codigo";
			$rs = $conexao->query($sql);

			if($conexao->affected_rows == 1) {
				return true;
			}
		}

		return false;
	}

	function buscarAlunoPorCodigo($codigo) {

		global $conexao;

		if($conexao) {

			$sql = "select * from aluno where codigo = $codigo";
			$rs = $conexao->query($sql);

			if($conexao->affected_rows == 1) {
				return $rs->fetch_assoc();
			}
		}

		return false;
	}

	function atualizarAluno($aluno) {

		global $conexao;

		if($conexao) {

			$sql = "update aluno set nome = '{$aluno['nome']}', nascimento = '{$aluno['nascimento']}' where codigo = {$aluno['codigo']}";
			$rs = $conexao->query($sql);

			if($conexao->affected_rows == 1) {
				return true;
			}
		}

		return false;
	}

?>