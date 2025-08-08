<?php
// Solicita os números e a operação ao usuário
echo "Digite o primeiro número: ";
$num1 = trim(fgets(STDIN));

echo "Digite o segundo número: ";
$num2 = trim(fgets(STDIN));

echo "Digite a operação (+, -, *, /): ";
$operacao = trim(fgets(STDIN));

$resultado = null;

switch ($operacao) {
    case '+':
        $resultado = $num1 + $num2;
        break;
    case '-':
        $resultado = $num1 - $num2;
        break;
    case '*':
        $resultado = $num1 * $num2;
        break;
    case '/':
        if ($num2 == 0) {
            echo "Erro: Divisão por zero não permitida.\n";
            exit;
        }
        $resultado = $num1 / $num2;
        break;
    default:
        echo "Operação inválida.\n";
        exit;
}

echo "Resultado: $num1 $operacao $num2 = $resultado\n";
?>