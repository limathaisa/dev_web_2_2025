<?php
define("SEPARADOR", "#");
$nome = isset ($_POST["nome"]) ? $_POST["nome"] : "";
$cpf = isset ($_POST["cpf"]) ? $_POST["cpf"] : "";
$rg = isset ($_POST["rg"]) ? $_POST["rg"] : "";
$cep = isset ($_POST["cep"]) ? $_POST["cep"] : "";
$endereco= isset ($_POST["endereco"]) ? $_POST["endereco"] : "";
$numero = isset ($_POST["numero"]) ? $_POST["numero"] : "";


EscreverLinha ($nome, $cpf, $rg, $cep, $endereco, $numero);
function EscreverLinha ($nome, $cpf, $rg, $cep, $endereco, $numero) {
    $linha = "\n";
    $id = LeUltimoId();
    if(empty($id)){
        $id = 0;
        $linha = "";
    }
    $id++;
  
    $linha = $linha.$id.SEPARADOR.$nome.SEPARADOR.$cpf.SEPARADOR.$rg.SEPARADOR.$cep.SEPARADOR.$endereco.SEPARADOR.$numero;
file_put_contents("empregados.txt", $linha, FILE_APPEND);
   echo "empregado cadastrado com sucesso";
}


function LeUltimoId () {
    $arquivo = fopen("empregados.txt", "r");
    $linha = "";
while(!feof($arquivo)){
    $linha = fgets($arquivo);
}
 fclose($arquivo);
 $dadosempregado = explode(SEPARADOR, $linha);
 return intval($dadosempregados[0]);

}
?>