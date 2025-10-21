<?php
class Produto {
    public $id;
    public $nome;
    public $preco;
    public $quantidade;

    public function __construct($id, $nome, $preco, $quantidade) {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }
}
<?php
require_once 'Produto.php';

class Mercado {
    private $produtos = [];
    private $nextId = 1;

    // CREATE
    public function adicionarProduto($nome, $preco, $quantidade) {
        $produto = new Produto($this->nextId++, $nome, $preco, $quantidade);
        $this->produtos[$produto->id] = $produto;
        return $produto;
    }

    // READ
    public function listarProdutos() {
        return $this->produtos;
    }

    public function buscarProdutoPorId($id) {
        return $this->produtos[$id] ?? null;
    }

    // UPDATE
    public function atualizarProduto($id, $nome, $preco, $quantidade) {
        if (isset($this->produtos[$id])) {
            $this->produtos[$id]->nome = $nome;
            $this->produtos[$id]->preco = $preco;
            $this->produtos[$id]->quantidade = $quantidade;
            return true;
        }
        return false;
    }

    // DELETE
    public function removerProduto($id) {
        if (isset($this->produtos[$id])) {
            unset($this->produtos[$id]);
            return true;
        }
        return false;
    }
}
<?php
require_once 'Mercado.php';

$mercado = new Mercado();

// Criando produtos
$mercado->adicionarProduto("Arroz 5kg", 25.90, 100);
$mercado->adicionarProduto("Feijão 1kg", 8.50, 200);

// Listando produtos
echo "🛒 Lista de Produtos:<br>";
foreach ($mercado->listarProdutos() as $produto) {
    echo "ID: {$produto->id}, Nome: {$produto->nome}, Preço: R$ {$produto->preco}, Quantidade: {$produto->quantidade}<br>";
}

// Atualizando um produto
echo "<br>✏️ Atualizando produto com ID 1...<br>";
$mercado->atualizarProduto(1, "Arroz Branco 5kg", 27.90, 90);

// Exibindo produto atualizado
$produtoAtualizado = $mercado->buscarProdutoPorId(1);
echo "Atualizado: {$produtoAtualizado->nome}, R$ {$produtoAtualizado->preco}, Qtd: {$produtoAtualizado->quantidade}<br>";

// Removendo produto
echo "<br>❌ Removendo produto com ID 2...<br>";
$mercado->removerProduto(2);

// Listando novamente
echo "<br>📋 Lista Final de Produtos:<br>";
foreach ($mercado->listarProdutos() as $produto) {
    echo "ID: {$produto->id}, Nome: {$produto->nome}, Preço: R$ {$produto->preco}, Quantidade: {$produto->quantidade}<br>";
}
