<?php

namespace Aula_16;

use Aula_16\Bebida\Bebida;
use BebidaDAO;



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
        $bebida = new \Aula_16\Bebida( $nome, $categoria, $volume, $valor, $qtde);
        $this->dao->criarBebida($bebida);

    }
    

    // atualiza bebida existente

    public function atualizar($id, $nome, $categoria, $volume, $valor, $qtde) {
        $this->dao->atualizarBebida($id, $nome, $categoria, $volume, $valor, $qtde);
    }

        // exclui bebida
    public function deletar($nome) {
            $this->dao->excluirBebida($nome);
        
        }
    }

?>