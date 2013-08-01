<?php

include('lib/nusoap.php');

$u= $_POST['user'];
$p= $_POST['pass'];

//Guarda en $srt el valor de la contraseña en mayuscula y codificada en SHA256
 $str = hash("SHA256", $p);
 
 $sp = str_replace('.', '-', $u); 
 
 
//Creacion de un arreglo       
$parametros=array();
$parametros['rut']= $sp;
$parametros['password']= $str;

$auth = array(  'login'          => "mario",
                'password'       => sha1("isw.mario"));

$objClienteSOAP = new soapclient("http://informatica.utem.cl:8011/dirdoc-auth/ws/auth?wsdl",$auth);
$objRespuesta = $objClienteSOAP->autenticar($parametros);
// Cómo llega el objeto
//var_dump($objRespuesta);

// Comparación con tipos
$codigo = (int) $objRespuesta->return->codigo;
$res = (string) $objRespuesta->return->descripcion;
//echo "Codigo: $codigo <br />";
//echo "Codigo: $res <br />";

if ($codigo == 1) 
{
	echo '<h2 style="color:#0000ff">Ingreso satifactorio</h2>';
	echo $res;
} else 

{
	echo '<h2 style="color:#0000ff">Acceso denegado</h2>';
	echo $res;
}




?>
