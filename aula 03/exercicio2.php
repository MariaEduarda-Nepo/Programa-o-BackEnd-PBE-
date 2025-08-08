<?php
// Lê a nota do usuário
echo "Digite uma nota de 0 a 10: ";
$nota = floatval(trim(fgets(STDIN)));

if ($nota >= 9 && $nota <= 10) {
    echo "Excelente\n";
} elseif ($nota >= 7 && $nota < 9) {
    echo "Bom\n";
} elseif ($nota >= 0 && $nota < 7) {
    echo "Reprovado\n";
} else {
    echo "Nota inválida\n";
}
?>