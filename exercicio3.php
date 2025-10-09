<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda de Contatos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f0f8ff;
        }
        h2 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
            background: #fff;
            padding: 15px;
            border: 1px solid #ccc;
            width: 300px;
        }
        input[type="text"], input[type="tel"] {
            width: 90%;
            padding: 5px;
            margin: 5px 0;
        }
        input[type="submit"] {
            padding: 7px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 5px;
        }
        .resultado {
            background-color: #e6ffe6;
            padding: 10px;
            border: 1px solid #5cb85c;
            margin-bottom: 20px;
            width: 300px;
        }
        .lista-contatos {
            margin-top: 20px;
            background: #fff;
            padding: 15px;
            border: 1px solid #ccc;
            width: 350px;
        }
    </style>
</head>
<body>
    <h2>Agenda de Contatos</h2>

    <form method="POST">
        <h3>Adicionar Contato</h3>
        <input type="hidden" name="acao" value="adicionar">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="tel" name="telefone" placeholder="Telefone" required>
        <input type="submit" value="Adicionar">
    </form>

    <form method="POST">
        <h3>Remover Contato</h3>
        <input type="hidden" name="acao" value="remover">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="submit" value="Remover">
    </form>

    <form method="POST">
        <h3>Buscar Contato</h3>
        <input type="hidden" name="acao" value="buscar">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="submit" value="Buscar">
    </form>

   

</body>
</html>


<?php
// Inicializa ou recupera a lista de contatos da sessão
session_start();

if (!isset($_SESSION['contatos'])) {
    $_SESSION['contatos'] = [];
}

// Função para ordenar contatos alfabeticamente
function ordenarContatos(&$contatos) {
    usort($contatos, function ($a, $b) {
        return strcmp(strtolower($a['nome']), strtolower($b['nome']));
    });
}

// Adicionar contato
if (isset($_POST['acao']) && $_POST['acao'] === 'adicionar') {
    $nome = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);

    if ($nome && $telefone) {
        $_SESSION['contatos'][] = ['nome' => $nome, 'telefone' => $telefone];
        ordenarContatos($_SESSION['contatos']);
    }
}

// Remover contato
if (isset($_POST['acao']) && $_POST['acao'] === 'remover') {
    $nomeRemover = trim($_POST['nome']);
    $_SESSION['contatos'] = array_filter($_SESSION['contatos'], function ($contato) use ($nomeRemover) {
        return strtolower($contato['nome']) !== strtolower($nomeRemover);
    });
}

// Buscar contato
$contatoEncontrado = null;
if (isset($_POST['acao']) && $_POST['acao'] === 'buscar') {
    $nomeBuscar = trim($_POST['nome']);
    foreach ($_SESSION['contatos'] as $contato) {
        if (strtolower($contato['nome']) === strtolower($nomeBuscar)) {
            $contatoEncontrado = $contato;
            break;
        }
    }
}
?>

