<?php
// Inclui a classe Produto
require_once 'Produto.php';

/**
 * Classe ProdutosDAO
 * Responsável por todas as operações de CRUD (Create, Read, Update, Delete)
 * na fonte de dados (arquivo produtos.json).
 */
class ProdutosDAO {
    private $filename = 'produtos.json';

    /**
     * Carrega todos os produtos do arquivo JSON.
     *
     * @return Produto[] Um array de objetos Produto.
     */
    private function readData() {
        // Verifica se o arquivo existe
        if (!file_exists($this->filename)) {
            // Se não existir, retorna um array vazio.
            return [];
        }

        // Lê o conteúdo do arquivo
        $json = file_get_contents($this->filename);

        // Decodifica o JSON para um array associativo do PHP
        $data = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            // Em caso de erro de decodificação, loga ou lança exceção (aqui, retorna vazio)
            echo "Erro ao decodificar JSON: " . json_last_error_msg() . "\n";
            return [];
        }

        $produtos = [];
        // Converte cada array associativo de volta para um objeto Produto
        foreach ($data as $item) {
            $produtos[] = new Produto($item['codigo'], $item['nome'], $item['preco']);
        }

        return $produtos;
    }

   
    private function writeData(array $produtos) {
        $dataArray = [];
        // Converte cada objeto Produto para um array
        foreach ($produtos as $produto) {
            $dataArray[] = $produto->toArray();
        }

        // Codifica o array do PHP para uma string JSON formatada (JSON_PRETTY_PRINT)
        $json = json_encode($dataArray, JSON_PRETTY_PRINT);

        if (json_last_error() !== JSON_ERROR_NONE) {
             // Em caso de erro de codificação
            echo "Erro ao codificar JSON: " . json_last_error_msg() . "\n";
            return false;
        }

        // Escreve a string JSON no arquivo. LOCK_EX garante que apenas um processo escreva por vez.
        return file_put_contents($this->filename, $json, LOCK_EX) !== false;
    }

    private function getNextCodigo(array $produtos) {
        $maxCodigo = 0;
        foreach ($produtos as $produto) {
            if ($produto->codigo > $maxCodigo) {
                $maxCodigo = $produto->codigo;
            }
        }
        return $maxCodigo + 1;
    }

    // --- Métodos CRUD ---

    public function create(Produto $produto) {
        $produtos = $this->readData();

        // Gera o próximo código e o atribui ao produto
        $produto->codigo = $this->getNextCodigo($produtos);

        $produtos[] = $produto;

        if ($this->writeData($produtos)) {
            return $produto;
        }

        return null; // Retorna null em caso de falha na escrita
    }

    
    public function findAll() {
        return $this->readData();
    }

   
    public function findByCodigo($codigo) {
        $produtos = $this->readData();
        $codigo = (int) $codigo; // Garante que o código seja um inteiro

        foreach ($produtos as $produto) {
            if ($produto->codigo === $codigo) {
                return $produto;
            }
        }
        return null;
    }

    
    public function update(Produto $produto) {
        $produtos = $this->readData();
        $found = false;

        foreach ($produtos as $key => $p) {
            if ($p->codigo === $produto->codigo) {
                // Atualiza o produto na lista
                $produtos[$key] = $produto;
                $found = true;
                break;
            }
        }

        if ($found) {
            return $this->writeData($produtos);
        }

        return false; // Produto não encontrado
    }

   
    public function delete($codigo) {
        $produtos = $this->readData();
        $codigo = (int) $codigo;
        $initialCount = count($produtos);

        // Filtra a lista, mantendo apenas os produtos que NÃO têm o código fornecido
        $produtos = array_filter($produtos, function(Produto $p) use ($codigo) {
            return $p->codigo !== $codigo;
        });

        // Reorganiza os índices do array
        $produtos = array_values($produtos);

        // Se a contagem diminuiu, significa que um produto foi removido
        if (count($produtos) < $initialCount) {
            return $this->writeData($produtos);
        }

        return false; // Produto não encontrado
    }
}

?>