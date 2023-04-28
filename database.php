<?php

include("index.php");

// Validação dos dados no servidor
if ($_REQUEST["nome_cliente"] == "")
{
        alert("Nome do cliente em branco.");
        returnIndex();
}
if (strlen($_REQUEST["cpf_cliente"]) != 11)
{
        alert("CPF do cliente precisa ter 11 caracteres.");
        returnIndex();
}
if (!str_contains($_REQUEST["email_cliente"], '@') || !str_contains($_REQUEST["email_cliente"], '.'))
{
        alert("Email inválido.");
        returnIndex();
}
if ($_REQUEST["data_nascimento_cliente"] == "")
{
        alert("Data de nascimento em branco.");
        returnIndex();
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
		alert("Os dados foram inseridos com sucesso!");
	}
	else
	{
		alert("Ocorreu um erro ao inserir os dados!");
	}
}
catch(PDOException $ex)
{
	alert("Não foi possivel concluir a inserção." . $ex->getMessage());
}
finally
{
	$sth = null;
	$dsn = null;
	returnIndex();
}

