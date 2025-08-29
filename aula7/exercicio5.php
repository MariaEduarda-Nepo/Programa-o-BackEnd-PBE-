<?php
class Funcionario {
    private $nome;
    private $salario;

    public function __construct($nome, $salario) { 
        $this->setNome($nome);
        $this->setSalario($salario);
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setSalario($salario) {
        $this->salario = $salario;
    }

    public function getSalario() {
        return $this->salario;
    }
}

// Teste Funcionario
$funcionario = new Funcionario("Carlos", 2500.00);

echo "Funcionário: " . $funcionario->getNome() . ", Salário: R$ " . number_format($funcionario->getSalario(), 2, ',', '.') . "<br>";

$funcionario = new Funcionario("Ana", 3200.00);

echo "Funcionário: " . $funcionario->getNome() . ", Salário: R$ " . number_format($funcionario->getSalario(), 2, ',', '.') . "<br>";


?>