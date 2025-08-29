<?php
// 3. Validação em setter

class Aluno {
    private $nome;
    private $nota;

    public function __construct($nome, $nota) {
        $this->setNome($nome);
        $this->setNota($nota);
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNota($nota) {
        $this->nota = ($nota >= 0 && $nota <= 10) ? $nota : 0;
    }

    public function getNota() {
        return $this->nota;
    }
}


// Teste Aluno
$aluno1 = new Aluno("Igor", 8.5);
$aluno2 = new Aluno("Maria", 12); // inválido

echo "Aluno: " . $aluno1->getNome() . ", Nota: " . $aluno1->getNota() . "<br>";
echo "Aluno: " . $aluno2->getNome() . ", Nota: " . $aluno2->getNota() . "<br>";






?>