<!-- Cenário 2 – Heróis e Personagens.
O Batman, o Superman e o Homem-Aranha estão em uma missão. Eles precisam
fazer treinamentos especiais no Cotil e, depois, irão ao shopping para doar
brinquedos às crianças.
 


Agregação -->


<?php
class Herois {
    private $missao;

    public function __construct($missao) {
        $this->missao = $missao;
    }

    public function getMissao() {
        return $this->missao;
    }

    public function setMissao($missao) {
        $this->missao = $missao;
    }

    public function treinar() {
        echo "Foi Treinamento especial no {$this->missao}\n";
    }
}

class Lugar {
    private $ambiente;

    public function __construct($ambiente) {
        $this->ambiente = $ambiente;
    }

    public function getAmbiente() {
        return $this->ambiente;
    }

    public function setAmbiente($ambiente) {
        $this->ambiente = $ambiente;
    }

    public function acao() {
        echo "depois ao {$this->ambiente} para doar brinquedos às crianças\n";
    }
}

$missao = new Herois("Cotil");
$missao->treinar();
$lugar = new Lugar("shopping");
$lugar->acao();