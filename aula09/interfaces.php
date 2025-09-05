<?php

//modificadores de acesso:
    //existem 3 tipos: public, private e protected
    //public class NomeDaAtributo: métodos e atributos públicos
    //private class NomeDaAtributo: métodos e atributos privados para acesso somente dentro da classe. utilizamos os getters e setters para acessar esses atributos
    //protected class NomeDaAtributo: métodos e atributos protegidos para acesso somente dentro da classe e suas subclasses

    //pacotes: sintaxe logo no inicio do código, que atribui de onde os arquivos pertencem, ou seja, o caminho da pasta em que ele está contido. Exemplo:
    //namespace aula 09;

    //Caso tenham mais arquivos que formam o backend de uma página Web e possuem a mesma raiz, o namespace será o mesmo.

namespace aula09;

//interface Pagamento {
    //public function pagar($valor) {
   // }

        
    
//}

//class CartãoDeCredito implements Pagamento {
    //public function pagar($valor){
      //  echo "pagamento realizado com cartão de crédito no valor de R$ $valor\n";
    //}
//}


//class PIX implements Pagamento {
    //public function pagar($valor){
  //      echo "pagamento realizado com PIX no valor de R$ $valor\n";
    //}
//}


// 1. criando uma interface simples

//crie uma interface chamada forma que obrigue qualquer classe a ter um método calcularArea().
//Depois, crie as classes  Quadrado e Circulo que implementam a interface.

//Qadrado deve receber o lado e calcular a area.
//Circulo deve receber o raio e calcular a area.

interface Forma {
    public function calcularArea();
}

class Quadrado implements Forma {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        return $this->lado * $this->lado;
    }
}

class Circulo implements Forma {
    private $raio;

    public function __construct($raio) {
        $this->raio = $raio;
    }

    public function calcularArea() {
        return pi() * $this->raio * $this->raio;
    }
}

// Exemplo de uso:
$q = new Quadrado(4);
echo "Área do quadrado: " . $q->calcularArea() . "\n";

$c = new Circulo(3);
echo "Área do círculo: " . $c->calcularArea() . "\n";

//crie a classe pentagono, e calcule a area do mesmo.
class Pentagono implements Forma {
    private $lado;
    private $apotema;

    public function __construct($lado, $apotema) {
        $this->lado = $lado;
        $this->apotema = $apotema;
    }

    public function calcularArea() {
        return (5 * $this->lado * $this->apotema) / 2;
    }
}

$p = new Pentagono(4, 3);
echo "Área do pentágono: " . $p->calcularArea() . "\n";

?>