<?php

function exibirCarro($modelo, $marca, $ano, $revisao, $Ndonos) {
    // Converte o valor booleano de $revisao para 'Sim' ou 'Não'
    $revisaoTexto = $revisao ? 'Sim' : 'Não';
    
    // Constrói a string com a mensagem final
    $mensagem = "O carro $marca $modelo, ano $ano, já passou por revisão: $revisaoTexto, número de donos: $Ndonos";
    
    // Exibe a mensagem
    echo $mensagem;
}

// Exemplo de uso da função
exibirCarro("Versa", "Nissan", 2020, true, 2);

?>