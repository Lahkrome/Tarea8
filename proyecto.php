<?php

$u= $_POST['user'];
$p= $_POST['pass'];

//Guarda en $srt el valor de la contraseña en mayuscula y codificada en SHA256 que es lo que soporta dirdoc, lista para comprobar en el WS
 $str = hash("SHA256", $p);
      
echo "Valor en SHA256: ".$str;

?>



 