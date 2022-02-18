<?php
// Vaciamos algunas variables
$error = "";
$resultado = "";
$numero = "";

// Iniciamos el cliente SOAP
// Escribimos la dirección donde se encuentra el servicio
$url = "http://localhost/DWES22/DWES-UD7/ejer2/server.php";
$uri = "http://localhost/DWES22/DWES-UD7/ejer2/";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {
    // Establecemos los parámetros de envío
    if (!empty($_POST['texto'])) {
        $texto = $_POST['texto'];
        // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
        $resultado = $cliente->comprobar($texto);
        var_dump($resultado);
    } else {
        $error = "<strong>Error:</strong> Debes introducir una texto correcta<br/>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SOAP</title>

    </head>
<body>
    <form action="cliente.php" method="post">
    <?php
        print "<input type='date' name='texto'>";
        print "<input type='submit' name='enviar' value='action'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
    ?>
    </form>
</body>
</html>