<?php

function mostrar(){
    include './view/ciudades_view.php'; 
}

function mostrarCiudades(){
    require './model/ciudades_model.php';
    $url = "http://localhost/DWES22/DWES-UD7/ejercicio3/server.php";
    $uri = "http://localhost/DWES22/DWES-UD7/ejercicio3/";
    $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));
    if (isset($_POST['enviar'])) {
        // Establecemos los parámetros de envío
        if (!empty($_POST['numero'])) {
            $numero = $_POST['numero'];
            // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
            $resultado = $cliente->mostrarCiudades($numero);
            return $resultado;
            header("Location ./view/ciudades_view.php");
        }else{
            $error = "<strong style='color:red'>Error: </strong><span style='color:red'>Debes introducir un numero correcto</span>";
        }
    }
    include './view/ciudades_view.php'; 
}    

?>