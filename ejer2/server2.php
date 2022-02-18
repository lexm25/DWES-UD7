<?php
// Instanciamos un nuevo servidor SOAP
$uri = "http://localhost/DWES22/DWES-UD7/ejer2/";
$server = new SoapServer(null, array('uri' => $uri));
$server->addFunction("devolverFecha");
$server->handle();

function comprobar($texto)
{
	if (is_numeric($texto)) {
		$error = "";
		$resultado = "";
		$dni = "";

		$wsdl = 'https://www.dataaccess.com/webservicesserver/NumberConversion.wso?WSDL'; //URL de nuestro servicio soap

		//Basados en la estructura del servicio armamos un array

		$params = array(
			"ubiNum" => $_POST["texto"],
		);

		$options = array(
			"uri" => $wsdl,
			"style" => SOAP_RPC,
			"use" => SOAP_ENCODED,
			"soap_version" => SOAP_1_1,
			"cache_wsdl" => WSDL_CACHE_BOTH,
			"connection_timeout" => 15,
			"trace" => false,
			"encoding" => "UTF-8",
			"exceptions" => false,
		);

		$cliente = new SoapClient($wsdl, $options);
		// Establecemos los parámetros de envío
		if (!empty($_POST['texto'])) {
			$texto = $_POST['texto'];
			// Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
			if (!is_numeric($texto)) {
				$error = "No es DECIMAL";
			} else {
				$resultado = $cliente->NumberToWords($params);
			}
		} else {
			$error = "<p style='color:red'><strong>Error:</strong> Debes introducir un número</p>";
		}
	} else {
		return "No es un decimal, tiene que ser un número";
	}
}
?>