<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="get">
    <label>Digite um número:</label>
    <input type="number" name="numero" required>

    <label>Dificuldade:</label>
    <select name="acao" required>
        <option value="facil">Fácil</option>
        <option value="medio">Médio</option>
        <option value="dificil">Difícil</option>
    </select>

    <button>Enviar</button>
</form>

</body>
</html>



<?php
$numero = $_GET['numero'] ?? null;
$acao = $_GET['acao'] ?? null;

if ($numero !== null && $acao !== null) {
    // Definindo número aleatório (idealmente salvar em sessão)
    $number = rand(1, 100); // Isso reinicia a cada envio! Depois mostro como melhorar.

    // Define tentativas com base na dificuldade
    switch ($acao) {
        case 'facil':
            $tentativas = 10;
            break;
        case 'medio':
            $tentativas = 5;
            break;
        case 'dificil':
            $tentativas = 3;
            break;
        default:
            $tentativas = 1;
    }
    for ($i=0; $i <= $tentativa; $i++){
        if($numero == $number){
            echo "voce acertou!";
            break;
        }
        if ($numero != $number){
            echo "voce errou tente novamente! restam".$tentativa."tentativas";
        }
    }

    }
  

?>
