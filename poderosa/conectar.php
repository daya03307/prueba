<?php
function conectar()
{
    $servidor="localhost";
    $usuario="root";
    $clave="";
    $bd="poderosa";
    //ME CONECTO A LA BASE DE DATOS
    $link = mysqli_connect($servidor, $usuario, $clave, $bd);
    if (mysqli_connect_error()) {
        echo "Fallo al conectar a MySQL: ".mysqli_connect_error();
    }
    else
    {
        return $link;
    }
}
?>