<?php
include 'conectar.php';
$link = conectar();
$idp=$_GET['idp'];//USUARIO QUE INGRESA AL SISTEMA
$idem=$_GET['idempresa'];//ID DE LA EMPRESA A EDITAR
$sql="SELECT * FROM persona WHERE Id_Persona=$idp";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result);
$nombre=$row['Nombre'];
$apellido=$row['Apellido'];

$sqlempresa="SELECT * FROM empresa WHERE Id_Empresa=$idem";
$resultempresa=mysqli_query($link,$sqlempresa);
$empresa=mysqli_fetch_array($resultempresa);
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
            <?php
            include 'bn2.php'
            ?>
        </header>
        <main>
<!-- inicio -->
<div class="container">
<div class="row justify-content-center align-items-center g-2"   >
        <div class="col"></div>
        <div class="col">
            <from action="updateempresa.php" method="POST">
                <!-- iniciotabla -->
                <div class="card mt-5">
                    <div class="card-header">
                        Editar Empresa
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre Empresa</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre" value="<?php echo $empresa['RazonSocial']?>" required>
                        </div>     
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nit</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nit" value="<?php echo $empresa['Nit']?>" required>
                        </div>   
                        <button type="submit" class="btn btn-primary">Actualizar</button>         
                    </div>
                </div>
                <!-- fintabla -->
            </form>
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
