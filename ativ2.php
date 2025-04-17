<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <>
        <label>login:</label><input type="text">
        <label>senha:</label><input type="number">
        <button type="submit" name="butao">enviar</button>
<?php
$usuarios = [
["vitor", "1234", "padilha"],
["fulano", "senha2", "fulano de tal"],
] ; 
$login=$_GET["login"];
$senha=$_GET["senha"];


?>
</form>
</body>
</html>