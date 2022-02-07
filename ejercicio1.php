<?php
// Instanciamos un nuevo servidor SOAP
$uri = "http://localhost/DWES22/DWES-UD7/";
$server = new SoapServer(null, array('uri' => $uri));
$server->addFunction("devolverCiudad");
$server->handle();

function FunctionName($numero){
    devolverCiudad($numero);
}

?>
