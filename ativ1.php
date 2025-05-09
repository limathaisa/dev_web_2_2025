<?php
$linha = $_GET["linha"];
$coluna = $_GET["coluna"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <?php
    echo "<tr>";
    for ($j = 1; $j <= $coluna; $j++) {
        echo "<th>colunas ".$j."</th>";
    }
    echo "</tr>";
    for ($i = 1; $i <= $linha; $i++){
        echo "<tr>"."linha"."<hr>";
    }
    for ($j = 1; $j <= $coluna; $j++){
        echo "<td>L".$i."C".$j."</td>";
        for ($i = 1; $i <= $linha; $i++){
            echo "<tr>"."linha"."<hr>";
        }
    }
    echo "</td>";
//$_SESSION["linha"]=$linha;
//$_SESSION["coluna"]= $coluna;
//var_dump($_SESSION["linha"]);
//var_dump($_SESSION["coluna"]);


    ?>
    </table>
</body>
</html>