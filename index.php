<?php
    session_start();
    if (!isset($_SESSION["login"]) || $_SESSION["login"] == []) {
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thaaisa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            background-color: #f0f4f8; 
            color: #1e2a38; 
            padding: 20px;
            line-height: 1.6;
        }

        h1 {
            color: #102a43;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            background-color: #d9f99d; 
            color: #1a202c;
            padding: 12px 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 30px;
            font-size: 16px;
        }

        p a {
            margin-left: 15px;
            color: #2f855a;
            text-decoration: none;
            font-weight: bold;
        }

        p a:hover {
            color: #276749;
            text-decoration: underline;
        }

        h3 {
            color: #2c5282;
            text-align: center;
            margin-bottom: 15px;
            font-size: 20px;
        }

        ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 14px;
            max-width: 350px;
            margin: 0 auto;
        }

        ul li a {
            display: block;
            padding: 14px;
            background-color: #ffffff;
            color: #1e293b;
            border: 2px solid #94a3b8;
            border-radius: 10px;
            text-decoration: none;
            text-align: center;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        ul li a:hover {
            background-color: #2b6cb0;
            color: #ffffff;
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>
    <h1>Knupp & Co.</h1>
    <p>
        Bem-vindo, <?php echo $_SESSION["login"]["nome"]; ?>!
        <a href="logout.php">Logout</a>
    </p>
    <h3>Informações:</h3>
    <ul>
        <li><a href="../funcionario/tabela_funcionario.php">Tabela Funcionários</a></li>
        <li><a href="../cliente/tabela_cliente.php">Tabela Clientes</a></li>
        <li><a href="../produtos/tabela_produtos.php">Tabela Produtos</a></li>
        <li><a href="../venda/tabela_venda.php">Tabela Vendas</a></li>
    </ul>
</body>
</html>

