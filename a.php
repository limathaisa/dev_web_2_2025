<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    define('pi', 3.14);
    //echo pi;
   // print_r ( get_defined_constants());
   /*$a=4;
   if ($a>2):
    echo "maior que 2";
    echo "oi";
    elseif($a>2):
        echo "oi 2";
    endif; */
    /*$v=1;
    switch ($v){
        case 2:
         echo  "o valor de v e 2";
         break;
         case 4:
            echo "o valor de v e 4";
            break;
                default:
                echo "kk";
    }
                */

            for ($a=1; ;$a++){
                if ($a>10000){
                    break;
                }
                echo "oi"."<br>"."<hr>";
            }
            echo "tchau";
            
    ?>
</body>
</html>