<?php
class Livro {
    public $id;
    public $titulo;
    public $autor;
    public $ano;

    public function __construct($id, $titulo, $autor, $ano) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ano = $ano;
    }
}
<?php
require_once 'Livro.php';

class Biblioteca {
    private $livros = [];
    private $nextId = 1;

    // CREATE
    public function adicionarLivro($titulo, $autor, $ano) {
        $livro = new Livro($this->nextId++, $titulo, $autor, $ano);
        $this->livros[$livro->id] = $livro;
        return $livro;
    }

    // READ
    public function listarLivros() {
        return $this->livros;
    }

    public function buscarLivroPorId($id) {
        return $this->livros[$id] ?? null;
    }

    // UPDATE
    public function atualizarLivro($id, $titulo, $autor, $ano) {
        if (isset($this->livros[$id])) {
            $this->livros[$id]->titulo = $titulo;
            $this->livros[$id]->autor = $autor;
            $this->livros[$id]->ano = $ano;
            return true;
        }
        return false;
    }

    // DELETE
    public function removerLivro($id) {
        if (isset($this->livros[$id])) {
            unset($this->livros[$id]);
            return true;
        }
        return false;
    }
}
<?php
require_once 'Biblioteca.php';

$biblioteca = new Biblioteca();

// Criar livros
$biblioteca->adicionarLivro("1984", "George Orwell", 1949);
$biblioteca->adicionarLivro("Dom Casmurro", "Machado de Assis", 1899);

// Listar livros
echo "📚 Lista de Livros:<br>";
foreach ($biblioteca->listarLivros() as $livro) {
    echo "ID: {$livro->id}, Título: {$livro->titulo}, Autor: {$livro->autor}, Ano: {$livro->ano}<br>";
}

// Atualizar um livro
echo "<br>✏️ Atualizando livro com ID 1...<br>";
$biblioteca->atualizarLivro(1, "1984 (Edição Revisada)", "George Orwell", 1950);

// Mostrar livro atualizado
$livroAtualizado = $biblioteca->buscarLivroPorId(1);
echo "Atualizado: {$livroAtualizado->titulo}, {$livroAtualizado->autor}, {$livroAtualizado->ano}<br>";

// Remover um livro
echo "<br>❌ Removendo livro com ID 2...<br>";
$biblioteca->removerLivro(2);

// Listar novamente
echo "<br>📋 Lista Final de Livros:<br>";
foreach ($biblioteca->listarLivros() as $livro) {
    echo "ID: {$livro->id}, Título: {$livro->titulo}, Autor: {$livro->autor}, Ano: {$livro->ano}<br>";
}
<?php
require_once 'Biblioteca.php';

$biblioteca = new Biblioteca();

// Criar livros
$biblioteca->adicionarLivro("1984", "George Orwell", 1949);
$biblioteca->adicionarLivro("Dom Casmurro", "Machado de Assis", 1899);

// Listar livros
echo "📚 Lista de Livros:<br>";
foreach ($biblioteca->listarLivros() as $livro) {
    echo "ID: {$livro->id}, Título: {$livro->titulo}, Autor: {$livro->autor}, Ano: {$livro->ano}<br>";
}

// Atualizar um livro
echo "<br>✏️ Atualizando livro com ID 1...<br>";
$biblioteca->atualizarLivro(1, "1984 (Edição Revisada)", "George Orwell", 1950);

// Mostrar livro atualizado
$livroAtualizado = $biblioteca->buscarLivroPorId(1);
echo "Atualizado: {$livroAtualizado->titulo}, {$livroAtualizado->autor}, {$livroAtualizado->ano}<br>";

// Remover um livro
echo "<br>❌ Removendo livro com ID 2...<br>";
$biblioteca->removerLivro(2);

// Listar novamente
echo "<br>📋 Lista Final de Livros:<br>";
foreach ($biblioteca->listarLivros() as $livro) {
    echo "ID: {$livro->id}, Título: {$livro->titulo}, Autor: {$livro->autor}, Ano: {$livro->ano}<br>";
}
📚 Lista de Livros:
ID: 1, Título: 1984, Autor: George Orwell, Ano: 1949
ID: 2, Título: Dom Casmurro, Autor: Machado de Assis, Ano: 1899

✏️ Atualizando livro com ID 1...
Atualizado: 1984 (Edição Revisada), George Orwell, 1950

❌ Removendo livro com ID 2...

📋 Lista Final de Livros:
ID: 1, Título: 1984 (Edição Revisada), Autor: George Orwell, Ano: 1950
