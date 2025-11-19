<?php

namespace Biblioteca;

require_once __DIR__ . "/../Model/LivroDAO.php";
require_once __DIR__ . "/../Model/Livro.php";

class LivroController {
    private $dao;

    // Construtor: cria o objeto DAO (responsável por salvar/carregar)
    public function __construct() {
        $this->dao = new LivroDAO();
    }

    // Lista todos os livros 
    public function ler() {
        return $this->dao->lerLivros();
    }

    // Cadastra novo livro
    public function criar($titulo, $autor, $ano, $genero, $quantidade) {
        $livro = new Livro($titulo, $autor, $ano, $genero, $quantidade);
        $this->dao->criarLivro($livro);
    }

    // Atualiza livro existente
    public function atualizar($tituloOriginal, $novoTitulo, $autor, $ano, $genero, $quantidade) {
        $this->dao->atualizarLivro($tituloOriginal, $novoTitulo, $autor, $ano, $genero, $quantidade);
    }

    // Exclui livro
    public function deletar($titulo) {
        $this->dao->excluirLivro($titulo);
    }

    // Busca livro por título
    public function buscarPorTitulo($titulo) {
        return $this->dao->buscarPorTitulo($titulo);
    }
}

?>