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
<divclass="container">
<div class="row justify-content-center align-items-center g-2"   >
        <div class="col">Column</div>
        <div class="col">
            <!-- iniciotabla -->
            <select class="form-select" aria-label="Default select example">
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
            <!-- fintabla -->
        </div>
        <div class="col">Column</div>
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