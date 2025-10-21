<?php
class Aluno {
    public $id;
    public $nome;
    public $idade;
    public $serie;

    public function __construct($id, $nome, $idade, $serie) {
        $this->id = $id;
        $this->nome = $nome;
        $this->idade = $idade;
        $this->serie = $serie;
    }
}
<?php
require_once 'Aluno.php';

class Escola {
    private $alunos = [];
    private $nextId = 1;

    // CREATE
    public function adicionarAluno($nome, $idade, $serie) {
        $aluno = new Aluno($this->nextId++, $nome, $idade, $serie);
        $this->alunos[$aluno->id] = $aluno;
        return $aluno;
    }

    // READ
    public function listarAlunos() {
        return $this->alunos;
    }

    public function buscarAlunoPorId($id) {
        return $this->alunos[$id] ?? null;
    }

    // UPDATE
    public function atualizarAluno($id, $nome, $idade, $serie) {
        if (isset($this->alunos[$id])) {
            $this->alunos[$id]->nome = $nome;
            $this->alunos[$id]->idade = $idade;
            $this->alunos[$id]->serie = $serie;
            return true;
        }
        return false;
    }

    // DELETE
    public function removerAluno($id) {
        if (isset($this->alunos[$id])) {
            unset($this->alunos[$id]);
            return true;
        }
        return false;
    }
}
<?php
require_once 'Escola.php';

$escola = new Escola();

// Adicionar alunos
$escola->adicionarAluno("Ana Souza", 14, "8º ano");
$escola->adicionarAluno("Carlos Lima", 15, "9º ano");

// Listar alunos
echo "📘 Lista de Alunos:<br>";
foreach ($escola->listarAlunos() as $aluno) {
    echo "ID: {$aluno->id}, Nome: {$aluno->nome}, Idade: {$aluno->idade}, Série: {$aluno->serie}<br>";
}

// Atualizar aluno
echo "<br>✏️ Atualizando aluno com ID 1...<br>";
$escola->atualizarAluno(1, "Ana Souza Martins", 15, "9º ano");

// Mostrar aluno atualizado
$alunoAtualizado = $escola->buscarAlunoPorId(1);
echo "Atualizado: Nome: {$alunoAtualizado->nome}, Idade: {$alunoAtualizado->idade}, Série: {$alunoAtualizado->serie}<br>";

// Remover aluno
echo "<br>❌ Removendo aluno com ID 2...<br>";
$escola->removerAluno(2);

// Listar novamente
echo "<br>📋 Lista Final de Alunos:<br>";
foreach ($escola->listarAlunos() as $aluno) {
    echo "ID: {$aluno->id}, Nome: {$aluno->nome}, Idade: {$aluno->idade}, Série: {$aluno->serie}<br>";
}
