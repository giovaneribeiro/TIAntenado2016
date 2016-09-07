<meta charset="utf-8">
<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "tiantenado";

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

if($conexao) {
	echo "Conectado com sucesso!<br>";

	// ---------------------------
	// INSERT / CREATE
	// ---------------------------

	/*$insert = "insert into aluno (nome, nascimento) values ('Maria Alice', '2001-01-01')";
	$rs = $conexao->query($insert);

	if($rs) {
		echo "Aluno cadastrado com sucesso.";
	}
	else {
		echo "Não foi possível cadastrar aluno.";
	}*/

	// ---------------------------
	// UPDATE
	// ---------------------------

	/*$codigo = 4;
	$update = "update aluno set nome = 'Pedro', nascimento = '1992-02-16' where codigo = $codigo";
	$rs = $conexao->query($update);

	if($rs) {
		echo "Aluno atualizado com sucesso.";
	}
	else {
		echo "Não foi possível atualizar aluno.";
	}*/

	// ---------------------------
	// DELETE
	// ---------------------------

	/*$codigo = 5;
	$delete = "delete from aluno where codigo = $codigo";

	$rs = $conexao->query($delete);

	if($rs) {
		echo "Aluno excluído com sucesso.";
	}
	else {
		echo "Não foi possível excluir aluno.";
	}*/

	// ---------------------------
	// SELECT / READ / RETRIEVE
	// ---------------------------

	/*$select = "select * from aluno";

	$rs = $conexao->query($select);

	if($rs) {

		if(sizeof($rs) == 0) {
			echo "Não há alunos cadastrados";
		}
		else {

			while($aluno = $rs->fetch_assoc()) {
				echo "<p>$aluno[nome] nasceu dia " .formatarData($aluno['nascimento']). "<br>";
			}
		}
	}
	else {
		echo "Não foi possível buscar alunos.";
	}*/
}
else {
	echo "Não foi possível conectar ao banco de dados.";
}

function formatarData($data) {
	$aux = explode("-", $data);
	return "$aux[2]/$aux[1]/$aux[0]";
}

?>

<!--

create database tiantenado;

use tiantenado;

create table aluno (
codigo int primary key auto_increment,
nome varchar(64) not null,
nascimento date
);

select * from aluno;

insert into aluno (nome, nascimento) values ('Giovane Ribeiro', '1993-08-18');

update aluno set nome = 'Maria Alice', nascimento = '1996-02-04' where codigo = 3;

delete from aluno where codigo = 5;

-->