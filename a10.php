<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
     <label>email </label><input type="text" name="email" require>
     <label>senha </label><input type="passeword" name="senhaS" require>
     <button>enviar</button>
    </form>
    <?php

 $email=$_POST['email'];
 $senha= $_POST['senha'];
$user = ["email" => "a@gmail.com", "senha" => "1234"];

if ($user['email']==$email && $user['senha']==$senha){
   header(location: lista.php);

}



    ?>
   
</body>
</html>