<!DOCTYPE html>
<html>
    <head>
        <title>SOAP</title>
        
    </head>
<body>
    <form action="index.php?controller=ciudades&action=mostrarCiudades" method="post">
        <input type='text' name='numero'>
        <input type='submit' name='enviar' value='action'>
        <p class='error'><?php $error ?></p>
    <?php
    ?>
    </form>
    <?php
    if (isset($_POST['enviar'])) {
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
    ?>
</body>
</html>