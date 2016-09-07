<?php
	require_once('../db/conexao.php');

	function buscarTodosProdutos() {

		global $conexao;

		$produtos = [];

		if($conexao) {

			$sql = "select p.codigo, p.nome, p.descricao, c.nome as categoria, p.preco from produto p inner join categoria c where p.categoria = c.codigo";
			$rs = $conexao->query($sql);

			if($rs) {
				
				$produto = [];
				while($registro = $rs->fetch_assoc()) {
					
					$produto['codigo'] = $registro['codigo'];
					$produto['nome'] = $registro['nome'];
					$produto['descricao'] = $registro['descricao'];
					$produto['categoria'] = $registro['categoria'];
					$produto['preco'] = $registro['preco'];

					$produtos[] = $produto;
				}
			}
			else {
				return false;
			}
		}

		return $produtos;
	}

	function cadastrarProduto($produto) {

		global $conexao;

		if($conexao) {

			$sql = "insert into produto (nome, descricao, categoria, preco) values ('{$produto['nome']}', '{$produto['descricao']}', {$produto['categoria']}, {$produto['preco']})";
			$rs = $conexao->query($sql);

			if($conexao->affected_rows == 1) {
				return true;
			}
		}

		return false;
	}

	function deletarProdutoPorCodigo($codigo) {

		global $conexao;

		if($conexao) {

			$sql = "delete from produto where codigo = $codigo";
			$rs = $conexao->query($sql);

			if($conexao->affected_rows == 1) {
				return true;
			}
		}

		return false;
	}

	function buscarProdutoPorCodigo($codigo) {

		global $conexao;

		if($conexao) {

			$sql = "select p.codigo, p.nome, p.descricao, c.codigo as codigo_categoria, c.nome as categoria, p.preco from produto p inner join categoria c where p.categoria = c.codigo and p.codigo = $codigo";
			$rs = $conexao->query($sql);

			if($conexao->affected_rows == 1) {
				return $rs->fetch_assoc();
			}
		}

		return false;
	}

	function atualizarProduto($produto) {

		global $conexao;

		if($conexao) {

			$sql = "update produto set nome = '{$produto['nome']}', descricao = '{$produto['descricao']}', categoria = {$produto['categoria']}, preco = {$produto['preco']} where codigo = {$produto['codigo']}";
			$rs = $conexao->query($sql);

			if($conexao->affected_rows == 1) {
				return true;
			}
		}

		return false;
	}

	function buscarProdutosPorFiltros($descricao, $categoria, $faixa) {

		global $conexao;

		$produtos = [];

		if($conexao) {
			$sql  = "select produto.codigo, produto.nome, produto.descricao, categoria.nome as categoria, produto.preco";
			$sql .= " from produto inner join categoria";
			$sql .= " where produto.categoria = categoria.codigo";
			$sql .= " and (produto.nome like '%".$descricao."%' or produto.descricao like '%".$descricao."%')";
			
			if($categoria > 0) {
				$sql .= " and categoria.codigo = " . $categoria;
			}
			
			switch($faixa) {
				case 1:
					$sql .= " and preco between 0 and 15;";
					break;
				case 2:
					$sql .= " and preco between 15 and 35;";
					break;
				case 3:
					$sql .= " and preco between 35 and 75;";
					break;
				case 4:
					$sql .= " and preco > 75;";
					break;
				default:
					$sql .= " ;";
			}

			$rs = $conexao->query($sql);

			while($registro = $rs->fetch_assoc()) {

				$produto = [];

				$produto['codigo'] = $registro['codigo'];
				$produto['nome'] = $registro['nome'];
				$produto['descricao'] = $registro['descricao'];
				$produto['categoria'] = $registro['categoria'];
				$produto['preco'] = $registro['preco'];

				$produtos[] = $produto;
			}

		}

		return $produtos;
	}

?>