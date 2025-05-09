<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="$_GET">
    <label>N1</label><input type="number" name="a"><br>
    <label>N2</label><input type="number" name="b"><br>
    <button>Calcular</button>
    <select name="op">     
    <option value="soma">soma</option>
    <option value="sub">sub</option>
    <option value="div">div</option>
    <option value="mult">mult</option>
    </select>
</form>
    <?php
    $a= $_GET['a'];
    $b= $_GET['b'];
    $op= $_GET['op'];


 function soma($a, $b){
    return $a+$b;
 }

 function sub($a, $b){
    return $a-$b;
 }

 function div($a, $b){
    return $a/$b;
 }

 function mult($a, $b){
    return $a*$b;
 }




 switch ($op){
    case "soma":  echo soma($a,$b);
    break;

    case "sub":  echo sub($a,$b);
    break;

    case "div":  echo div($a,$b);
    break;

    case "mult":  echo mult($a,$b);
    break;

 }



 
    ?>
    
</body>
</html>