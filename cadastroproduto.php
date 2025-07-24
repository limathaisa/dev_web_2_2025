<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="cadastroFuncionario.js"></script>
  </head>
  <body>
    <form id="formCadastroproduto" action="executa.php" method="post">
      <input type"hidden" name="acao" value="Cadastrar"/>
      <input type"hidden" name="id" value="<?php echo isset ($_GET['id']) ? $_GET['id']:""?>"/>
      <label for="nome">Nome:</label
      ><input type="text" id="nome" name="nome" /><br />
      <label for="Preço">Preço:</label
      ><input type="text" id="preco" name="preco" /><br />
      <button type="submit">Cadastrar:</button>
    </form>
  </body>
</html>