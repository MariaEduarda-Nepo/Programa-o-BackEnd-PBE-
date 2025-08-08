<?php
// Solicita ao usuário um número
echo "Digite um número para ver sua tabuada: ";
$numero = intval(readline());

// Exibe a tabuada de 1 a 10
echo "Tabuada de $numero:\n";
for ($i = 1; $i <= 10; $i++) {
    $resultado = $numero * $i;
    echo "$numero x $i = $resultado\n";
}
?>