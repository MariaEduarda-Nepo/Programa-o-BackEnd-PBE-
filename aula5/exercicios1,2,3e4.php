<?php
// Classe Cachorro com atributos e métodos
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

    public function exibirInformacoes(): void { 
        echo "\nNome: " . $this->nome . "\n";
        echo "Idade: " . $this->idade . "\n";
        echo "Raça: " . $this->raca . "\n";
        echo "Castrado: " . ($this->castrado ? "Sim" : "Não") . "\n";
        echo "Sexo: " . $this->sexo . "\n\n";
    }

    public function latir(): void {
        echo "O Cachorro {$this->nome} está latindo!\n";
    }

    public function marcarTerritorio(): void {
        echo "O cachorro {$this->nome} da raça {$this->raca} está marcando território!\n";
    }

    public function testandoReservista(): void {
        if (strtolower($this->sexo) === "masculino" || strtolower($this->sexo) === "macho") {
            echo "Apresente seu certificado de reservista do tiro de guerra!\n";
        } else {
            echo "Tudo certo\n";
        }
    }
}

// Instanciando objetos Cachorro
$cachorros = [
    new Cachorro("Mel", 3, "Shih tzu", false, "Fêmea"),
    new Cachorro("Max", 2, "Golden Retriever", true, "Macho"),
    new Cachorro("Luke", 5, "Pastor Alemão", true, "Macho"),
    new Cachorro("Lola", 1, "Poodle", false, "Fêmea"),
    new Cachorro("Thor", 4, "Labrador", true, "Macho"),
    new Cachorro("Nina", 6, "Buldogue Francês", true, "Fêmea"),
    new Cachorro("Snoopy", 7, "Beagle", true, "Macho"),
    new Cachorro("Mila", 2, "Chihuahua", false, "Fêmea"),
    new Cachorro("Zeus", 3, "Boxer", true, "Macho"),
    new Cachorro("Pandora", 5, "Border Collie", false, "Fêmea")
];

// Exibindo informações dos cachorros
foreach ($cachorros as $index => $cachorro) {
    echo "\ncachorro" . ($index + 1);
    $cachorro->exibirInformacoes();
    // Chamada do método testandoReservista()
    $cachorro->testandoReservista(); 
    echo "------------------\n";
}

echo "\n\n---------------------\n\n";

// Classe Usuario com atributos e métodos
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

    public function exibirDados(): void {
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

    public function testandoReservista(): void {
        if (strtolower($this->sexo) === "masculino") {
            echo "Apresente seu certificado de reservista do tiro de guerra!\n";
        } else {
            echo "Tudo certo\n";
        }
    }
    
    // Novo método para testar o estado civil
    public function casamento(int $anos_casados = 0): void {
        if (strtolower($this->estadoCivil) === 'casado') {
            echo "Parabéns pelo seu casamento de " . $anos_casados . " anos!\n";
        } else {
            echo "Oloco\n";
        }
    }
}

// Instanciando objetos Usuario
$usuarios = [
    new Usuario(
        "Josenildo Afonso Souza",
        "100.200.300-40",
        "Masculino",
        "josenewdo.souza@gmail.com",
        "Casado",
        "Xique-Xique",
        "Bahia",
        "Rua da amizade, 99",
        "40123-98"
    ),
    new Usuario(
        "Valentina Passos Scherrer",
        "070.070.060-70",
        "Feminino",
        "scherrer.valen@outlook.com",
        "Divorciada",
        "Iracemápolis",
        "São Paulo",
        "Avenida da saudade, 1942",
        "23456-24"
    ),
    new Usuario(
        "Claudio Braz Nepumoceno",
        "575.575.242-32",
        "Masculino",
        "Clauclau.nepumoceno@gmail.com",
        "Solteiro",
        "Piripiri",
        "Piauí",
        "Estrada 3, 33",
        "12345-99"
    )
];

// Exibindo informações dos usuários e chamando os métodos
foreach ($usuarios as $index => $usuario) {
    echo "\nusuario" . ($index + 1);
    $usuario->exibirDados();
    $usuario->testandoReservista();
    // Chamada do novo método casamento()
    if ($usuario->nome === "Josenildo Afonso Souza") {
        $usuario->casamento(10); // Exemplo: Josenildo está casado há 10 anos.
    } else {
        $usuario->casamento();
    }
    echo "------------------\n";
}
?>
//Exercicios 8
//Crie um medoto para a classe 'Usuario' chamado de 'Casamento' que teste se o estado civil é igual a 'Casado ' e caso sim exiba a mensagem "Parabens pelo seu casamento de $anos_casados!" e caso não, exiba a mensagem de "Oloco". o valor de anor de casado será informado na hora de chamar o método para o objeto em especifico.
