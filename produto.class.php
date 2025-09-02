produto.class.php
<?php
include("class_pai.class.php");
class Produto extends ClassePai {
public $nome;
public $preco;
public function __construct($id, $nome, $preco) {
parent::__construct($id, "../../db/produtos.txt");
$this->nome = $nome;
$this->preco = $preco;
}
static public function pegaPorId($id) {
$arquivo = fopen("../../db/produtos.txt", "r");
while(!feof($arquivo)){
$linha = fgets($arquivo);
if(empty($linha))
continue;
$dados = explode(self::SEPARADOR, $linha);
if($dados[0] == $id){
fclose($arquivo);
return new Produto($dados[0], $dados[1], $dados[2]);
}
}
fclose($arquivo);
}
function montaLinhaDados()
{
return $this->id.self::SEPARADOR.$this->nome.self::SEPARADOR.$this->preco;
}
static public function listar($filtroNome) {
$arquivo = fopen("../../db/produtos.txt", "r");
$retorno = [];
while(!feof($arquivo)){
$linha = fgets($arquivo);
if(empty($linha))
continue;
$dados = explode(self::SEPARADOR, $linha);
if(str_contains($dados[1], $filtroNome)){
array_push($retorno, new Produto($dados[0], $dados[1], $dados[2],
$dados[3]));
}
}
return $retorno;
}
}
?>
