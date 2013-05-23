<?php

include('lib/nusoap.php');

$u= $_POST['user'];
$p= $_POST['pass'];

//Guarda en $srt el valor de la contraseña en mayuscula y codificada en SHA256
 $str = hash("SHA256", $p);
 
//Creacion de un arreglo       
$parametros=array();
$parametros['rut']= $u;
$parametros['password']= $str;

$objClienteSOAP = new soapclient("http://informatica.utem.cl:8011/dirdoc-auth/ws/auth?wsdl");
$objRespuesta = $objClienteSOAP->autenticar($parametros);
// Cómo llega el objeto
var_dump($objRespuesta);

// Comparación con tipos
$codigo = (int) $objRespuesta->return->codigo;
echo "Codigo: $codigo <br />";
if ($objRespuesta === true) {
	echo "Ingreso exitoso";
} else {
	echo "Rechazado";
}



                               

?>




 
