<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Análise de Texto</title>
</head>
<body>

<h2>Análise de Texto em PHP</h2>

<form method="POST">
    <label>Digite um texto:</label>
    <input type name="texto" rows="6" required></input>

    <label>Palavra a ser substituída:</label>
    <input type="text" name="palavra_antiga" required>

    <label>Nova palavra:</label>
    <input type="text" name="palavra_nova" required>

    <input type="submit" value="Analisar Texto">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coletando dados do formulário
    $texto = $_POST['texto'];
    $palavraAntiga = $_POST['palavra_antiga'];
    $palavraNova = $_POST['palavra_nova'];

    // Funções
    function contarPalavras($texto) {
        return str_word_count($texto);
    }

    function contarVogaisEConsoantes($texto) {
        $vogais = "aeiou";
        $consoantes = "bcdfghjklmnpqrstvwxyz";

        $texto = strtolower($texto);
        $vogaisCount = 0;
        $consoantesCount = 0;

        for ($i = 0; $i < strlen($texto); $i++) {
            $char = $texto[$i];
            if (strpos($vogais, $char) !== false) {
                $vogaisCount++;
            } elseif (strpos($consoantes, $char) !== false) {
                $consoantesCount++;
            }
        }

        return ['vogais' => $vogaisCount, 'consoantes' => $consoantesCount];
    }

    function palavraMaisLonga($texto) {
        $palavras = str_word_count($texto, 1);
        $maior = "";

        foreach ($palavras as $palavra) {
            if (strlen($palavra) > strlen($maior)) {
                $maior = $palavra;
            }
        }

        return $maior;
    }

    function substituirPalavra($texto, $antiga, $nova) {
        return str_ireplace($antiga, $nova, $texto);
    }

    // Processamento
    $numPalavras = contarPalavras($texto);
    $contagem = contarVogaisEConsoantes($texto);
    $maisLonga = palavraMaisLonga($texto);
    $textoSubstituido = substituirPalavra($texto, $palavraAntiga, $palavraNova);

    // Exibição
    echo "<div class='resultado'>";
    echo "<h3>Resultado da Análise:</h3>";
    echo "<strong>Número de palavras:</strong> $numPalavras<br>";
    echo "<strong>Vogais:</strong> " . $contagem['vogais'] . "<br>";
    echo "<strong>Consoantes:</strong> " . $contagem['consoantes'] . "<br>";
    echo "<strong>Palavra mais longa:</strong> $maisLonga<br>";
    echo "<strong>Texto com substituição:</strong><br><em>$textoSubstituido</em>";
    echo "</div>";
}
?>

</body>
</html>

