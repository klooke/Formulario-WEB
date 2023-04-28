function validarData()
{
	var data_nascimento = document.cadastro_cliente.data_nascimento_cliente;
	var date = data_nascimento.value.split("/");

	// Separa o valor de data em Dia, Mês e Ano.
	var day = date[0];
	var month = date[1];
	var year = date[2];

	// Validador simples, dia de 1 a 31, mês de 1 a 12 e ano de 1000 a 9999 (Limite do Tipo DATE SQL)
	if((day < 1 || day > 31) || (month < 1 || month > 12) || (year < 1000 || year > 9999))
	{
		alert("Data inválida, Min: 01/01/1000 - Máximo: 31/12/9999.");

		return false;
	}

	// Converte para o formato DATE SQL
	var dataFix = date.reverse.join('-');
	data_nascimento.value = dataFix;
	alert("Date: " + data);

	return true;
}
