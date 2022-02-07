<?php
// Vaciamos algunas variables
$error = "";
$resultado = "";
$numero = "";

// Iniciamos el cliente SOAP
// Escribimos la dirección donde se encuentra el servicio
$url = "http://192.168.129.155/DWES/EJERCICIO_DE_CLASE/DWES-UD7/ejercicio2.php";
$uri = "http://192.168.129.155/DWES/EJERCICIO_DE_CLASE/DWES-UD7/";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {
    // Establecemos los parámetros de envío
    if (!empty($_POST['numero'])) {
        $numero = $_POST['numero'];
        // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
        $resultado = "El número es: " . $cliente->parImpar($numero);
    } else {
        $error = "<strong>Error:</strong> Debes introducir un numero correcto<br/><br/>Ej: 45678987";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SOAP</title>

    </head>
<body>
    <form action="ejercicio2.php" method="post">
    <?php
        print "<input type='text' name='numero' value='$numero'>";
        print "<input type='submit' name='enviar' value='action'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
    ?>
    </form>
</body>
</html>