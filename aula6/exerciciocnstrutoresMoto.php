<?php

// 1. Criação da classe Moto sem construtor
class Moto {
    public $marca;
    public $modelo;
    public $cor;
    public $ano;
}

// 2. Criação de 3 objetos para a classe Moto
$moto1 = new Moto();
$moto1->marca = "Honda";
$moto1->modelo = "CBR 1000RR";
$moto1->cor = "Preta";
$moto1->ano = 2024;

$moto2 = new Moto();
$moto2->marca = "Yamaha";
$moto2->modelo = "MT-07";
$moto2->cor = "Azul";
$moto2->ano = 2023;

$moto3 = new Moto();
$moto3->marca = "Kawasaki";
$moto3->modelo = "Ninja 400";
$moto3->cor = "Verde";
$moto3->ano = 2022;


/*
// 3. Construtores

// 1° Construtor
// function __construct($dia, $mes, $ano) {
//     $this->data = "$dia/$mes/$ano";
// }

// 2° Construtor
// function __construct($nome, $idade, $cpf, $telefone, $endereco, $estado_civil, $sexo) {
//     $this->nome = $nome;
//     $this->idade = $idade;
//     $this->cpf = $cpf;
//     $this->telefone = $telefone;
//     $this->endereco = $endereco;
//     $this->estado_civil = $estado_civil;
//     $this->sexo = $sexo;
// }

// 3° Construtor
// function __construct($marca, $nome, $categoria, $data_fabricacao, $data_venda) {
//     $this->marca = $marca;
//     $this->nome = $nome;
//     $this->categoria = $categoria;
//     $this->data_fabricacao = $data_fabricacao;
//     $this->data_venda = $data_venda;
// }
*/

?>