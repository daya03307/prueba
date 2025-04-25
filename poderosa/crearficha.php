<?php 
include 'conectar.php';
$link = conectar();
$idp=$_GET['idp'];
$sql="SELECT * FROM persona WHERE Id_Persona=$idp";
//echo $sql;
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result);
$nombre=$row['Nombre'];
$apellido=$row['Apellido'];    
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
             <?php include 'bn2.php'; ?>
        </header>
        <main>
<!-- inicio -->
<div class="container">
<div class="row justify-content-center align-items-center g-2"   >
    <div class="col-1">Column</div>
        <div class="col">
            <!-- iniciotabla -->
            <div class="card mt-3">
                <div class="card-header">Crear Ficha </div>
                <div class="card-body">
                    <form action="ctrlcrearficha.php" method="POST">
                    <div class="container">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col"><select class="form-select" aria-label="Default select example">
                            <option selected>Dinamizador</option>
                            <?php
                            $sqld="SELECT p.Nombre, p.Apellido, p.Id_Persona FROM persona p, auxiliar_rol a WHERE p.Id_Persona=a.Id_Persona AND a.Id_Rol=5";
                            $resultd=mysqli_query($link,$sqld);
                            while($rowd=mysqli_fetch_array($resultd)){
                                $idp=$rowd['Id_Persona'];
                                $nombre=$rowd['Nombre'];
                                $apellido=$rowd['Apellido'];
                                echo "<option value='$idp'>$nombre $apellido</option>";
                            }
                            ?>
                            </Select></div>
                            <div class="col">
                                <select class="form-select" aria-label="Default select example">
                            <option selected>Programa Formacion</option>
                            <?php
                            $sqlp="SELECT * FROM programa_formacion";
                            $resultp=mysqli_query($link,$sqlp);
                            while($rowp=mysqli_fetch_array($resultp)){
                                $idp=$rowp['id_programaformacion'];
                                $nombre=$rowp['nombre'];
                                $version=$rowp['version'];
                                echo "<option value='$idp'>$nombre $version</option>";
                            }
                            ?>
                            </Select></div>
                            <div class="col"><select class="form-select" aria-label="Default select example">
                            <option selected>Programa Especial</option>
                            <?php
                            $sqlpe="SELECT Nombre FROM programa_especial;";
                            $resultpe=mysqli_query($link,$sqlpe);
                            while($rowpe=mysqli_fetch_array($resultpe)){
                                $idp=$rowpe['id_Programa_Especial'];
                                $nombre=$rowpe['Nombre'];
                                echo "<option value='$idp'>$nombre </option>";
                            }
                            ?>
                            </Select></div>
                            
                    </div><!-- fin row 1 -->
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Cupos</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="35">35</option>
                        <option value=>otro</option>
                    </select></div>
                        <div class="col">Column</div>
                        <div class="col"><select class="form-select" aria-label="Default select example">
                            <option selected>Empresa</option>
                            <?php
                            $sqlem="SELECT * FROM empresa ORDER BY RazonSocial asc;";
                            $resultem=mysqli_query($link,$sqlem);
                            while($rowem=mysqli_fetch_array($resultem)){
                                $idem=$rowem['Id_Empresa'];
                                $nombre=$rowem['RazonSocial'];
                                $Nit=$rowem['Nit'];
                                echo "<option value='$idem'> $idem $nombre $Nit</option>";
                            }
                            ?>
                            </Select></div>
                    </div><!-- fin row 2-->
                        <div class="row justify-content-center align-items-center g-2">
                            <div class="col"> <select class="form-select" aria-label="Default select example">
                                <option selected>Modalidad</option>
                                <?php
                                $sqlm="SELECT * FROM modalidad";
                                $resultm=mysqli_query($link,$sqlm);
                                while($rowm=mysqli_fetch_array($resultm)){
                                    $idp=$rowm['Id_Modalidad'];
                                    $nombre=$rowm['Modalidad'];
                                    echo "<option value='$idp'>$nombre $Modalidad</option>";
                                }
                                ?>
                                </Select></div>
                            <div class="col"><select class="form-select" aria-label="Default select example">
                            <option selected>Municipios</option>
                            <?php
                            $sqlem="SELECT d.Departamento, m.idMunicipio, m.Municipio FROM Municipio m, departamento d WHERE m.idDepartamento=d.idDepartamento and d.idDepartamento=19";
                            $resultem=mysqli_query($link,$sqlem);
                            while($rowem=mysqli_fetch_array($resultem)){
                                $idem=$rowem['idMunicipio'];
                                $nombre=$rowem['Municipio'];
                                $nombred=$rowem['Departamento'];
                                echo "<option value='$idem'> $idem $nombre </option>";
                            }
                            ?>
                            </Select></div>
                        <div class="col">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Direccion desarollo formacion" name="direccion" required></div>
                        </div><!-- fin row 3-->
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">Column</div>
                        <div class="col">Column</div>
                        <div class="col">Column</div>
                    </div><!-- fin row 4-->
                <!-- fincontainer -->
                    </div>
                    </form>
                </div>
            </div>
            <!-- fintabla -->
        </div>
        <div class="col-1">Column</div>
    </div>
    
</div>

<!-- fin -->

        </main>
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