<?php
// Instanciamos un nuevo servidor SOAP
$uri = "http://localhost/DWES22/DWES-UD7/ejercicio3";
$server = new SoapServer(null, array('uri' => $uri));
$server->addFunction("mostrarCiudades");
$server->handle();

function mostrarCiudades($numero){
    include_once "dataBaseManagement.php";
    $resultado = devolverCiudad($numero);
    return $resultado;
}
?>
