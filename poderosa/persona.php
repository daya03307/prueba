<?php
include("conectar.php");//ME CONECTO A LA BASE DE DATOS
$link=conectar();//ME CONECTO A LA BASE DE DATOS
  $idp=$_GET['idp'];
  $sqle="SELECT * FROM persona WHERE Id_Persona=".$idp;
  $resulte=mysqli_query($link,$sqle);
  $muestrae=mysqli_fetch_array($resulte);
  $nombre=$muestrae['Nombre'];
  $apellido=$muestrae['Apellido'];
  $numdoc=$muestrae['Documento'];
  //$pdf=$muestrae['Pdf_Doc'];
  $tipodoc=$muestrae['Id_tipoDoc'];
  $caracterizacion=$muestrae['Id_caracterizacion'];
  $correo=$muestrae['correo'];
  $pdf=$muestrae['Pdf_Doc'];
  $clave=$muestrae['clave'];
  ?>
<!doctype html>
<html lang="en">
    <head>
        <title>Personas</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
             <?php include ('bn2.php'); ?>
        </header>
        <main>
<!-- inicio -->
<div class="container-fluid">
<div class="row justify-content-center align-items-center g-2 mt-3"   >
        <div class="col align-self-start"><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar
</button></div>
        <div class="col">
            <!-- iniciotabla -->
            <table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">PDF</th>
      <th scope="col">Tipo</th>
      <th scope="col">Identificación</th>
      <th scope="col">Caracterización</th>
      <th scope="col">B</th>
      <th scope="col">A</th>
    </tr>
  </thead>
  <tbody>
<?php

mysqli_set_charset($link, "utf8");//PARA QUE SE VEA BIEN LOS ACENTOS
$sql2  ="SELECT * FROM persona order by Nombre asc";//GENERO LA CONSULTA
$resultado2=mysqli_query($link, $sql2);//ENVIO LA CONSULTA
$a=1;

while($muestra=mysqli_fetch_array($resultado2))//$MUESTRA ES UN ARREGLO NO LEGIBLE QUE CONTIENE LOS DATOS DE LA CONSULTA
{
    echo '<tr>
      <th scope="row">'.$a.'</th>
      <td>'.$muestra['Nombre'].'</td> 
      <td>'.$muestra['Apellido'].'</td>
      <td>'.$muestra['Pdf_Doc'].'</td>
      <td>'.$muestra['Id_tipoDoc'].'</td>
      <td>'.$muestra['Documento'].'</td>
      <td>'.$muestra['Id_caracterizacion'].'</td>
      <td><a href="borrarpersona.php?id='.$muestra['Id_Persona'].'" onclick="if(!confirm('."'Va a borrar la persona?'".'))return false"><img src="img/del.png" alt="Borrar Persona"></a></td>
      <td><a href="modpersona.php?id='.$muestra['Id_Persona'].'"><img src="img/edit.png" alt="Editar Persona"></a></td>
    </tr>';
    $a++;  
}
?>
    
  </tbody>
</table>
            <!-- fintabla -->
        </div>
        <div class="col">Column</div>
</div>
    
</div>

<!-- fin -->

        </main>
        <!-- iniciomodal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- inicia form -->
        <form action="ctrlpersona.php" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombres:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Apellidos:</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="apellido" required>
  </div>
  <!-- pegodoc -->
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"># Documento:</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="numdoc" required>
  </div>
  <div class="mb-3">
   <label for="exampleInputPassword1" class="form-label">Tipo de Documento:</label>
    <select class="form-select" aria-label="Default select example" name="tipodoc" required>
  <option value="">Seleccione</option>
  <?php
 $sqltd  ="SELECT * FROM tipodoc";//GENERO LA CONSULTA
$resultadotd=mysqli_query($link, $sqltd);//ENVIO LA CONSULTA
while($muestra=mysqli_fetch_array($resultadotd))//$MUESTRA ES UN ARREGLO NO LEGIBLE QUE CONTIENE LOS DATOS DE LA CONSULTA
{
echo '<option value="'.$muestra['idtipodoc'].'">'.$muestra['TipoDoc'].'</option>';
}
  ?>
</select> 
  </div>
  <!-- finpegodoc -->
  <div class="mb-3">
  <label for="formFile" class="form-label">Documento PDF:</label>
  <input class="form-control" type="file" id="formFile" name="pdf" required>
  </div>
  
  <!-- inicaracterizacion -->
  <div class="mb-3">
   <label for="exampleInputPassword1" class="form-label">Caracterización:</label>
    <select class="form-select" aria-label="Default select example" name="caracterizacion" required>
  <option value="">Seleccione</option>
  <?php
 $sqlc  ="SELECT * FROM caracterizacion";//GENERO LA CONSULTA
$resultadoc=mysqli_query($link, $sqlc);//ENVIO LA CONSULTA
while($muestrac=mysqli_fetch_array($resultadoc))//$MUESTRA ES UN ARREGLO NO LEGIBLE QUE CONTIENE LOS DATOS DE LA CONSULTA
{
echo '<option value="'.$muestrac['id_caracterizacion'].'">'.$muestrac['tipo_caracterizacion'].'</option>';
}
  ?>
</select> 
  </div>
  <!-- fincaracterizacion -->
  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

        <!-- finForm -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div></form>
    </div>
  </div>
</div>
        <!-- findmodal -->
 <!-- Modal -->
  
 <div class="modal fade" id="exampleModalregistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                         <!-- inicio de ingreso -->
                    <form action="ctrlregistro2.php" method="POST" enctype="multipart/form-data"> <!--el enctype sirve para subir archivos -->
                                <!--  -->
                                <div class="mb-3 form-check">
                                    <label for="exampleInputEmail1" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="nombre" 
                                     value="<?php echo $nombre; ?>" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <label for="exampleInputPassword1" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="apellido" value="<?php echo $apellido; ?>" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <label for="fromFile" class="form-label">Documento PDF:</label>
                                    <?php echo $pdf; ?>"<input type="file" class="form-control" id="formFile" name="PDF" required>
                                </div>
                                <!-- Inico tipo de documento -->
                                <div class="mb-3 form-check">
                                    <label for="exampleInputpassword1" class="form-label">Tipo de Documento:</label>
                                    <select class="form-select" aria-label="Default select example" name="tipodoc" required>
                                        <option value = ''>seleccione</option>
                                        <?php
                                        $sqltd="SELECT * FROM tipodoc"; //Genero la consulta
                                        $resultadotd=mysqli_query($link, $sqltd); //Enviar la consulta
                                        while($muestra=mysqli_fetch_array($resultadotd))//$Muestra es un arreglo no legible que contiene los datos de la consulta
                                        {
                                            echo '<option value="'.$muestra['idtipodoc'].'">'.$muestra['TipoDoc'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- Fin de tipo documento -->
                                <!-- INICIO NUMERO DE DOCUMENTO -->
                                <div class="mb-3 form-check">
                                    <label for="exampleInputPassword1" class="form-label">Documento</label>
                                    <input type="number" class="form-control" id="numdoc" name="numdoc" value="<?php echo $numdoc; ?>" readonly>                                </div>
                                <!-- FIN DE NUMERO DE DOCUMENTO -->
                                <!--  Inicio caracterización -->
                                <div class="mb-3 form-check">
                                    <label for="exampleInputpassword1" class="form-label">Tipo de caracterizacion:</label>
                                    <select class="form-select" aria-label="Default select example" id="caracterizacion" name="caracterizacion" required>
                                        <option value = ''>seleccione</option>
                                        <?php
                                        $sqlt="SELECT * FROM caracterizacion"; //Genero la consulta
                                        $resultadot=mysqli_query($link, $sqlt); //Enviar la consulta
                                        while($muestra=mysqli_fetch_array($resultadot))//$Muestra es un arreglo no legible que contiene los datos de la consulta
                                        {
                                            echo '<option value="'.$muestra['id_caracterizacion'].'">'.$muestra['tipo_caracterizacion'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 form-check">
                                    <label for="exampleInputEmail" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="exampleInputPassword1" name="email" value="<?php echo $correo; ?>" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <label for="exampleInputPassword" class="form-label">Contraseña:</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $clave; ?>" required>
                                </div>
                                <!-- Fin caracterización -->
                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                <!-- fin del ingreso -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>

            <!-- Fin registro -->
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
