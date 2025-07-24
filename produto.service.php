<?php

  include("../model/produto.class.php");
  function cadastrarProduto($nome, $preco) {
    $funcionario = new Produto(null, $nome, $preco);
    $funcionario->cadastrar();
  }

  function listarProduto($filtroNome) {
    $produtos = Produto::listar($filtroNome);
    echo "<table><thead><tr><th>Nome</th><th>Preço</th></thead><tbody>";
    foreach($produtos as $produto) {
      echo "<tr><td>".$produto->nome."</td>";
      echo "<td>".$produto->preco."</td></tr>";
    }
    echo "</tbody></table>";
  }

?>