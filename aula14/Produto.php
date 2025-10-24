<?php


class Produto {
    public $codigo;
    public $nome;
    public $preco;

  
    public function __construct($codigo, $nome, $preco) {
        $this->codigo = $codigo;
        $this->nome = $nome;
        // Garante que o preço seja um float
        $this->preco = (float) $preco;
    }

   
    public function toArray() {
        return [
            'codigo' => $this->codigo,
            'nome' => $this->nome,
            'preco' => $this->preco
        ];
    }
}

?>