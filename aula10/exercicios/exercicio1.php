<?php

interface Forma {
    public function calcularArea();
}

class Quadrado implements Forma {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        return $this->lado * $this->lado;
    }
}

class Retangulo implements Forma {
    private $base;
    private $altura;

    public function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcularArea() {
        return $this->base * $this->altura;
    }
}

class Circulo implements Forma {
    private $raio;

    public function __construct($raio) {
        $this->raio = $raio;
    }

    public function calcularArea() {
        return pi() * $this->raio * $this->raio;
    }
}

// Exemplo de uso:
$q = new Quadrado(4);
$r = new Retangulo(4, 6);
$c = new Circulo(3);
echo "Área do quadrado: " . $q->calcularArea() . "\n";
echo "Área do retângulo: " . $r->calcularArea() . "\n";
echo "Área do círculo: " . $c->calcularArea() . "\n";



?>