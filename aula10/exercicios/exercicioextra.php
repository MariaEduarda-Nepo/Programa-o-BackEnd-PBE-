<?php

// Interfaces

interface Movel {
    public function mover();
}

interface Abastecivel {
    public function abastecer(int $quantidade);
}

interface Manutenivel {
    public function fazerManutencao();
}

// Classes

class Carro implements Movel, Abastecivel {
    private $modelo;
    private $ano;

    public function __construct(string $modelo, int $ano) {
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    public function mover() {
        echo "O carro {$this->modelo} ({$this->ano}) está se movimentando.\n";
    }

    public function abastecer(int $quantidade) {
        echo "Foram abastecidos {$quantidade} litros no carro {$this->modelo} ({$this->ano}).\n";
    }
}

class Bicicleta implements Movel, Manutenivel {
    public function mover() {
        echo "A bicicleta está pedalando.\n";
    }

    public function fazerManutencao() {
        echo "A bicicleta foi lubrificada.\n";
    }
}

class Onibus implements Movel, Abastecivel, Manutenivel {
    public function mover() {
        echo "O ônibus está transportando passageiros.\n";
    }

    public function abastecer(int $quantidade) {
        echo "Foram abastecidos {$quantidade} litros no ônibus.\n";
    }

    public function fazerManutencao() {
        echo "O ônibus passou por manutenção.\n";
    }
}

// Exemplo de uso

echo "--- Testando o Carro ---\n";
$carro = new Carro("Fusca", 1980);
$carro->mover();
$carro->abastecer(50);

echo "\n--- Testando a Bicicleta ---\n";
$bicicleta = new Bicicleta();
$bicicleta->mover();
$bicicleta->fazerManutencao();

echo "\n--- Testando o Ônibus ---\n";
$onibus = new Onibus();
$onibus->mover();
$onibus->abastecer(200);
$onibus->fazerManutencao();
?>