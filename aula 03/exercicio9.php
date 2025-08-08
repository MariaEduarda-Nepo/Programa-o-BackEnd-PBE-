<?php
// Solicita a temperatura ao usuário
echo "Digite a temperatura em °C: ";
$temperatura = trim(fgets(STDIN));

// Verifica e classifica a temperatura
if ($temperatura < 15) {
    echo "Frio\n";
} elseif ($temperatura <= 25) {
    echo "Agradável\n";
} else {
    echo "Quente\n";
}
?>