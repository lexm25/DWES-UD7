<?php
// Vaciamos algunas variables
$error = "";
$resultado = "";
$dni = "";

$wsdl = 'https://www.dataaccess.com/webservicesserver/NumberConversion.wso?WSDL'; //URL de nuestro servicio soap

//Basados en la estructura del servicio armamos un array
if (isset($_POST["enviar"])) {
	$params = array(
		"Arg1" => $_POST["num1"],
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
	if (!empty($_POST['num1'])) {
		$num1 = $_POST['num1'];
		// Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
		if(!is_numeric($num1)){
			$error = "No es DECIMAL";
		}
		else{
			$resultado = $cliente->NumberToWords($params);
		}
	} else {
		$error = "<p style='color:red'><strong>Error:</strong> Debes introducir un número</p>";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>CALCULADURA DE DIVISIÓN</title>
	<link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
	<h3>Intoruduce los números</h3>
	<form action="NumberConversion.php" method="post">
		<?php
		print "<input type='text' name='num1'>";

		print "<input type='submit' name='enviar' value='Calcular'>";
		print "<p class='error'>$error</p>";
		print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
		?>
	</form>
</body>

</html>