/crud-poo
│
├── config/
│   └── Database.php         // Conexão com o banco
│
├── classes/
│   └── Usuario.php          // Classe que representa o CRUD do usuário
│
├── public/
│   ├── create.php
│   ├── read.php
│   ├── update.php
│   └── delete.php
│
└── index.php                // Página inicial (opcional)
<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'crud_poo';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function conectar() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->exec("set names utf8");
        } catch (PDOException $e) {
            echo 'Erro de conexão: ' . $e->getMessage();
        }

        return $this->conn;
    }
}
<?php
class Usuario {
    private $conn;
    private $tabela = "usuarios";

    public $id;
    public $nome;
    public $email;

    public function __construct($db) {
        $this->conn = $db;
    }

    // CREATE
    public function criar() {
        $query = "INSERT INTO " . $this->tabela . " (
<?php
class Pessoa {
    public $id;
    public $nome;
    public $email;

    public function __construct($id, $nome, $email) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
    }
}
<?php
require_once 'Pessoa.php';

class PessoaRepository {
    private $pessoas = [];
    private $nextId = 1;

    // CREATE
    public function adicionar($nome, $email) {
        $pessoa = new Pessoa($this->nextId++, $nome, $email);
        $this->pessoas[$pessoa->id] = $pessoa;
        return $pessoa;
    }

    // READ
    public function listar() {
        return $this->pessoas;
    }

    public function buscarPorId($id) {
        return $this->pessoas[$id] ?? null;
    }

    // UPDATE
    public function atualizar($id, $nome, $email) {
        if (isset($this->pessoas[$id])) {
            $this->pessoas[$id]->nome = $nome;
            $this->pessoas[$id]->email = $email;
            return true;
        }
        return false;
    }

    // DELETE
    public function remover($id) {
        if (isset($this->pessoas[$id])) {
            unset($this->pessoas[$id]);
            return true;
        }
        return false;
    }
}
<?php
require_once 'PessoaRepository.php';

$repo = new PessoaRepository();

// Adicionar pessoas
$repo->adicionar("João", "joao@example.com");
$repo->adicionar("Maria", "maria@example.com");

// Listar pessoas
echo "🔍 Lista de Pessoas:<br>";
foreach ($repo->listar() as $pessoa) {
    echo "ID: {$pessoa->id}, Nome: {$pessoa->nome}, Email: {$pessoa->email}<br>";
}

// Atualizar uma pessoa
echo "<br>✏️ Atualizando pessoa com ID 1...<br>";
$repo->atualizar(1, "João Silva", "joao.silva@example.com");

// Mostrar pessoa atualizada
$pessoaAtualizada = $repo->buscarPorId(1);
echo "Atualizado: Nome: {$pessoaAtualizada->nome}, Email: {$pessoaAtualizada->email}<br>";

// Remover pessoa
echo "<br>❌ Removendo pessoa com ID 2...<br>";
$repo->remover(2);

// Listar novamente
echo "<br>📋 Lista Final:<br>";
foreach ($repo->listar() as $pessoa) {
    echo "ID: {$pessoa->id}, Nome: {$pessoa->nome}, Email: {$pessoa->email}<br>";
}
🔍 Lista de Pessoas:
ID: 1, Nome: João, Email: joao@example.com
ID: 2, Nome: Maria, Email: maria@example.com

✏️ Atualizando pessoa com ID 1...
Atualizado: Nome: João Silva, Email: joao.silva@example.com

❌ Removendo pessoa com ID 2...

📋 Lista Final:
ID: 1, Nome: João Silva, Email: joao.silva@example.com
