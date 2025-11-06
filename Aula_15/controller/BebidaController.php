<?php

namespace Aula_15;

require_once __DIR__. "\\..\\Model\\BebidaDAO.php";
require_once __DIR__. "\\..\\Model\\Bebida.php";

class BebidaController {
    private $dao;

    //contrutor: cria o objeto DAO (responsavel por salvar/carregar)

    public function __construct() {
        $this->dao = new BebidaDAO();
    }

    //lista todas as bebidas 

    public function ler() {
        return $this->dao->lerBebidas();

    }

    //cadastra nova bebida

    public function criar($nome,$categoria,$volume,$valor,$qtde) {
        $id = time();
        $bebida = new Bebida( $nome, $categoria, $volume, $valor, $qtde);
        $this->dao->criarBebidas($bebida);

    }

    // atualiza bebida existente

    public function atualizar($nome, $valor, $qtde) {
        $this->dao->atualizarBebidas($nome, $valor, $qtde);
    }

        // exclui bebida
    public function deletar($nome) {
            $this->dao->excluirBebida($nome);
        
        }
    }

?>