<?php
// polimorfismo:

// o termo Polimosfismo significa "várias formas". Associando isso a Programação Orientada a Objetos, o conceito se trata de várias classes e suas instâncias (objetos) respondenod a um mesmo método de formas diferentes. No exemplo do Interface aula_09, temos um método CalcularArea() que responde de forma diferente á classe Quadrado, à classe Pentágono e a classe círculo. Isso quer dizer que a função é a mesma - calcular a àrea da forma geométrica- mas a operação muda de acordo com a figura.

// Crie um método chamado "mover()" , aonde ele responde de várias formas diferentes, para as classes: Carro, Avião, Barco e Elevador.

interface Movel {
    public function mover();
}

class Carro implements Movel {
    private $marca;
    private $modelo;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function mover() {
        echo "O carro {$this->marca} {$this->modelo} está se movendo pelas estradas.";
    }
}

class Aviao implements Movel {
    public function mover() {
        echo "O avião está voando pelos céus.";
    }
}

class Barco implements Movel {
    public function mover() {
        echo "O barco está navegando pelas águas.";
    }
}

class Elevador implements Movel {
    public function mover() {
        echo "O elevador está subindo ou descendo.";
    }
}

$veiculos = [
    new Carro("Toyota", "Corolla"),
    new Aviao(),
    new Barco(),
    new Elevador()
];

// Testando o polimorfismo
$veiculos = [
    new Carro("Honda", "Civic"),
    new Aviao(),
    new Barco(),
    new Elevador()
];

foreach ($veiculos as $veiculo) {
    $veiculo->mover();
}

?>