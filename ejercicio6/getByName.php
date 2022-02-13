<?php
// Vaciamos algunas variables
$error = "";
$resultado = "";
$dni = "";


$wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL'; //URL de nuestro servicio soap

//Basados en la estructura del servicio armamos un array


//Enviamos el Request


if (isset($_POST['enviar'])) {
    $params = array(
        "name" => $_POST['nom'],
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
    if (!empty($_POST['nom'])) {
        // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
        $resultado = $cliente->GetByName($params);
    } else {
        $error = "<strong>Error:</strong> Debes introducir un DNI correcto<br/><br/>Ej: 45678987";
    }
}
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
    <form action="getByName.php" method="post">
        <?php
        print "<input type='text' name='nom'>";

        print "<input type='submit' name='enviar' value='Calcular Letra'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>";

        if (isset($_POST['enviar'])) {
            foreach ($resultado->GetByNameResult as $p) {
                echo $p . "<br>";
            }
        }
        echo "</p>";
        ?>
    </form>
    <div id="footer">Creado con <span class="red">♥</span> por: <a href="https://www.raulprietofernandez.net/">Raúl Prieto Fernández</a></div>
</body>

</html>