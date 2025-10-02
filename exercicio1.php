<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Jogo de adivinhação</h1>
<form method="get">
    <label>DIgite um numero:</label><input type="number" name="numero">
    <button>enviar</button>
    <select name="acao">
    <option value="facil">facil</option>
    <option value="medio">medio</option>
    <option value="dificil">dificil</option>
</select>
</form>
</body>
</html>

<?php
$tentativa = 0;
$numero = $_GET['numero'];
$acao = $_GET['acao'];
//$numero = fgets($STDIN);
//$nivel= fgets($STDIN);
$number = rand(1,100);

 /*function tentativa ($acao, $tentativa){
     if($acao=="facil"){
      echo $tentativa = 10;
    

     };
     if($acao=="medio"){
        echo $tentativa = 5;
     };
     if($acao == "dificil"){
        echo  $tentativa = 3;
     };
     return $tentativa;

 };*/
 
 function validaTentativa ($number, $acao, $tentativa, $numero){
    if($acao=="facil"){
        $tentativa = 10;
      
  
       };
       if($acao=="medio"){
           $tentativa = 5;
       };
       if($acao == "dificil"){
            $tentativa = 3;
       };
       
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
 
 
 validaTentativa($number, $acao, $tentativa, $numero);
?>