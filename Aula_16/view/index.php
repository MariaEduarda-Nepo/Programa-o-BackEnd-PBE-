<?php

namespace Aula_16;

require_once __DIR__. '\\..\\Controller\\BebidaController.php';
$controller = new BebidaController();

if ($_SERVER ['REQUEST_METHOD'] === 'POST'){
    $acao = $_POST['acao'] ?? '';
    if ($acao === 'criar'){
        $controller->criar(
            $_POST['nome'],
            $_POST['categoria'],
            $_POST['Volume'],
            $_POST['Valor'],
            $_POST['qtde']
        );
    } elseif ($acao === 'deletar'){
        $controller->deletar($_POST['nome']);
    }
}
$bebidas = $controller->ler();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Bebidas</title>
</head>
<body>
    <h1>Formulário para preencimento de Bebidas</h1>
    <form method="POST">
    <input type="hidden" name="acao" value="criar">
    <input type="text" name="nome" placeholder="Nome de bebida:" required>
    <select name="categoria" required>
        <option value="">Selecione a Categoria</option>
        <option value="Refrigerante">Refrigerante</option>
        <option value="Cerveja">Cerveja</option>
        <option value="Vinho">Vinho</option>
        <option value="Destilado">Destilado</option>
        <option value="Água">Água</option>
        <option value="Suco">Suco</option>
        <option value="Energético">Energético</option>
    </select>
    <input type="text" name="Volume" placeholder="Volume (ex:300ml):" required>
    <input type="number" name="Valor" step="0.01" placeholder="Valor em Reais (R$):" required>
    <input type="number" name="qtde" placeholder="Quatidade em estoque:" required>
    <?php
    echo '<button type="submit" style="padding: 10px 20px; background-color: #ffd8faff; color: black; border: none; border-radius: 4px; cursor: pointer;">Cadastrar</button>';
    ?>
    </form>
    <h2>Bebidas Cadastradas</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Volume</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bebidas as $bebida): ?>
            <tr>
                <td><?php echo htmlspecialchars($bebida->getNome()); ?></td>
                <td><?php echo htmlspecialchars($bebida->getCategoria()); ?></td>
                <td><?php echo htmlspecialchars($bebida->getVolume()); ?></td>
                <td>R$ <?php echo number_format($bebida->getValor(), 2, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($bebida->getQtde()); ?></td>
                <td>
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="acao" value="deletar">
                        <input type="hidden" name="nome" value="<?php echo htmlspecialchars($bebida->getNome()); ?>">
                        <button type="submit" style="background-color: #ff0400ff; border-radius: 4px; cursor: pointer;">Excluir</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>