<?php
// Instanciamos un nuevo servidor SOAP
$uri = "http://localhost/DWES22/DWES-UD7/ejercicio4/controller";
$server = new SoapServer(null, array('uri' => $uri));
$server->addFunction("mostrarCiudades");
$server->handle();

function mostrarCiudades($numero){
    include_once "../model/ciudades_model.php";
    $resultado = devolverCiudad($numero);
    return $resultado;
}
?>
