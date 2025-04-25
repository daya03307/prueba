<?php
include 'conectar.php';
$idp = $_GET['idp'];
$link = conectar();
$sql = "SELECT * FROM persona WHERE Id_Persona = $idp";
//echo $sql;
$result = mysqli_query($link, $sql);
$row=mysqli_fetch_array($result);
$nombre = $row['Nombre'];
$apellido = $row['Apellido'];
?>
<!doctype html>
<html lang="en">
    <head>
        <title>EMPRESA</title>
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
             <?php
             include 'bn2.php';
             ?>
        </header>
        <main>
        <!-- inicio -->
        <divclass="container">
        <div class="row justify-content-center align-items-center g-2"   >
            <div class="col"></div>
            <div class="col">
        <!-- iniciotabla -->
        <table class="table table-hover mt-5">
                <thead> 
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre Empresa</th>
                    <th scope="col">Nit</th>
                    <th scope="col">Borrar</th>
                    <th scope="col">Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            mysqli_set_charset($link, "utf8");
            $sqlempresa = "SELECT * FROM empresa";
            $resultempresa = mysqli_query($link, $sqlempresa);
            $a=1;  //contador de incrementar
            while($row=mysqli_fetch_array($resultempresa))
            {
                echo ' <tr>
                    <th scope="row">'.$a.'</th> 
                    <td>'.$row['RazonSocial'].'</td>
                    <td>'.$row['Nit'].'</td>
                    <td><a href= "delempresa.php?idempresa= '.$row['Id_Empresa'].'?idp='.$idp.'" onclick="if(!confirm('."'Va a borrar la empresa?'".'))return false"><img src="img/del.png" alt="Borrar empresa"></a></td>
                    <td><a href= "editempresa.php?idempresa='.$row['Id_Empresa'].'&idp='.$idp.'"><img src="img/actualizar.png" alt="Editar empresa"></a></td>  
                    </tr>';
                    $a++;
            }
         ?>  
        </tbody>
    </table>
            <!-- fintabla -->
        </div>
        <div class="col"></div>
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
