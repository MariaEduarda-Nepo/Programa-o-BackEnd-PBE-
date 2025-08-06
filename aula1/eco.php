<?php
/*Desenvolva um codigo com a mesma estrutura que o abaixo, porem com os seus dados .*/
echo"Olá! \n";
$nome = "Luiza! \n";
$idade = 20;
$ano_atual = 2025;

$data_nasc= $ano_atual-$idade;
echo $nome, "você nasceu em:", $data_nasc;
?>

<?php
// Faça as questões 2 e 3 do slide Aula 1 - Fundamentos Básicos.
$String1 = "Programação em php";
$String2 = "PROMAGRAMAÇÃO EM PHP";
echo $String1 . "\n";
echo $String2;
?>
  
<?php
$str = " 
O PHP foi criado em mil novecentos e noventa e cinco";
$str = str_replace("i", "1", str_replace("a", "4", str_replace("O", "0", $str)));
echo $str;
?>



<?php 
$exerc2= "Programação em php";
echo  "\nMinusculo:", $exerc2;
$exerc2= strtoupper($exerc2);
echo "\nMaiusculo:", $exerc2;   
?>



<?php
$exerc3 = "O PHP fo1 criado em mil novecentos e noventa e cinco";
echo "\nAntes do comando replace: \n", $exerc3; 
$exerc3 = str_replace(['o', 'a', 'i'], ['0','4','1'], $exerc3);
echo "\nApos o comando replace: \n", $exerc3;