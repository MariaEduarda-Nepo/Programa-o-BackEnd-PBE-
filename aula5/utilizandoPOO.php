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





//metodo pra exibir as informações dos carros
public function exibirInfo() {
    echo "marca: $this->marca - modelo: $this->modelo - ano: $this->ano\n";
} 
//Método para ligar o carro
public function ligar() {
    echo "O carro $this->modelo está ligado.\n";
}
}

$carro2 -> ligar(); //chamado metodo ligar
$carro4 -> exibirInfo(); //chamado metodo exibirInfo
?>