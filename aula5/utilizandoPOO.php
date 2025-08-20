<?php
class Carro {
    public $marca;
    public $modelo;
    public $ano;
    public $revisao;
    public $N_Donos;

    public function __construct($marca, $modelo, $ano, $revisao, $N_Donos) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->revisao = $revisao;
        $this->N_Donos = $N_Donos;
    }
}

$carro1 = new Carro("porshe","911","2020",false,3);    
$carro2 = new Carro("Mitsubishi","Lancer","1945",true, 1);
$carro3 = new Carro("nissan","versa","2011",true,4);
$carro4 = new Carro("BYD","KING","2026",false,1);
$carro5 = new Carro("Chevrolet","Camaro","2024",false,1);
$carro6 = new Carro("Honda","Civic","2015",true,4);
?>