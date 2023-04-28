<?php

// Emite um alerta em JS para o navegador
function alert($msg)
{
        echo "<script type=\"text/javascript\">" .
	     "alert(\"$msg\");" .
             "</script>";
}

// Retorna á pagina principal
function returnIndex()
{
	echo "<script type=\"text/javascript\">" .
	     "window.location = \"/index.html\";" .
	     "</script>";
}
