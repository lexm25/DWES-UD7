<?php
// Vaciamos algunas variables
$error = "";
$resultado = "";
$dni = "";


$wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL'; //URL de nuestro servicio soap
//Basados en la estructura del servicio armamos un array

//Enviamos el Request
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

    $cliente = new SoapClient($wsdl, $options);
    $resultado =$cliente->Mission();
       
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Calcular Letra DNI - Servicio Web + PHP + SOAP</title>
        <link rel="stylesheet" type="text/css" href="/estilo.css">
    </head>
<body>
    <h1>Obtener letra DNI</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <?php  
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>";
        echo $resultado->MissionResult ;
        echo "</p>";  
    ?>
    <div id="footer">Creado con <span class="red">♥</span> por: <a href="https://www.raulprietofernandez.net/">Raúl Prieto Fernández</a></div>
</body>
</html>