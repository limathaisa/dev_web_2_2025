<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// Função para gerar o tabuleiro de damas
function gerarTabuleiro() {
    echo '<table border="1" style="border-collapse: collapse; width: 300px; height: 300px;">';
    $tamanhoTabuleiro = 8; // Tabuleiro 8x8
    $cores = ['#fff', '#000']; // Cores das casas

    // Loop para gerar cada linha
    for ($linha = 0; $linha < $tamanhoTabuleiro; $linha++) {
        echo '<tr>';
        // Loop para gerar cada coluna
        for ($coluna = 0; $coluna < $tamanhoTabuleiro; $coluna++) {
            // Determina a cor da casa (alternando entre branco e preto)
            $corCasa = ($linha + $coluna) % 2 == 0 ? $cores[0] : $cores[1];

            // Verifica se é uma casa ocupada por uma peça de dama
            $peca = '';
            if ($corCasa == '#000') { // Só coloca peças em casas pretas
                if ($linha < 3) {
                    // Peças brancas nas 3 primeiras linhas
                    $peca = 'B';
                } elseif ($linha > 4) {
                    // Peças pretas nas 3 últimas linhas
                    $peca = 'P';
                }
            }

            // Imprime a célula da tabela com a peça (se houver)
            echo '<td style="width: 35px; height: 35px; background-color:' . $corCasa . '; text-align: center; vertical-align: middle;">' . $peca . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

// Chama a função para gerar o tabuleiro
gerarTabuleiro();
?>

</body>
</html>