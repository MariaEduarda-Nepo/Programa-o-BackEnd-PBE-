<?php
class imovel {

    private $categoria;
    private $n_comodos;
    private $valor;
    private $estado_conservacao;


    public function __construct($categoria, $n_comodos, $valor, $estado_conservacao) {
        $this->categoria = $categoria;
        $this->n_comodos = $n_comodos;
        $this->valor = $valor;
        $this->estado_conservacao = $estado_conservacao;
    }
}


class Casa extends imovel {

    private $tem_quintal; //atributo booleano - true ou false

public function __construct($categoria, $n_comodos, $valor, $estado_conservacao, $tem_quintal) {
        parent::__construct($categoria, $n_comodos, $valor, $estado_conservacao);

        $this->tem_quintal = $tem_quintal;
    }


}


class apartamento extends imovel {

    private $andar; //atributo inteiro

    public function __construct($categoria, $n_comodos, $valor, $estado_conservacao, $andar) {
        parent::__construct($categoria, $n_comodos, $valor, $estado_conservacao);

        $this->andar = $andar;
    }
}


?>