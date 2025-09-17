<?php

abstract class Transporte {
    abstract public function mover();
}

class Carro extends Transporte {
    public function mover() {
        return "O carro está andando na estrada";
    }
}

class Barco extends Transporte {
    public function mover() {
        return "O barco está navegando no mar";
    }
}

class Aviao extends Transporte {
    public function mover() {
        return "O avião está voando no céu";
    }
}

class Elevador extends Transporte {
    public function mover() {
        return "O Elevador está correndo pelo no prédio";
    }
}

// Teste interativo
echo "Escolha o transporte (Carro, Barco, Aviao, Elevador): ";
$transporte = trim(fgets(STDIN));

If ($transporte == "Barco") {
    $barco = new Barco();
    echo $barco->mover() . PHP_EOL;
} elseif ($transporte == "Aviao") {
    $aviao = new Aviao();
    echo $aviao->mover() . PHP_EOL;
} elseif ($transporte == "Elevador") {
    $elevador = new Elevador();
    echo $elevador->mover() . PHP_EOL;
} else {
    echo "Transporte inválido!" . PHP_EOL;
}
?>