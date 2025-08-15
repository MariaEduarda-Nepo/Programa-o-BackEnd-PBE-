'<?php

function calcularValor($marca, $ano, $Ndonos) {
    $precoBase = 0;
    
    // Define o preço base de acordo com a marca
    switch ($marca) {
        case "BMW":
        case "Porsche":
            $precoBase = 300000;
            break;
        case "Nissan":
            $precoBase = 70000;
            break;
        case "BYD":
            $precoBase = 150000;
            break;
        default:
            return "Marca não cadastrada.";
    }

    // Calcula o desconto por ano de uso
    $anoAtual = date("Y");
    $anosDeUso = $anoAtual - $ano;
    $descontoAnos = $anosDeUso * 3000;

    // Calcula o desconto por número de donos
    $descontoDonos = 0;
    if ($Ndonos > 1) {
        $donosAdicionais = $Ndonos - 1;
        $descontoDonos = ($precoBase * 0.05) * $donosAdicionais;
    }
    
    // Calcula o valor final
    $valorFinal = $precoBase - $descontoAnos - $descontoDonos;
    
    // Garante que o valor não seja negativo
    if ($valorFinal < 0) {
        $valorFinal = 0;
    }
    
    return "Valor estimado: R$ " . number_format($valorFinal, 2, ',', '.');
}

// Exemplos de uso da função
echo "Carro 1 (Porsche, 2023, 1 dono): " . calcularValor("Porsche", 2023, 1) . "<br>";
echo "Carro 2 (Nissan, 2020, 2 donos): " . calcularValor("Nissan", 2020, 2) . "<br>";
echo "Carro 3 (BYD, 2021, 3 donos): " . calcularValor("BYD", 2021, 3) . "<br>";
echo "Carro 4 (BMW, 2018, 1 dono): " . calcularValor("BMW", 2018, 1) . "<br>";

?>