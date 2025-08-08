<?php
// Solicita ao usuário que digite sua idade
echo "Digite sua idade: ";
$idade = intval(readline());

// Verifica se é maior ou menor de idade
if ($idade >= 18) {
    echo "Maior de idade.";
} else {
    echo "Menor de idade.";
}
?>