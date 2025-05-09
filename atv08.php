<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <label> number1 </label> <input type="$_GET" name="a">
        <label> number 2</label> <input type="$_GET" name="b">
        <button>calcular</button>

    <select name="op">
<option value=""></option>
<option value="som">soma</option>
<option value="sub"> subtração</option>
<option value="div">divisão</option>
<option value="mul"> multiplição</option>
    </select>

    <?php
    $a=$_GET['a'];
    $b=$_GET['b'];
    $op=$_GET['op'];

    switch ($op){
case "som": 
    echo $a+$b;
    break;
    case "sub": 
    echo $a-$b;
    break;
    case "div": 
    echo $a/$b;
    break;
    case "mul": 
    echo $a*$b;
    break;

case "":
    echo "dados invalidos" ;
    break;




    }
    ?>
    </form>
</body>
</html>