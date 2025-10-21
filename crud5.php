<?php
class Funcionario {
    public $id;
    public $nome;
    public $cargo;
    public $salario;

    public function __construct($id, $nome, $cargo, $salario) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->salario = $salario;
    }
}
<?php
require_once 'Funcionario.php';

class Empresa {
    private $funcionarios = [];
    private $nextId = 1;

    // CREATE
    public function adicionarFuncionario($nome, $cargo, $salario) {
        $funcionario = new Funcionario($this->nextId++, $nome, $cargo, $salario);
        $this->funcionarios[$funcionario->id] = $funcionario;
        return $funcionario;
    }

    // READ
    public function listarFuncionarios() {
        return $this->funcionarios;
    }

    public function buscarFuncionarioPorId($id) {
        return $this->funcionarios[$id] ?? null;
    }

    // UPDATE
    public function atualizarFuncionario($id, $nome, $cargo, $salario) {
        if (isset($this->funcionarios[$id])) {
            $this->funcionarios[$id]->nome = $nome;
            $this->funcionarios[$id]->cargo = $cargo;
            $this->funcionarios[$id]->salario = $salario;
            return true;
        }
        return false;
    }

    // DELETE
    public function removerFuncionario($id) {
        if (isset($this->funcionarios[$id])) {
            unset($this->funcionarios[$id]);
            return true;
        }
        return false;
    }
}
<?php
require_once 'Empresa.php';

$empresa = new Empresa();

// Adicionar funcionários
$empresa->adicionarFuncionario("João Oliveira", "Analista", 4200.00);
$empresa->adicionarFuncionario("Larissa Mendes", "Gerente", 7500.00);

// Listar funcionários
echo "🏢 Lista de Funcionários:<br>";
foreach ($empresa->listarFuncionarios() as $f) {
    echo "ID: {$f->id}, Nome: {$f->nome}, Cargo: {$f->cargo}, Salário: R$ {$f->salario}<br>";
}

// Atualizar um funcionário
echo "<br>✏️ Atualizando funcionário com ID 1...<br>";
$empresa->atualizarFuncionario(1, "João Oliveira", "Analista Sênior", 5200.00);

// Mostrar funcionário atualizado
$funcAtualizado = $empresa->buscarFuncionarioPorId(1);
echo "Atualizado: {$funcAtualizado->nome}, {$funcAtualizado->cargo}, R$ {$funcAtualizado->salario}<br>";

// Remover um funcionário
echo "<br>❌ Removendo funcionário com ID 2...<br>";
$empresa->removerFuncionario(2);

// Listar final
echo "<br>📋 Lista Final de Funcionários:<br>";
foreach ($empresa->listarFuncionarios() as $f) {
    echo "ID: {$f->id}, Nome:
