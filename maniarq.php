<?php
$arquivo = fopen("arq.txt", "w");
if ($arquivo) {
    fwrite($arquivo, "thaisa");
    fclose($arquivo);

}
?>