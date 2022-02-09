<?php
// Vaciamos algunas variables
$error = "";
$resultado = "";
$dni = "";

$wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL'; //URL de nuestro servicio soap

//Basados en la estructura del servicio armamos un array
if (isset($_POST["enviar"])) {
	$id = array(
		"id" => $_POST["id"]
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
	if (!empty($_POST['id'])) {
		// Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
		$resultado =  $cliente->FindPerson($id);
		var_dump($resultado);
	} else {
		$error = "<p style='color:red'><strong>Error:</strong> Debes introducir un número</p>";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>FINDPERSON</title>
	<link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
	<h3>Intoruduce el id</h3>
	<form action="FindPerson.php" method="post">
		<?php

	print "<input type='text' name='id'>";
		print "<input type='submit' name='enviar' value='Buscar'>";
		print "<p class='error'>$error</p>";

		if(isset($_POST['enviar'])){
			foreach ($resultado as $value) {
				echo "<strong>Person: </strong> <br>";
				echo "Name: " . $value->Name . "<br>";
                echo "SSN: " . $value->SSN . "<br>";
                echo "DOB: " . $value->DOB . "<br>";
				echo "Age: " . $value->Age . "<br>";
                $home = $value->Home;
                $office = $value->Office;

                echo "<strong>Home:</strong> <br>";
                echo "Street: " . $home->Street . "<br>";
                echo "City: " . $home->City . "<br>";
                echo "State: " . $home->State . "<br>";
                echo "Zip: " . $home->Zip . "<br>";

                echo "<strong>Office:</strong> <br>";
                echo "Street: " . $office->Street . "<br>";
                echo "Office: " . $office->City . "<br>";
                echo "State: " . $office->State . "<br>";
                echo "Zip: " . $office->Zip . "<br>";

                echo "Color: ";
                echo $value->FavoriteColors->FavoriteColorsItem . "<br>";
			}
		}
	
	
		?>
	</form>
</body>

</html>