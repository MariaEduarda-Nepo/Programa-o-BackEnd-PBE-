<?php
// Lê o primeiro valor do usuário
$valor1 = readline("Digite o primeiro valor: ");

// Lê o segundo valor do usuário
$valor2 = readline("Digite o segundo valor: ");

// Função para detectar o tipo do valor digitado
function detectarTipo($valor) {
    if (is_numeric($valor)) {
        if (strpos($valor, '.') !== false) {
            return 'float';
        } else {
            return 'integer';
        }
    } elseif (strtolower($valor) === 'true' || strtolower($valor) === 'false') {
        return 'boolean';
    } else {
        return 'string';
    }
}

$tipo1 = detectarTipo($valor1);
$tipo2 = detectarTipo($valor2);

if ($tipo1 === $tipo2) {
    echo "Variáveis de tipos iguais! Primeiro valor do tipo {$tipo1} e segundo valor do tipo {$tipo2}\n";
} else {
    echo "ERRO! Variáveis de tipos diferentes. Primeiro valor do tipo {$tipo1} e segundo valor do tipo {$tipo2}\n";
}
?>
