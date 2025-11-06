<?php
// Configurações para exibir erros (apenas para desenvolvimento)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Inclui a classe DAO, que por sua vez inclui a classe Produto
require_once 'ProdutosDAO.php';

echo "<h1>Teste do CRUD com ProdutosDAO (JSON)</h1>";

// 1. Inicializa o DAO
$dao = new ProdutosDAO();

// Função auxiliar para exibir a lista de produtos
function listarProdutos($dao) {
    echo "<h2>Lista Atual de Produtos:</h2>";
    $produtos = $dao->findAll();
    if (empty($produtos)) {
        echo "<p>Nenhum produto cadastrado.</p>";
    } else {
        echo "<pre>";
        print_r($produtos);
        echo "</pre>";
    }
}

// Função para gerar um preço aleatório (entre R$ 0,50 e R$ 150,00)
function precoAleatorio() {
    // Gera um valor entre 50 e 15000 (centavos)
    $centavos = mt_rand(50, 15000); 
    // Converte para reais
    return round($centavos / 100, 2);
}

// Limpa o arquivo JSON para garantir um teste limpo
echo "<h2>1. Resetando os dados (Excluindo e recriando o arquivo produtos.json)</h2>";
if (file_put_contents('produtos.json', '[]') !== false) {
    echo "<p>Arquivo 'produtos.json' resetado com sucesso.</p>";
} else {
    echo "<p>ATENÇÃO: Não foi possível resetar o arquivo 'produtos.json'. Verifique as permissões.</p>";
}
listarProdutos($dao);

// --- C R U D: CREATE (Criar) ---
echo "<h2>2. CREATE (Criação de Produtos)</h2>";

// Produtos Originais
$produto1 = new Produto(0, "Notebook Gamer", 4500.50); // O código 0 será ignorado
$produto2 = new Produto(0, "Mouse Sem Fio", 55.90);
$produto3 = new Produto(0, "Teclado Mecânico", 299.00);

// Novos 8 Produtos Solicitados (Códigos de forma aleatória serão gerados pelo DAO)
$produto4 = new Produto(0, "Tomate (kg)", precoAleatorio());
$produto5 = new Produto(0, "Maçã Gala (kg)", precoAleatorio());
$produto6 = new Produto(0, "Queijo Brie (300g)", precoAleatorio());
$produto7 = new Produto(0, "Iogurte Grego (Pack)", precoAleatorio());
$produto8 = new Produto(0, "Guaraná Jesus (2L)", precoAleatorio());
$produto9 = new Produto(0, "Bolacha Bono Chocolate", precoAleatorio());
$produto10 = new Produto(0, "Desinfetante Urca (1L)", precoAleatorio());
$produto11 = new Produto(0, "Prestobarba Bic (3 unid)", precoAleatorio());

// Array de produtos a serem criados
$produtosParaCriar = [
    'Original 1' => $produto1,
    'Original 2' => $produto2,
    'Original 3' => $produto3,
    'Tomate' => $produto4,
    'Maçã' => $produto5,
    'Queijo Brie' => $produto6,
    'Iogurte Grego' => $produto7,
    'Guaraná Jesus' => $produto8,
    'Bolacha Bono' => $produto9,
    'Desinfetante Urca' => $produto10,
    'Prestobarba Bic' => $produto11,
];

$novosProdutos = [];
foreach ($produtosParaCriar as $nomeKey => $produto) {
    $novoProduto = $dao->create($produto);
    if ($novoProduto) {
        $novosProdutos[$nomeKey] = $novoProduto;
        echo "<p>Produto '{$novoProduto->nome}' ({$nomeKey}) criado com código: {$novoProduto->codigo} e Preço: R$ " . number_format($novoProduto->preco, 2, ',', '.') . "</p>";
    }
}

// Pega os códigos dos produtos que serão usados nas próximas etapas
$codigoParaBuscar = $novosProdutos['Original 2']->codigo;
$codigoParaAtualizarOriginal1 = $novosProdutos['Original 1']->codigo;
$codigoDesinfetanteUrca = $novosProdutos['Desinfetante Urca']->codigo;
$codigoBolachaBono = $novosProdutos['Bolacha Bono']->codigo;

// Códigos para exclusão
$codigoParaDeletarGuarana = $novosProdutos['Guaraná Jesus']->codigo;
$codigoParaDeletarMaca = $novosProdutos['Maçã']->codigo; // NOVO: Código da Maçã
$codigoParaDeletarTomate = $novosProdutos['Tomate']->codigo; // NOVO: Código do Tomate

listarProdutos($dao);

// --- C R U D: READ (Ler) ---
echo "<h2>3. READ (Leitura Específica)</h2>";

$produtoEncontrado = $dao->findByCodigo($codigoParaBuscar);

if ($produtoEncontrado) {
    echo "<p>Produto encontrado (Código {$codigoParaBuscar}):</p>";
    echo "<pre>";
    print_r($produtoEncontrado);
    echo "</pre>";
} else {
    echo "<p>Produto com código {$codigoParaBuscar} não encontrado.</p>";
}

// --- C R U D: UPDATE (Atualizar) ---
echo "<h2>4. UPDATE (Atualização de Produto)</h2>";

// A. Altera o produto Original 1
$produtoParaAtualizar1 = new Produto($codigoParaAtualizarOriginal1, "Notebook Gamer Pro (Atualizado)", 5100.99);
if ($dao->update($produtoParaAtualizar1)) {
    echo "<p>Produto com código {$produtoParaAtualizar1->codigo} atualizado com sucesso (Notebook).</p>";
} else {
    echo "<p>Falha ao atualizar o produto com código {$produtoParaAtualizar1->codigo} (Notebook).</p>";
}

// B. MODIFICAÇÃO 1: Desinfetante Urca -> Desinfetante Barbarex (e novo preço)
$novoPrecoBarbarex = 12.55; 
$produtoBarbarex = new Produto($codigoDesinfetanteUrca, "Desinfetante Barbarex (1L) (Modificado)", $novoPrecoBarbarex);

if ($dao->update($produtoBarbarex)) {
    echo "<p>Produto com código {$codigoDesinfetanteUrca} atualizado com sucesso: Nome para '{$produtoBarbarex->nome}' e Novo Preço: R$ " . number_format($novoPrecoBarbarex, 2, ',', '.') . "</p>";
} else {
    echo "<p>Falha ao atualizar o Desinfetante Urca (código {$codigoDesinfetanteUrca}).</p>";
}

// C. MODIFICAÇÃO 2: Alteração do preço da Bolacha Bono (e novo preço)
$novoPrecoBono = 3.99; 
$produtoBono = new Produto($codigoBolachaBono, "Bolacha Bono Chocolate", $novoPrecoBono); 

if ($dao->update($produtoBono)) {
    echo "<p>Produto com código {$codigoBolachaBono} atualizado com sucesso: Novo Preço: R$ " . number_format($novoPrecoBono, 2, ',', '.') . "</p>";
} else {
    echo "<p>Falha ao atualizar a Bolacha Bono (código {$codigoBolachaBono}).</p>";
}

listarProdutos($dao);

// --- C R U D: DELETE (Deletar) ---
echo "<h2>5. DELETE (Exclusão de Produto)</h2>";

// 1. Deleta o Guaraná Jesus (mantido do script anterior)
if ($dao->delete($codigoParaDeletarGuarana)) {
    echo "<p>Produto com código {$codigoParaDeletarGuarana} DELETADO com sucesso (Era o Guaraná Jesus).</p>";
} else {
    echo "<p>Falha ao deletar o produto Guaraná Jesus (código {$codigoParaDeletarGuarana}).</p>";
}

// 2. NOVO: Deleta a Maçã
if ($dao->delete($codigoParaDeletarMaca)) {
    echo "<p>Produto com código {$codigoParaDeletarMaca} DELETADO com sucesso (Era a Maçã).</p>";
} else {
    echo "<p>Falha ao deletar o produto Maçã (código {$codigoParaDeletarMaca}).</p>";
}

// 3. NOVO: Deleta o Tomate
if ($dao->delete($codigoParaDeletarTomate)) {
    echo "<p>Produto com código {$codigoParaDeletarTomate} DELETADO com sucesso (Era o Tomate).</p>";
} else {
    echo "<p>Falha ao deletar o produto Tomate (código {$codigoParaDeletarTomate}).</p>";
}

listarProdutos($dao);

// Tentativa de buscar os produtos deletados
echo "<h3>Verificação do Delete:</h3>";
$codigosDeletados = ['Guaraná Jesus' => $codigoParaDeletarGuarana, 'Maçã' => $codigoParaDeletarMaca, 'Tomate' => $codigoParaDeletarTomate];

foreach ($codigosDeletados as $nome => $codigo) {
    $produtoDeletado = $dao->findByCodigo($codigo);
    if ($produtoDeletado === null) {
        echo "<p>Confirmação: Produto **{$nome}** (código {$codigo}) realmente não existe mais.</p>";
    } else {
        echo "<p>Erro: O produto **{$nome}** (código {$codigo}) deletado ainda foi encontrado.</p>";
    }
}

?>


