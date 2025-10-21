<?php
class Carro {
    public $id;
    public $marca;
    public $modelo;
    public $ano;
    public $preco;

    public function __construct($id, $marca, $modelo, $ano, $preco) {
        $this->id = $id;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->preco = $preco;
    }
}
<?php
require_once 'Carro.php';

class EmpresaCarros {
    private $carros = [];
    private $nextId = 1;

    // CREATE
    public function adicionarCarro($marca, $modelo, $ano, $preco) {
        $carro = new Carro($this->nextId++, $marca, $modelo, $ano, $preco);
        $this->carros[$carro->id] = $carro;
        return $carro;
    }

    // READ
    public function listarCarros() {
        return $this->carros;
    }

    public function buscarCarroPorId($id) {
        return $this->carros[$id] ?? null;
    }

    // UPDATE
    public function atualizarCarro($id, $marca, $modelo, $ano, $preco) {
        if (isset($this->carros[$id])) {
            $this->carros[$id]->marca = $marca;
            $this->carros[$id]->modelo = $modelo;
            $this->carros[$id]->ano = $ano;
            $this->carros[$id]->preco = $preco;
            return true;
        }
        return false;
    }

    // DELETE
    public function removerCarro($id) {
        if (isset($this->carros[$id])) {
            unset($this->carros[$id]);
            return true;
        }
        return false;
    }
}
<?php
require_once 'EmpresaCarros.php';

$empresa = new EmpresaCarros();

// Adicionando carros
$empresa->adicionarCarro("Toyota", "Corolla", 2020, 85000.00);
$empresa->adicionarCarro("Honda", "Civic", 2019, 79000.00);

// Listando carros
echo "🚘 Lista de Carros Disponíveis:<br>";
foreach ($empresa->listarCarros() as $carro) {
    echo "ID: {$carro->id}, Marca: {$carro->marca}, Modelo: {$carro->modelo}, Ano: {$carro->ano}, Preço: R$ {$carro->preco}<br>";
}

// Atualizando um carro
echo "<br>✏️ Atualizando carro com ID 1...<br>";
$empresa->atualizarCarro(1, "Toyota", "Corolla XEi", 2020, 88000.00);

// Exibindo carro atualizado
$carroAtualizado = $empresa->buscarCarroPorId(1);
echo "Atualizado: {$carroAtualizado->marca}, {$carroAtualizado->modelo}, {$carroAtualizado->ano}, R$ {$carroAtualizado->preco}<br>";

// Removendo um carro
echo "<br>❌ Removendo carro com ID 2...<br>";
$empresa->removerCarro(2);

// Lista final
echo "<br>📋 Lista Final de Carros:<br>";
foreach ($empresa->listarCarros()
