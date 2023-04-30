<?php

include("index.php");
include("config.php");

// Conexão e Listagem
try
{
        $conn = new PDO($dsn, $user, $password);
        $result = $conn->query("SELECT * FROM cliente");

        if ($result)
        {
		while($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			echo "<tr>";
			echo "<th scope='row'>" . $row["id_cliente"] . "</th>";
			echo "<td>" . $row["nome_cliente"] . "</td>";
			echo "<td>" . $row["cpf_cliente"] . "</td>";
			echo "<td>" . $row["email_cliente"] . "</td>";
			echo "<td>" . $row["data_nascimento_cliente"] . "</td>";
			echo "</tr>";
		}
                alert("Os dados foram carregados com sucesso!");
        }
        else
        {
                alert("Ocorreu um erro ao carregar os dados!");
	}
}
catch(PDOException $ex)
{
        alert("Não foi possivel carregar os dados." . $ex->getMessage());
}
finally
{
        $conn = null;
	$result = null;
}

