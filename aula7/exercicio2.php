<?php
class Pessoa {
    private $nome;
    private $idade;
    private $email;

    public function __construct(string $nome, int $idade, string $email) {
        $this->setNome($nome);
        $this->setIdade($idade);
        $this->setEmail($email);
    }

    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setIdade(int $idade) {
        $this->idade = $idade >= 0 ? $idade : 0;
    }

    public function getIdade(): int {
        return $this->idade;
    }

    public function setEmail(string $email) {
        $this->email = filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : "";
    }

    public function getEmail(): string {
        return $this->email;
    }
}

// Teste Pessoa
$pessoa = new Pessoa("Maria", 20, "maria99@gmail.com");
echo "O nome é " . $pessoa->getNome() . ", tem " . $pessoa->getIdade() . " anos e o email é " . $pessoa->getEmail() . ".<br>";
$pessoa->setIdade(20);
$pessoa->setEmail("maria99@gmail.com");
echo "O nome é " . $pessoa->getNome() . ", tem " . $pessoa->getIdade() . " anos e o email é " . $pessoa->getEmail() . ".<br>";
?>