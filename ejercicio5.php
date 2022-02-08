<?php
define("DEBUG", TRUE);

if(DEBUG)
{
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}

$wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL'; //URL de nuestro servicio soap

//Basados en la estructura del servicio armamos un array
$params = Array(
    "Arg1" => 5,
    "Arg2" => 10
    );

$options = Array(
	"uri"=> $wsdl,
	"style"=> SOAP_RPC,
	"use"=> SOAP_ENCODED,
	"soap_version"=> SOAP_1_1,
	"cache_wsdl"=> WSDL_CACHE_BOTH,
	"connection_timeout" => 15,
	"trace" => false,
	"encoding" => "UTF-8",
	"exceptions" => false,
	);

//Enviamos el Request
$soap = new SoapClient($wsdl, $options);
$result = $soap->AddInteger($params); //Aquí cambiamos dependiendo de la acción del servicio que necesitemos ejecutar
var_dump($result);


?>