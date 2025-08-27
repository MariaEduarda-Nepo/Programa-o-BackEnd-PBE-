<?
class Pessoa {
     private $nome;
     private $cpf;
     private $telefone;
     private $idade;
     private $email;

     private $senha; // Atributo privado

 public function __construct($nome, $cpf, $telefone, $idade, $email, $senha) {
        $this->setNome($nome);
        $this->setcpf($cpf);
        $this->settelefone($telefone);
        $this->setIdade($idade);
        $this->email = $email;
        $this->senha = $senha;
    }

    // Getter para o atributo privado senha
public function setNome($nome) {
    $this->nome = ucwords(strtolower($nome));
}

public function getNome() {
    return $this->nome;

}
// Getter e Setter para $cpf
    public function setCpf($cpf) {
        $this->cpf = preg_replace('/\D/', '', $cpf);
    }
    public function getCpf() {
        return $this->cpf;
    }
// Getter e Setter para $telefone
    public function setTelefone($telefone) {
        $this->telefone = preg_replace('/\D/', '', $telefone);
    }
    public function getTelefone() {
        return $this->telefone;
    }

    public function setIdade($idade) {
        $this->idade = (int)$idade;
    }
    public function getIdade() {
        return $this->idade;
    }
    //(int)$variavel garente valor inteiro
    //obs($variavel) garante numero positivo
}

$aluno1 = new Pessoa("ana maria","123.456.789-00","(11) 91234-5678",22,"gnii@gmail.com","senha123");

echo $aluno1->getNome();
?>