<?php

// Validação do servidor simples
if ($_REQUEST["nome_cliente"] == "")
{
	echo "Nome do cliente em branco.";
	exit;
}
if (strlen($_REQUEST["cpf_cliente"]) != 11)
{
	echo "CPF do cliente precisa ter 11 caracteres.";
	exit;
}
if (!str_contains($_REQUEST["email_cliente"], '@') || !str_contains($_REQUEST["email_cliente"], '.'))
{
	echo "Email inválido.";
	exit;
}
if ($_REQUEST["data_nascimento_cliente"] == "")
{
	echo "Data de nascimento em branco.";
	exit;
}

// Banco de Dados PostgreSQL
$dsn = "pgsql:dbname=klooke;host=127.0.0.1";
$user = "klooke";
$password = "password";

// Conexão e Inserção
try
{
	$dbh = new PDO($dsn, $user, $password);
	$sth = $dbh->prepare("INSERT INTO cliente (nome_cliente, cpf_cliente, email_cliente, data_nascimento_cliente) VALUES (?, ?, ?, ?)");
	$result = $sth->execute([$_REQUEST["nome_cliente"], $_REQUEST["cpf_cliente"], $_REQUEST["email_cliente"], $_REQUEST["data_nascimento_cliente"]]);

	if ($result)
	{
		echo "Os dados foram inseridos com sucesso!";
	}
	else
	{
		echo "Ocorreu um erro ao inserir os dados!";
	}
}
catch(PDOException $ex)
{
	echo "Não foi possivel concluir a inserção." . $ex->getMessage();
}
finally
{
	$sth = null;
	$dsn = null;
}

