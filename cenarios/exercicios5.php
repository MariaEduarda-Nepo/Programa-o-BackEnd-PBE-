<!-- Cenário 5 – Analise o problema com linguagem natural.
"Um sistema de biblioteca deve permitir que usuários (alunos e professores)
façam empréstimos de livros e revistas."

Composição-->

<?php
class Usuario {
    private $nome;
    private $tipo; // 'aluno' ou 'professor'

    public function __construct($nome, $tipo) {
        $this->nome = $nome;
        $this->tipo = $tipo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
}

class ItemBiblioteca {
    private $titulo;
    private $tipo; // 'livro' ou 'revista'

    public function __construct($titulo, $tipo) {
        $this->titulo = $titulo;
        $this->tipo = $tipo;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
}

class Emprestimo {
    private $usuario;
    private $item;

    public function __construct(Usuario $usuario, ItemBiblioteca $item) {
        $this->usuario = $usuario;
        $this->item = $item;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario) {
        $this->usuario = $usuario;
    }

    public function getItem() {
        return $this->item;
    }

    public function setItem(ItemBiblioteca $item) {
        $this->item = $item;
    }

    public function registrar() {
        echo "{$this->usuario->getNome()} ({$this->usuario->getTipo()}) fez empréstimo de {$this->item->getTipo()} '{$this->item->getTitulo()}'.\n";
    }
}

// Exemplo de uso:
$usuarios = [
    new Usuario("Ana", "aluno"),
    new Usuario("Carlos", "professor")
];

$itens = [
    new ItemBiblioteca("Dom Casmurro", "livro"),
    new ItemBiblioteca("Revista Ciência Hoje", "revista")
];

$emprestimo1 = new Emprestimo($usuarios[0], $itens[0]);
$emprestimo2 = new Emprestimo($usuarios[1], $itens[1]);

$emprestimo1->registrar();
$emprestimo2->registrar();