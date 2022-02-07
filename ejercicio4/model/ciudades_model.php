<?php

function creaConexion(){
    $servidor = "localhost";
    $baseDatos = "ciudades";
    $usuario = "developer";
    $pass = "developer";
    return new PDO("mysql:host=$servidor;dbname=$baseDatos","$usuario","$pass");
}

function devolverCiudad($poblacion){
    try {
        $resultado = [];
        $conexion = creaConexion();
        $sql = $conexion->prepare("SELECT Nombre FROM ciudades WHERE Poblacion >= ?");
        $sql->bindParam(1,$poblacion);
        $sql->execute();
        while($ciudad = $sql->fetch(PDO::FETCH_ASSOC)){
            $resultado[] = $ciudad;
        }
        return $resultado;
        $conexion = null;
    }
    catch (PDOException $e) {
        return $e->getMessage();
        }
    }
    
?>