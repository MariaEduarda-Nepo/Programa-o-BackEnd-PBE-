<!-- Cenário 1 – Viagem pelo Mundo.
Um grupo de turistas vai visitar o Japão, o Brasil e o Acre. Em cada lugar da
Terra, eles poderão comer comidas típicas e nadar em rios ou praias.

Associação -->



<?php
class Turista {
    private $pais;
    public function __construct($pais) {
        $this->pais = $pais;
    }
    public function visitar(){
        echo "Visitando $this->pais\n";
    }
    public function getPais() {
        return $this->pais;
    }
    public function setPais($pais) {
        $this->pais = $pais;
    }
}
class Lugares {
    private $comidaTipica;
    private $localNadar;

    public function comer(){
        echo "Comendo comida típica\n";
    }
    public function nadar(){
        echo "Nadando em rios ou praias\n";
    }
    public function getComidaTipica() {
        return $this->comidaTipica;
    }
    public function setComidaTipica($comidaTipica) {
        $this->comidaTipica = $comidaTipica;
    }
    public function getLocalNadar() {
        return $this->localNadar;
    }
    public function setLocalNadar($localNadar) {
        $this->localNadar = $localNadar;
    }
}

$turista1 = new Turista("Japão");
$turista1->visitar();
$Lugares1 = new Lugares();
$Lugares1->comer();
$Lugares1->nadar();
