<?php
echo "Digite um número de 1 a 7: ";
$numero = intval(readline());

switch ($numero) {
    case 1:
        echo "Domingo";
        break;
    case 2:
        echo "Segunda";
        break;
    case 3:
        echo "Terça";
        break;
    case 4:
        echo "Quarta";
        break;
    case 5:
        echo "Quinta";
        break;
    case 6:
        echo "Sexta";
        break;
    case 7:
        echo "Sábado";
        break;
    default:
        echo "Número inválido. Digite um número de 1 a 7.";
        break;
}