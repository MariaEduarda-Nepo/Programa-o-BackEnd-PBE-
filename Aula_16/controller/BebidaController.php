<?php

namespace Aula_16;

require_once __DIR__ . "/../Model/BebidaDAO.php";
require_once __DIR__ . "/../Model/Bebida.php";

class BebidaController {
    private $dao;

    // Construtor: cria o objeto DAO (responsável por salvar/carregar)
    public function __construct() {
        $this->dao = new BebidaDAO();
    }

    // Lista todas as bebidas 
    public function ler() {
        return $this->dao->lerBebidas();
    }

    // Cadastra nova bebida
    public function criar($nome, $categoria, $volume, $valor, $qtde) {
        $bebida = new Bebida($nome, $categoria, $volume, $valor, $qtde);
        $this->dao->criarBebida($bebida);
    }

    // Atualiza bebida existente
    public function atualizar($nomeOriginal, $novoNome, $categoria, $volume, $valor, $qtde) {
        $this->dao->atualizarBebida($nomeOriginal, $novoNome, $categoria, $volume, $valor, $qtde);
    }

    // Exclui bebida
    public function deletar($nome) {
        $this->dao->excluirBebida($nome);
    }
}

?>