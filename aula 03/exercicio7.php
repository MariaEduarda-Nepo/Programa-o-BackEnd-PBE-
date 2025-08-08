<?php
// Solicita ao usuário um número final
echo "Digite o número final: ";
$final = intval(trim(fgets(STDIN)));

echo "Números pares de 0 até $final:\n";
for ($i = 0; $i <= $final; $i++) {
    if ($i % 2 == 0) {
        echo $i . "\n";
    }
}
?>