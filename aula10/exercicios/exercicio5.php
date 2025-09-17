<?php 


class Calculadora {

    
    public function somar(...$numeros) {
        if (count($numeros) === 2 || count($numeros) === 3) {
            return array_sum($numeros);
        } else {
            return "Quantidade inválida de argumentos.";
        }
    }
}

// Exemplos de uso:
$calc = new Calculadora();
echo $calc->somar(2, 3) . "\n";      // 5
echo $calc->somar(1, 2, 3) . "\n";   // 6
echo $calc->somar(1) . "\n";         // Quantidade inválida de argumentos.

?>