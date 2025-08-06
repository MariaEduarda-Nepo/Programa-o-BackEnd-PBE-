<?php

$nota1 = 8.5; // Altere o valor para testar diferentes notas
$nota2 = 6.0;
$presenca = 80; // Porcentagem de presença do aluno (altere para testar)
$nome = "enzo enrico"; // Altere para testar diferentes nomes
$media = ($nota1 + $nota2) / 2;

if (strtolower($nome) == "enzo enrico") {
    echo "Aluno aprovado!";
    echo "Aluno reprovado!";
}

?>
