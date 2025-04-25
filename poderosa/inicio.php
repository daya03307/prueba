<?php
include ('conectar.php');
$link=conectar();
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Complementarios</title>
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Sena</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalinicio">Ingresar</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalregistrar">Registrar</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="recuperar.php" data-bs-toggle="modal" data-bs-target="#exampleModalrecuperar">Recuperar contraseña</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Acerca de</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        </header>
        <main>
            <!-- INICIO -->
            <div class="container">
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col"></div>
                    <div class="col">
                        <!-- INICIO TABLA  -->
                         <?php
                         if(isset($_GET['k']))
                         {
                         switch ($_GET['k']) {
                             case 1:$mensaje='El documento ya existe';break;
                             case 2:$mensaje='Se insertó el Usuario  correctamente<br>Ingrese al sistema';
break;
                             case 3:$mensaje='Error al insertar el usuario';
                                 break;
                             case 4:$mensaje='Error al subir el archivo';
                                 break;
                            case 5:$mensaje='Por seguridad, se ha cerrado la sesión';
                            case 6:$mensaje='Clave y/o correo incorrecto';
                                 break;
                             default:$mensaje='';break;
                         }
                         echo '<p style="color: red; text-align: center; font-size:                     16px;">'.$mensaje.'</p>';
                            }
                         ?>
                         <?php
                        ini_set('max_execution_time', 300); // 300 segundos = 5 minutos
                        ?>
                       
                        <!-- FIN TABLA -->
                    </div>
                    <div class="col"></div>
                </div>
            </div>
            <!-- FIN -->
        </main>
        <!-- Modal recuperar -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModalrecuperar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!-- id llamar a la modal-->
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Recuperación de contraseña</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="recuperar.php" method="POST">
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-header">
                                        Ingrese Correo registrado
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Verificación</button>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Nueva contraseña: </label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="nuevacontraseña" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Confirme la contraseña: </label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="confirmacioncontraseña" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" data-bs-target="#exampleModalinicio" data-bs-toggle="modal">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Fin recuperar -->

             <!-- Inicio Iniciar -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModalinicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!-- id llamar a la modal-->
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Inicar sesion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="ctrlinicio.php" method="POST">
                                <div class="mb-3 ">
                                    <label for="exampleInputEmail1" class="form-label"><h6>Email</h6></label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label"><h6>Contraseña</h6></label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" name="clave" required>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Recordar</label>
                                </div>
                                <div  class="text-center">
                                <button type="submit" class="btn btn-primary" >Iniciar sesion</button>
                                <p>¿Has olvidado tu contraseña?</p>
                                <button type="button" class="btn btn-secondary" data-bs-target="#exampleModalrecuperar" data-bs-toggle="modal" data-bs-dismiss="modal">Recuperar contraseña</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin iniciar  -->

            <!-- Inicio registro -->
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
                                    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="nombre" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <label for="exampleInputPassword1" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="apellido" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <label for="fromFile" class="form-label">Documento PDF:</label>
                                    <input type="file" class="form-control" id="formFile" name="PDF" required>
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
                                    <input type="number" class="form-control" id="numdoc" name="numdoc" required>
                                </div>
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
                                    <input type="email" class="form-control" id="exampleInputPassword1" name="email" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <label for="exampleInputPassword" class="form-label">Contraseña:</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
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


