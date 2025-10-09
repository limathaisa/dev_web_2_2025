<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Jogo da Adivinhação</title>
    <link rel="stylesheet" href="exercicio1.css">
</head>
<body style="font-family: Arial; text-align:center; margin-top: 50px;">
    <h2>Jogo de Adivinhação</h2>

    <?php
    // Função que define as tentativas conforme o nível
    function definirTentativas($nivel) {
        if ($nivel == "facil") return 10;
        if ($nivel == "medio") return 5;
        if ($nivel == "dificil") return 3;
        return 5;
    }

    // Se ainda não começou o jogo
    if (!isset($_POST['numero_secreto'])) {
        echo '
        <form method="post">
            <label>Escolha o nível de dificuldade:</label><br><br>
            <select name="nivel" required>
                <option value="facil">Fácil (10 tentativas)</option>
                <option value="medio">Médio (5 tentativas)</option>
                <option value="dificil">Difícil (3 tentativas)</option>
            </select><br><br>
            <button type="submit" name="iniciar">Iniciar Jogo</button>
        </form>
        ';
    } 
    else {
        // Pega os valores do formulário anterior
        $nivel = $_POST['nivel'];
        $numero_secreto = $_POST['numero_secreto'];
        $tentativas = $_POST['tentativas'];
        $max_tentativas = $_POST['max_tentativas'];
        $mensagem = "";

        // Se o jogador enviou um palpite
        if (isset($_POST['palpite'])) {
            $palpite = (int)$_POST['palpite'];
            $tentativas++;

            if ($palpite == $numero_secreto) {
                $mensagem = " Parabéns! Você acertou o número <b>$numero_secreto</b> em $tentativas tentativa(s)!";
                $fim = true;
            } elseif ($tentativas >= $max_tentativas) {
                $mensagem = " Fim de jogo! O número secreto era <b>$numero_secreto</b>.";
                $fim = true;
            } elseif ($palpite > $numero_secreto) {
                $mensagem = "Seu palpite ($palpite) é <b>maior</b> que o número secreto.";
                $fim = false;
            } else {
                $mensagem = "Seu palpite ($palpite) é <b>menor</b> que o número secreto.";
                $fim = false;
            }
        } else {
            $mensagem = "O jogo começou! Boa sorte!";
            $fim = false;
        }

        echo "<p><b>Nível:</b> " . ucfirst($nivel) . " | Tentativa: $tentativas / $max_tentativas</p>";

        echo "<p>$mensagem</p>";

        // Se o jogo ainda não acabou
        if (!$fim) {
            echo '
            <form method="post">
                <label>Digite seu palpite (1 a 100):</label><br><br>
                <input type="number" name="palpite" min="1" max="100" required><br><br>
                
                <input type="hidden" name="nivel" value="'.$nivel.'">
                <input type="hidden" name="numero_secreto" value="'.$numero_secreto.'">
                <input type="hidden" name="tentativas" value="'.$tentativas.'">
                <input type="hidden" name="max_tentativas" value="'.$max_tentativas.'">

                <button type="submit">Enviar Palpite</button>
            </form>
            ';
        } else {
            echo '<br><a href="index.php"> Jogar Novamente</a>';
        }
    }

    // Se o jogador clicou em "Iniciar Jogo"
    if (isset($_POST['iniciar'])) {
        $nivel = $_POST['nivel'];
        $max_tentativas = definirTentativas($nivel);
        $numero_secreto = rand(1, 100);
        $tentativas = 0;

        echo '
        <form method="post">
            <p>O jogo começou! Você tem '.$max_tentativas.' tentativas.</p>
            <label>Digite seu palpite (1 a 100):</label><br><br>
            <input type="number" name="palpite" min="1" max="100" required><br><br>

            <input type="hidden" name="nivel" value="'.$nivel.'">
            <input type="hidden" name="numero_secreto" value="'.$numero_secreto.'">
            <input type="hidden" name="tentativas" value="'.$tentativas.'">
            <input type="hidden" name="max_tentativas" value="'.$max_tentativas.'">

            <button type="submit">Enviar Palpite</button>
        </form>
        ';
    }
    ?>
</body>
</html>