<?php
// Vaciamos algunas variables
$error = "";
$resultado = "";
$numero = "";

// Iniciamos el cliente SOAP
// Escribimos la dirección donde se encuentra el servicio
$url = "http://localhost/DWES22/DWES-UD7/ejercicio3/server.php";
$uri = "http://localhost/DWES22/DWES-UD7/ejercicio3/";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {
    if(empty($_POST['numero'])){
        $error = "<strong style='color:red'>Error: </strong><span style='color:red'>Debes introducir un numero correcto</span>";
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
        print "<input type='text' name='numero' value='$numero'>";
        print "<input type='submit' name='enviar' value='action'>";
        print "<p class='error'>$error</p>";
    ?>
    </form>
        <?php
        if (isset($_POST['enviar'])) {
            // Establecemos los parámetros de envío
            if (!empty($_POST['numero'])) {
                $numero = $_POST['numero'];
                // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
                $resultado = $cliente->mostrarCiudades($numero);
                echo "<table border='1px'>";
                echo "<th>NOMBRE</th>";
                echo "<th>POBLACIÓN</th>";
                foreach ($resultado as $poblacion) {
                    echo "<tr>";
                    echo "<td>$poblacion[Nombre]</td>";
                    echo "<td>$poblacion[Poblacion]</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
        ?>
</body>
</html>