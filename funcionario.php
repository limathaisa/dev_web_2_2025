<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="funcionario.css">
</head>
<body>
    <h1>Funcionarios</h1>
</body>
</html>

<?php

abstract class Funcionario {
    public $nome;
    public  $salario;

    public function __construct($nome, $salario) {
        $this->nome = $nome;
        $this->salario = $salario;
    }


    abstract public function calcularBonus();
}

class Gerente extends Funcionario {
  
    public function calcularBonus() {
        return $this->salario * 0.20;
    }
}

class Desenvolvedor extends Funcionario {
 
    public function calcularBonus() {
        return $this->salario * 0.10;
    }
}


$funcionarios = [
    new Gerente("Marcos Silva", 10000),
    new Desenvolvedor("Ana Paula", 7000),
    new Desenvolvedor("Carlos Souza", 8500),
    new Gerente("Fernanda Lima", 12000),
    new Desenvolvedor("Juliana Torres", 9000)
];


foreach ($funcionarios as $funcionario) {
    echo "<P>Funcionário: </P>" . $funcionario->nome;
    echo "  ||Bônus:R$ " . number_format($funcionario->calcularBonus(), 2, ',', '.')."<br>";
}
?>

 
