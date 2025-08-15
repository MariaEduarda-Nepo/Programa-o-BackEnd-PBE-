<?php

function precisaRevisao($revisao, $ano) {
    // Verifica se a revisão é false E se o ano é anterior a 2022.
    if (!$revisao && $ano < 2022) {
        return "Precisa de revisão";
    } else {
        return "Revisão em dia";
    }
}

// Exemplos de uso da função com diferentes cenários
echo "Carro 1 (revisão: false, ano: 2021): " . precisaRevisao(false, 2021) . "<br>";
echo "Carro 2 (revisão: true, ano: 2020): " . precisaRevisao(true, 2020) . "<br>";
echo "Carro 3 (revisão: false, ano: 2023): " . precisaRevisao(false, 2023) . "<br>";
echo "Carro 4 (revisão: true, ano: 2022): " . precisaRevisao(true, 2022) . "<br>";

?>