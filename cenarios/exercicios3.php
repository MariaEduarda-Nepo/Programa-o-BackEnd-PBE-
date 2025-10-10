<!-- Cenário 3 – Fantasia e Destino.
John Snow, Papai Smurf, Deadpool e Dexter estão em uma jornada. Durante o
caminho, começa a chover, e eles precisam amar uns aos outros para superar as
dificuldades. No fim da jornada, eles celebram ao comer juntos.

Composição-->

<?php
class Personagens {
    private $personagens;

    public function __construct(array $nomes) {
        $this->personagens = $nomes;
    }

    public function todos() {
        return implode(", ", $this->personagens);
    }

    // Getter
    public function getPersonagens() {
        return $this->personagens;
    }

    // Setter
    public function setPersonagens(array $novosPersonagens) {
        $this->personagens = $novosPersonagens;
    }
}

class Jornada {
    private $personagens;

    public function __construct() {
        $this->personagens = new Personagens(["John Snow", "Papai Smurf", "Deadpool", "Dexter"]);
    }

    // Getter
    public function getPersonagens() {
        return $this->personagens;
    }

    // Setter
    public function setPersonagens(Personagens $personagens) {
        $this->personagens = $personagens;
    }

    public function iniciarJornada() {
        echo "{$this->personagens->todos()} iniciaram a jornada.\n";
    }

    public function chuvaESuperacao() {
        $clima = new Clima();
        $clima->chuva();
        echo "{$this->personagens->todos()} se amam e superam as dificuldades juntos.\n";
    }

    public function celebrar() {
        echo "No fim da jornada, {$this->personagens->todos()} celebram comendo juntos.\n";
    }
}

class Clima {
    private $estado;

    public function __construct() {
        $this->estado = "seco";
    }

    // Getter
    public function getEstado() {
        return $this->estado;
    }

    // Setter
    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function chuva() {
        $this->estado = "chuvoso";
        echo "Começou a chover!\n";
    }
}

$jornada = new Jornada();
$clima = new Clima();

$jornada->iniciarJornada();
$clima->chuva();
$jornada->celebrar();

