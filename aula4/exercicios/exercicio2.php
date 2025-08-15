<?php

function ehSeminovo($ano) {
    // Obtém o ano atual.
    $anoAtual = date("Y");
    
    // Calcula a idade do carro.
    $idade = $anoAtual - $ano;
    
    // Retorna true se a idade for menor ou igual a 3.
    return $idade <= 3;
}

// Carros para teste
$carro1 = 2023;
$carro2 = 2021;
$carro3 = 2018;

// Testa a função com cada carro e exibe o resultado
echo "O carro ano $carro1 é seminovo? " . (ehSeminovo($carro1) ? "Sim" : "Não") . "<br>";
echo "O carro ano $carro2 é seminovo? " . (ehSeminovo($carro2) ? "Sim" : "Não") . "<br>";
echo "O carro ano $carro3 é seminovo? " . (ehSeminovo($carro3) ? "Sim" : "Não") . "<br>";

?>