<?php
// Crie uma classe (molde de objetos) chamada "Cachorro" com os seguintes atributos: Nome, Idade, Raca, Castrado e Sexo

class Cachorro {
    public $nome;
    public $idade;
    public $raca;
    public $castrado;
    public $sexo;

    public function __construct($nome, $idade, $raca, $castrado, $sexo) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raca = $raca;
        $this->castrado = $castrado;
        $this->sexo = $sexo;
    }

    public function exibirinformacoes(): void{
        echo "\nNome: " . $this->nome . "\n";
        echo "Idade: " . $this->idade . "\n";
        echo "Raça: " . $this->raca . "\n";
        echo "Castrado: " . ($this->castrado ? "Sim" : "Não") . "\n";
        echo "Sexo: " . $this->sexo . "\n\n";
    }
}

$cachorro1 = new Cachorro("Mel", 3, "Shih tzu", false, "Fêmea");
$cachorro2 = new Cachorro("Max", 2, "Golden Retriever", true, "Macho");
$cachorro3 = new Cachorro("Luke", 5, "Pastor Alemão", true, "Macho");
$cachorro4 = new Cachorro("Lola", 1, "Poodle", false, "Fêmea");
$cachorro5 = new Cachorro("Thor", 4, "Labrador", true, "Macho");
$cachorro6 = new Cachorro("Nina", 6, "Buldogue Francês", true, "Fêmea");
$cachorro7 = new Cachorro("Snoopy", 7, "Beagle", true, "Macho");
$cachorro8 = new Cachorro("Mila", 2, "Chihuahua", false, "Fêmea");
$cachorro9 = new Cachorro("Zeus", 3, "Boxer", true, "Macho");
$cachorro10 = new Cachorro("Pandora", 5, "Border Collie", false, "Fêmea");

echo "\ncachorro1";
$cachorro1->exibirinformacoes();
echo "\ncachorro2";
$cachorro2->exibirinformacoes();
echo "\ncachorro3";
$cachorro3->exibirinformacoes();
echo "\ncachorro4";
$cachorro4->exibirinformacoes();
echo "\ncachorro5";
$cachorro5->exibirinformacoes();
echo "\ncachorro6";
$cachorro6->exibirinformacoes();
echo "\ncachorro7"; 
$cachorro7->exibirinformacoes();
echo "\ncachorro8";
$cachorro8->exibirinformacoes();
echo "\ncachorro9";
$cachorro9->exibirinformacoes();
echo "\ncachorro10";
$cachorro10->exibirinformacoes();

echo "\n\n---------------------\n\n";
?>

<?php

class Usuario {
    public $nome;
    public $cpf;
    public $sexo;
    public $email;
    public $estadoCivil;
    public $cidade;
    public $estado;
    public $endereco;
    public $cep;

    public function __construct($nome, $cpf, $sexo, $email, $estadoCivil, $cidade, $estado, $endereco, $cep) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->sexo = $sexo;
        $this->email = $email;
        $this->estadoCivil = $estadoCivil;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->endereco = $endereco;
        $this->cep = $cep;
    }

     public function exibirdados(): void{
        echo "\nNome: " . $this->nome . "\n";
        echo "CPF: " . $this->cpf . "\n";
        echo "Sexo: " . $this->sexo . "\n";
        echo "Email: " . $this->email . "\n";
        echo "Estado Civil: " . $this->estadoCivil . "\n";
        echo "Cidade: " . $this->cidade . "\n";
        echo "Estado: " . $this->estado . "\n";
        echo "Endereço: " . $this->endereco . "\n";
        echo "CEP: " . $this->cep . "\n\n";
    }

}


$usuario1 = new Usuario(
    "Josenildo Afonso Souza",
    "100.200.300-40",
    "Masculino",
    "josenewdo.souza@gmail.com",
    "Casado",
    "Xique-Xique",
    "Bahia",
    "Rua da amizade, 99",
    "40123-98"
);

$usuario2 = new Usuario(
    "Valentina Passos Scherrer",
    "070.070.060-70",
    "Feminino",
    "scherrer.valen@outlook.com",
    "Divorciada",
    "Iracemápolis",
    "São Paulo",
    "Avenida da saudade, 1942",
    "23456-24"
);

$usuario3 = new Usuario(
    "Claudio Braz Nepumoceno",
    "575.575.242-32",
    "Masculino",
    "Clauclau.nepumoceno@gmail.com",
    "Solteiro",
    "Piripiri",
    "Piauí",
    "Estrada 3, 33",
    "12345-99"
);

echo "\nusuario1";
$usuario1->exibirdados();

echo "\nusuario2";
$usuario2->exibirdados();

echo "\nusuario3";
$usuario3->exibirdados();

?>