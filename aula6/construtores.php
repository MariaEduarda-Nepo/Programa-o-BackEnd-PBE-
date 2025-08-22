<?php
class Produtos{
    public $nome;
    public $categoria;
    public $fornecedor;
    public $qtde_estoque;

    public function __construct($nome = "", $categoria = "", $fornecedor = "", $qtde_estoque ){
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->fornecedor = $fornecedor;
        $this->qtde_estoque = $qtde_estoque;
    }

    public function produto_vendido(){
        $thi
        
    }


}

//$bolacha1 = new Produtos("Nikito","Doces","Vitarella",220);

$bolacha1 = new Produtos();
$bolacha1->nome = "Nikito";
$bolacha1->categoria = "Doces";
$bolacha1->fornecedor = "Vitarella";
$bolacha1->qtde_estoque = 220;


//$feijao = new Produtos("Oliron","Mantimentos","Reserva Nobre",123);

$feijao = new Produtos();
$feijao->nome = "Oliron";
$feijao->categoria = "Mantimentos";
$feijao->fornecedor = "Reserva Nobre";
$feijao->qtde_estoque = 123;

?>