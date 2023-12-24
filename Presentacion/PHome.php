<?php

session_start();
if($_SESSION["rol_usuario"]== null){
    header("Location: PLogin.php");
  }

$nombreUsuario = $_SESSION["nombre_usuario"]; // Obtén el nombre de usuario de la sesión
$mensajeBienvenida = '<div style="background-color: #3D9100; color: #ffffff; border: 1px solid #009900; padding: 10px; text-align: center;"><p>Bienvenid@, ' . $nombreUsuario . ' uwu </p></div>';

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="assets/css/styles.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        crossorigin="anonymous"></script>
    <title>Notas uwu</title>
</head>

<body class="sb-nav-fixed">

    <!-- heaader -->
    <?php
    include 'layouts/header.php'
        ?>
    <div id="layoutSidenav">
        <!-- sidebar -->
        <?php
        include 'layouts/sidebar.php';
        ?>

        <div id="layoutSidenav_content">

            <!-- CONTENIDO -->


            <main>
                <div class="container-fluid">
                    <?php echo $mensajeBienvenida; ?>
                    <br>
                    <br>
                    <div class="centered-image">
                        <img src="assets/img/anya.jpg" alt="Imagen" />
                    </div>
                </div>

                <style>
                    body {
                        margin: 0;
                        padding: 0;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        min-height: 100vh;
                        background-color: #f0f0f0;
                        /* Cambia el color de fondo según tus preferencias */
                    }

                    .centered-image {
                        text-align: center;
                    }

                    .centered-image img {
                        max-width: 80%;
                        max-height: 80%;
                    }
                </style>
            </main>

            <!-- footer -->

            <?php
            include 'layouts/footer.php'
                ?>


        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>


</body>

</html>