<?php
//conectar a la base de datos
include("conectar.php");
$link=conectar();
//recuperar variables
$correo=htmlspecialchars($_POST['correo']);
$clave=htmlspecialchars($_POST['clave']);
//consultar la base de datos segun correo y clave
$consulta="SELECT * FROM persona WHERE correo='$correo' and clave='$clave'";
$result=mysqli_query($link,$consulta);
if($row=mysqli_fetch_array($result))
{
    $idp=$row['Id_Persona'];//ipd es la persona que ingresa al sistema
    //redireccionar a persona.php
    header("Location: persona.php?idp=$idp");
}
else
{
    //error de acceso k=6
    header("Location: inicio.php?k=6");
}
?>