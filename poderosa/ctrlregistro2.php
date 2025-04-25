<?php
//conexion a la base de datos - archivo ingresa registro
include 'conectar.php';
$link=conectar();
//por seguridad validad si viene de un formulario
if(($_SERVER['REQUEST_METHOD']=='POST'))
{
    $Documento=htmlspecialchars($_POST['Documento']);//htmlspecialchar limpia el campo de caracteres especiales

    $sql_verificar="SELECT * FROM persona WHERE Documento='$Documento'";//verificar si la persona ya esta registrada
    $resultado=mysqli_query($link,$sql_verificar);
    if($row=mysqli_fetch_array($resultado)) //validar si la persona ya esta registrada en la base de datos
    {
        //retornar a index.php con un mensaje k=1
        //echo"la persona ya existe";
        header("Location:index.php?k=1");
    }
    else
    {//recupero variables para subir documento
        $nombrearchivo=$_FILES['PDF']['name'];
        $tipoarchivo=$_FILES['PDF']['type'];
        $temporal=$_FILES['PDF']['tmp_name'];
        $ruta="pdfdoc/";
        $destino=$ruta.$Documento. '/';
        //echo $destino;
        //echo "la persona no existe y procedo a subir el documento";
        if(!file_exists($destino)){mkdir($destino,0777,true);} //validar si el directorio existe

        //subir archivo
        $destino=$destino.$nombrearchivo;
        if(move_uploaded_file($temporal,$destino))//validar si se subio el archivo
        {
            //insertar registro en la base de datos
            $nombre=htmlspecialchars($_POST['nombre']);
            $Apellido=htmlspecialchars($_POST['Apellido']); 
            $caracterizacion=htmlspecialchars($_POST['caracterizacion']);
            $tipodoc=htmlspecialchars($_POST['tipodoc']);
            $Documento=htmlspecialchars($_POST['Documento']);
            $correo=htmlspecialchars($_POST['correo']);
            $clave=htmlspecialchars($_POST['clave']);
            $sqlnuevo="INSERT INTO persona (Id_Persona, Nombre, Apellido, Pdf_Doc, Id_tipoDoc, Documento, Id_caracterizacion, correo, clave) VALUES (NULL, '$nombre', '$apellido', '$nombrearchivo', '$tipodoc', '$Documento', '$caracterizacion', '$correo', '$clave')";
            if($resultnuevo=mysqli_query($link,$sqlnuevo))//validar si se inserto el registro
            {
                //retornar a index.php con un mensaje k=2
                header("Location:index.php?k=2");
            }
            else
            {
                //retornar a index.php con un mensaje k=3
                header("Location:index.php?k=3");
            }
        }
        else
        {
            //retornar a index.php con un mensaje k=4
            header("Location:index.php?k=4");
        }

    }
}
else
{//si no viene de un formulario lo redirijo a la pagina principal k=2
    header("Location:index.php?k=5");  
}
?>