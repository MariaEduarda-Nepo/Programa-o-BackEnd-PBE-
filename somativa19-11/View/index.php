<?php

namespace Biblioteca;

require_once __DIR__ . '/../Controller/LivroController.php';
$controller = new LivroController();

// Variável para controlar modo de edição
$editando = false;
$livroEditar = null;
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    
    if ($acao === 'criar') {
        $controller->criar(
            $_POST['titulo'],
            $_POST['autor'],
            $_POST['ano'],
            $_POST['genero'],
            $_POST['quantidade']
        );
        $mensagem = 'Livro cadastrado com sucesso!';
    } elseif ($acao === 'atualizar') {
        $controller->atualizar(
            $_POST['tituloOriginal'],
            $_POST['titulo'],
            $_POST['autor'],
            $_POST['ano'],
            $_POST['genero'],
            $_POST['quantidade']
        );
        $mensagem = 'Livro atualizado com sucesso!';
    } elseif ($acao === 'deletar') {
        $controller->deletar($_POST['titulo']);
        $mensagem = 'Livro excluído com sucesso!';
    }
    
    // Redireciona para evitar reenvio do formulário
    header('Location: ' . $_SERVER['PHP_SELF'] . '?msg=' . urlencode($mensagem));
    exit;
}

// Verifica se está editando
if (isset($_GET['editar'])) {
    $editando = true;
    $livroEditar = $controller->buscarPorTitulo($_GET['editar']);
}

// Captura mensagem de feedback
if (isset($_GET['msg'])) {
    $mensagem = $_GET['msg'];
}

$livros = $controller->ler();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Escolar - Sistema de Gerenciamento</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.1em;
            opacity: 0.9;
        }

        .content {
            padding: 30px;
        }

        .mensagem {
            background: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
            animation: slideDown 0.5s ease;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .form-container {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
            border: 2px solid #e9ecef;
        }

        .form-container.editing {
            border: 2px solid #2196F3;
            background: #e3f2fd;
        }

        .form-title {
            color: #333;
            margin-bottom: 20px;
            font-size: 1.5em;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-title::before {
            content: "📚";
            font-size: 1.2em;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 600;
            color: #555;
            margin-bottom: 5px;
            font-size: 0.9em;
        }

        input, select {
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 1em;
            transition: all 0.3s;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        button {
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .btn-salvar {
            background: #4CAF50;
            color: white;
        }

        .btn-salvar:hover {
            background: #45a049;
        }

        .btn-atualizar {
            background: #2196F3;
            color: white;
        }

        .btn-atualizar:hover {
            background: #0b7dda;
        }

        .btn-cancelar {
            background: #9E9E9E;
            color: white;
        }

        .btn-cancelar:hover {
            background: #757575;
        }

        .table-container {
            overflow-x: auto;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9em;
            letter-spacing: 0.5px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
        }

        tbody tr {
            transition: background 0.3s;
        }

        tbody tr:hover {
            background: #f8f9fa;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-editar {
            background: #FF9800;
            color: white;
            padding: 8px 15px;
            font-size: 0.9em;
        }

        .btn-editar:hover {
            background: #e68900;
        }

        .btn-excluir {
            background: #f44336;
            color: white;
            padding: 8px 15px;
            font-size: 0.9em;
        }

        .btn-excluir:hover {
            background: #da190b;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }

        .empty-state::before {
            content: "📖";
            font-size: 4em;
            display: block;
            margin-bottom: 20px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .stat-number {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-label {
            opacity: 0.9;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📚 Biblioteca Escolar SENAI</h1>
            <p>Sistema de Gerenciamento de Livros</p>
        </div>

        <div class="content">
            <?php if ($mensagem): ?>
            <div class="mensagem">
                ✓ <?php echo htmlspecialchars($mensagem); ?>
            </div>
            <?php endif; ?>

            <!-- Estatísticas -->
            <div class="stats">
                <div class="stat-card">
                    <div class="stat-number"><?php echo count($livros); ?></div>
                    <div class="stat-label">Livros Cadastrados</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">
                        <?php 
                        $total = 0;
                        foreach ($livros as $livro) {
                            $total += $livro->getQuantidade();
                        }
                        echo $total;
                        ?>
                    </div>
                    <div class="stat-label">Exemplares Disponíveis</div>
                </div>
            </div>

            <!-- Formulário -->
            <div class="form-container <?php echo $editando ? 'editing' : ''; ?>">
                <h2 class="form-title">
                    <?php echo $editando ? '✏️ Editar Livro' : '➕ Cadastrar Novo Livro'; ?>
                </h2>

                <form method="POST">
                    <?php if ($editando && $livroEditar): ?>
                        <input type="hidden" name="acao" value="atualizar">
                        <input type="hidden" name="tituloOriginal" value="<?php echo htmlspecialchars($livroEditar->getTitulo()); ?>">
                    <?php else: ?>
                        <input type="hidden" name="acao" value="criar">
                    <?php endif; ?>

                    <div class="form-grid">
                        <div class="form-group">
                            <label>Título do Livro *</label>
                            <input type="text" name="titulo" 
                                   value="<?php echo $editando && $livroEditar ? htmlspecialchars($livroEditar->getTitulo()) : ''; ?>" 
                                   placeholder="Ex: Dom Casmurro" required>
                        </div>

                        <div class="form-group">
                            <label>Autor *</label>
                            <input type="text" name="autor" 
                                   value="<?php echo $editando && $livroEditar ? htmlspecialchars($livroEditar->getAutor()) : ''; ?>" 
                                   placeholder="Ex: Machado de Assis" required>
                        </div>

                        <div class="form-group">
                            <label>Ano de Publicação *</label>
                            <input type="number" name="ano" min="1000" max="2025"
                                   value="<?php echo $editando && $livroEditar ? $livroEditar->getAno() : ''; ?>" 
                                   placeholder="Ex: 1899" required>
                        </div>

                        <div class="form-group">
                            <label>Gênero Literário *</label>
                            <select name="genero" required>
                                <option value="">Selecione o gênero</option>
                                <option value="Romance" <?php echo ($editando && $livroEditar && $livroEditar->getGenero() === 'Romance') ? 'selected' : ''; ?>>Romance</option>
                                <option value="Ficção" <?php echo ($editando && $livroEditar && $livroEditar->getGenero() === 'Ficção') ? 'selected' : ''; ?>>Ficção</option>
                                <option value="Ficção Científica" <?php echo ($editando && $livroEditar && $livroEditar->getGenero() === 'Ficção Científica') ? 'selected' : ''; ?>>Ficção Científica</option>
                                <option value="Fantasia" <?php echo ($editando && $livroEditar && $livroEditar->getGenero() === 'Fantasia') ? 'selected' : ''; ?>>Fantasia</option>
                                <option value="Suspense" <?php echo ($editando && $livroEditar && $livroEditar->getGenero() === 'Suspense') ? 'selected' : ''; ?>>Suspense</option>
                                <option value="Terror" <?php echo ($editando && $livroEditar && $livroEditar->getGenero() === 'Terror') ? 'selected' : ''; ?>>Terror</option>
                                <option value="Aventura" <?php echo ($editando && $livroEditar && $livroEditar->getGenero() === 'Aventura') ? 'selected' : ''; ?>>Aventura</option>
                                <option value="Biografia" <?php echo ($editando && $livroEditar && $livroEditar->getGenero() === 'Biografia') ? 'selected' : ''; ?>>Biografia</option>
                                <option value="História" <?php echo ($editando && $livroEditar && $livroEditar->getGenero() === 'História') ? 'selected' : ''; ?>>História</option>
                                <option value="Poesia" <?php echo ($editando && $livroEditar && $livroEditar->getGenero() === 'Poesia') ? 'selected' : ''; ?>>Poesia</option>
                                <option value="Drama" <?php echo ($editando && $livroEditar && $livroEditar->getGenero() === 'Drama') ? 'selected' : ''; ?>>Drama</option>
                                <option value="Autoajuda" <?php echo ($editando && $livroEditar && $livroEditar->getGenero() === 'Autoajuda') ? 'selected' : ''; ?>>Autoajuda</option>
                                <option value="Técnico" <?php echo ($editando && $livroEditar && $livroEditar->getGenero() === 'Técnico') ? 'selected' : ''; ?>>Técnico</option>
                                <option value="Didático" <?php echo ($editando && $livroEditar && $livroEditar->getGenero() === 'Didático') ? 'selected' : ''; ?>>Didático</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Quantidade de Exemplares *</label>
                            <input type="number" name="quantidade" min="1"
                                   value="<?php echo $editando && $livroEditar ? $livroEditar->getQuantidade() : ''; ?>" 
                                   placeholder="Ex: 5" required>
                        </div>
                    </div>

                    <div class="button-group">
                        <?php if ($editando): ?>
                            <button type="submit" class="btn-atualizar">
                                <span>✓</span> Atualizar Livro
                            </button>
                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>" style="text-decoration: none;">
                                <button type="button" class="btn-cancelar">
                                    <span>✕</span> Cancelar
                                </button>
                            </a>
                        <?php else: ?>
                            <button type="submit" class="btn-salvar">
                                <span>+</span> Salvar Livro
                            </button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <!-- Tabela de Livros -->
            <h2 style="margin-bottom: 20px; color: #333;">📖 Catálogo de Livros</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Ano</th>
                            <th>Gênero</th>
                            <th>Exemplares</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($livros)): ?>
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <p style="font-size: 1.2em; margin-bottom: 10px;">Nenhum livro cadastrado</p>
                                    <p>Comece adicionando o primeiro livro ao acervo!</p>
                                </div>
                            </td>
                        </tr>
                        <?php else: ?>
                            <?php foreach ($livros as $livro): ?>
                            <tr>
                                <td><strong><?php echo htmlspecialchars($livro->getTitulo()); ?></strong></td>
                                <td><?php echo htmlspecialchars($livro->getAutor()); ?></td>
                                <td><?php echo htmlspecialchars($livro->getAno()); ?></td>
                                <td><?php echo htmlspecialchars($livro->getGenero()); ?></td>
                                <td><strong><?php echo htmlspecialchars($livro->getQuantidade()); ?></strong></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="?editar=<?php echo urlencode($livro->getTitulo()); ?>">
                                            <button type="button" class="btn-editar">✏️ Editar</button>
                                        </a>
                                        <form method="POST" style="display: inline;">
                                            <input type="hidden" name="acao" value="deletar">
                                            <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($livro->getTitulo()); ?>">
                                            <button type="submit" class="btn-excluir" 
                                                    onclick="return confirm('Tem certeza que deseja excluir o livro \'<?php echo htmlspecialchars($livro->getTitulo()); ?>\'?');">
                                                🗑️ Excluir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>