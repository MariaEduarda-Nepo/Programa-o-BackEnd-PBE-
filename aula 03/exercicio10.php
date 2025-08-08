<?php
for ($i = 0; $i < 5; $i++) {
    echo "Menu Interativo:\n";
    echo "1 - Olá\n";
    echo "2 - Data Atual\n";
    echo "3 - Sair\n";
    echo "Escolha uma opção: ";
    $opcao = trim(fgets(STDIN));

    switch ($opcao) {
        case '1':
            echo "Olá!\n\n";
            break;
        case '2':
            echo "Data Atual: " . date('d/m/Y H:i:s') . "\n\n";
            break;
        case '3':
            echo "Saindo...\n";
            exit;
        default:
            echo "Opção inválida!\n\n";
    }
}
echo "Fim do programa.\n";
?>