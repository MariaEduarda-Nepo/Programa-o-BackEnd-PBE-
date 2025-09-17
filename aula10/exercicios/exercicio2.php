<?php


class Animal {
    public function fazerSom() {
        return "Som genérico de animal.";
    }
}

class Dog extends Animal {
    public function fazerSom() {
        return "Au au!";
    }
}

class Cat extends Animal {
    public function fazerSom() {
        return "Miau!";
    }
}

class Cow extends Animal {
    public function fazerSom() {
        return "Muuu!";
    }
}

// Teste interativo no terminal
echo "Escolha o animal (Cachorro, Gato, Vaca): ";


switch (strtolower($animal)) {
    case "cachorro":
        $obj = new Dog();
        break;
    case "gato":
        $obj = new Cat();
        break;
    case "vaca":
        $obj = new Cow();
        break;
    default:
        $obj = null;
        break;
}

if ($obj) {
    echo $obj->fazerSom() . "\n";
} else {
    echo "Animal inválido!" . "\n";
}
?>