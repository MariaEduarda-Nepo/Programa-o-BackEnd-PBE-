<?php

// Lê os 2 valores digitados pelo usuário via terminal
$valor1 = readline("Digite o primeiro valor: ");
$valor2 = readline("Digite o segundo valor: ");

// Interpreta o tipo de variável que foi digitado
$tipo1 = gettype($valor1);
$tipo2 = gettype($valor2);

// Compara os tipos
if ($tipo1 == $tipo2) {
    echo "Variáveis de tipos iguais! Primeiro valor do tipo {$tipo1} e segundo valor do tipo {$tipo2}.\n";
} else {
    echo "ERRO! Variáveis de tipos diferentes. Primeiro valor do tipo {$tipo1} e segundo valor do tipo {$tipo2}.\n";
}
?>
