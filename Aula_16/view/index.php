<?php

namespace Aula_16;

require_once __DIR__ . '/../Controller/BebidaController.php';
$controller = new BebidaController();

// Variável para controlar modo de edição
$editando = false;
$bebidaEditar = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    if ($acao === 'criar') {
        $controller->criar(
            $_POST['nome'],
            $_POST['categoria'],
            $_POST['Volume'],
            $_POST['Valor'],
            $_POST['qtde']
        );
    } elseif ($acao === 'atualizar') {
        $controller->atualizar(
            $_POST['nomeOriginal'],
            $_POST['nome'],
            $_POST['categoria'],
            $_POST['Volume'],
            $_POST['Valor'],
            $_POST['qtde']
        );
    } elseif ($acao === 'deletar') {
        $controller->deletar($_POST['nome']);
    }
    // Redireciona para evitar reenvio do formulário
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Verifica se está editando
if (isset($_GET['editar'])) {
    $editando = true;
    $bebidas = $controller->ler();
    foreach ($bebidas as $bebida) {
        if ($bebida->getNome() === $_GET['editar']) {
            $bebidaEditar = $bebida;
            break;
        }
    }
}

$bebidas = $controller->ler();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Bebidas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1, h2 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        input, select {
            margin: 10px 5px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: auto;
        }
        input[type="text"], input[type="number"], select {
            min-width: 180px;
        }
        button {
            padding: 10px 20px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .btn-cadastrar {
            background-color: #4CAF50;
        }
        .btn-cadastrar:hover {
            background-color: #45a049;
        }
        .btn-atualizar {
            background-color: #2196F3;
        }
        .btn-atualizar:hover {
            background-color: #0b7dda;
        }
        .btn-cancelar {
            background-color: #9E9E9E;
            margin-left: 10px;
        }
        .btn-cancelar:hover {
            background-color: #757575;
        }
        .btn-editar {
            background-color: #FF9800;
            padding: 5px 15px;
        }
        .btn-editar:hover {
            background-color: #e68900;
        }
        .btn-excluir {
            background-color: #f44336;
            padding: 5px 15px;
        }
        .btn-excluir:hover {
            background-color: #da190b;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .acoes-cell {
            white-space: nowrap;
        }
        .acoes-cell form {
            display: inline;
            margin: 0;
            padding: 0;
            box-shadow: none;
        }
        .form-title {
            color: #4CAF50;
            margin-top: 0;
        }
        .editing-mode {
            border: 2px solid #2196F3;
        }
    </style>
</head>
<body>
    <h1>Formulário para preenchimento de Bebidas</h1>
    
    <form method="POST" class="<?php echo $editando ? 'editing-mode' : ''; ?>">
        <?php if ($editando && $bebidaEditar): ?>
            <h3 class="form-title">Editando: <?php echo htmlspecialchars($bebidaEditar->getNome()); ?></h3>
            <input type="hidden" name="acao" value="atualizar">
            <input type="hidden" name="nomeOriginal" value="<?php echo htmlspecialchars($bebidaEditar->getNome()); ?>">
        <?php else: ?>
            <h3 class="form-title">Cadastrar Nova Bebida</h3>
            <input type="hidden" name="acao" value="criar">
        <?php endif; ?>
        
        <input type="text" name="nome" placeholder="Nome da bebida:" 
               value="<?php echo $editando && $bebidaEditar ? htmlspecialchars($bebidaEditar->getNome()) : ''; ?>" required>
        
        <select name="categoria" required>
            <option value="">Selecione a Categoria</option>
            <option value="Refrigerante" <?php echo ($editando && $bebidaEditar && $bebidaEditar->getCategoria() === 'Refrigerante') ? 'selected' : ''; ?>>Refrigerante</option>
            <option value="Cerveja" <?php echo ($editando && $bebidaEditar && $bebidaEditar->getCategoria() === 'Cerveja') ? 'selected' : ''; ?>>Cerveja</option>
            <option value="Vinho" <?php echo ($editando && $bebidaEditar && $bebidaEditar->getCategoria() === 'Vinho') ? 'selected' : ''; ?>>Vinho</option>
            <option value="Destilado" <?php echo ($editando && $bebidaEditar && $bebidaEditar->getCategoria() === 'Destilado') ? 'selected' : ''; ?>>Destilado</option>
            <option value="Água" <?php echo ($editando && $bebidaEditar && $bebidaEditar->getCategoria() === 'Água') ? 'selected' : ''; ?>>Água</option>
            <option value="Suco" <?php echo ($editando && $bebidaEditar && $bebidaEditar->getCategoria() === 'Suco') ? 'selected' : ''; ?>>Suco</option>
            <option value="Energético" <?php echo ($editando && $bebidaEditar && $bebidaEditar->getCategoria() === 'Energético') ? 'selected' : ''; ?>>Energético</option>
        </select>
        
        <input type="text" name="Volume" placeholder="Volume (ex: 300ml):" 
               value="<?php echo $editando && $bebidaEditar ? htmlspecialchars($bebidaEditar->getVolume()) : ''; ?>" required>
        
        <input type="number" name="Valor" step="0.01" placeholder="Valor em Reais (R$):" 
               value="<?php echo $editando && $bebidaEditar ? $bebidaEditar->getValor() : ''; ?>" required>
        
        <input type="number" name="qtde" placeholder="Quantidade em estoque:" 
               value="<?php echo $editando && $bebidaEditar ? $bebidaEditar->getQtde() : ''; ?>" required>
        
        <?php if ($editando): ?>
            <button type="submit" class="btn-atualizar">Atualizar</button>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>"><button type="button" class="btn-cancelar">Cancelar</button></a>
        <?php else: ?>
            <button type="submit" class="btn-cadastrar">Cadastrar</button>
        <?php endif; ?>
    </form>

    <h2>Bebidas Cadastradas</h2>
    <table>
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
            <?php if (empty($bebidas)): ?>
            <tr>
                <td colspan="6" style="text-align: center; color: #999;">Nenhuma bebida cadastrada</td>
            </tr>
            <?php else: ?>
                <?php foreach ($bebidas as $bebida): ?>
                <tr>
                    <td><?php echo htmlspecialchars($bebida->getNome()); ?></td>
                    <td><?php echo htmlspecialchars($bebida->getCategoria()); ?></td>
                    <td><?php echo htmlspecialchars($bebida->getVolume()); ?></td>
                    <td>R$ <?php echo number_format($bebida->getValor(), 2, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($bebida->getQtde()); ?></td>
                    <td class="acoes-cell">
                        <a href="?editar=<?php echo urlencode($bebida->getNome()); ?>">
                            <button type="button" class="btn-editar">Editar</button>
                        </a>
                        <form method="POST">
                            <input type="hidden" name="acao" value="deletar">
                            <input type="hidden" name="nome" value="<?php echo htmlspecialchars($bebida->getNome()); ?>">
                            <button type="submit" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir <?php echo htmlspecialchars($bebida->getNome()); ?>?');">Excluir</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>