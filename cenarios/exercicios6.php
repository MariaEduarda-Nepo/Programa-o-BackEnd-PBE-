<!-- Cenário 6 – Leia o enunciado do problema.
"Um sistema de cinema deve permitir que clientes comprem ingressos para
sessões de filmes."

Composição-->
<?php
class Cliente {
    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
}

class Filme {
    private $titulo;

    public function __construct($titulo) {
        $this->titulo = $titulo;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
}

class Sessao {
    private $filme;
    private $horario;

    public function __construct(Filme $filme, $horario) {
        $this->filme = $filme;
        $this->horario = $horario;
    }

    public function getFilme() {
        return $this->filme;
    }

    public function setFilme(Filme $filme) {
        $this->filme = $filme;
    }

    public function getHorario() {
        return $this->horario;
    }

    public function setHorario($horario) {
        $this->horario = $horario;
    }
}

class Ingresso {
    private $cliente;
    private $sessao;

    public function __construct(Cliente $cliente, Sessao $sessao) {
        $this->cliente = $cliente;
        $this->sessao = $sessao;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente) {
        $this->cliente = $cliente;
    }

    public function getSessao() {
        return $this->sessao;
    }

    public function setSessao(Sessao $sessao) {
        $this->sessao = $sessao;
    }

    public function comprar() {
        echo "{$this->cliente->getNome()} comprou ingresso para '{$this->sessao->getFilme()->getTitulo()}' às {$this->sessao->getHorario()}.\n";
    }
}

// Exemplo de uso:
$clientes = [
    new Cliente("João"),
    new Cliente("Maria")
];

$filmes = [
    new Filme("Vingadores"),
    new Filme("Toy Story")
];

$sessoes = [
    new Sessao($filmes[0], "19:00"),
    new Sessao($filmes[1], "21:00")
];

$ingresso1 = new Ingresso($clientes[0], $sessoes[0]);
$ingresso2 = new Ingresso($clientes[1], $sessoes[1]);

$ingresso1->comprar();
$ingresso2->comprar();
