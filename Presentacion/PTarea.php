<?php

session_start();

if ($_SESSION["rol_usuario"] == null) {
    header("Location: PLogin.php");
}


include_once "../negocio/NTarea.php";
$nTarea = new NTarea();


$id = isset($_POST["id"]) ? $_POST["id"] : "";
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
$fase = isset($_POST["fase"]) ? $_POST["fase"] : "";

$usuario_id = $_SESSION["id_usuario"];

// Obtiene la fecha y hora actual
$fecha_hora = date('Y-m-d H:i:s');

// Imprime la fecha y hora
echo "La fecha y hora actual del sistema es: " . $fecha_hora;


if (!empty($_POST)) {
    if (isset($_POST["agregar"])) {
        agregar();
    }
    if (isset($_POST["modificar"])) {
        modificar();
    }
    if (isset($_POST["eliminar"])) {
        eliminar();
    }
}

function agregar()
{
    global $nombre, $descripcion, $fase, $nTarea, $fecha_hora, $usuario_id;
    $nTarea->agregar($nombre, $descripcion, $fase, $fecha_hora, $usuario_id);
}

function modificar()
{
    global $nombre, $descripcion, $fase, $nTarea, $id;
    $nTarea->modificar($id, $nombre, $descripcion, $fase);
}

function listar()
{
    global $nTarea, $usuario_id;
    return $nTarea->listar($usuario_id);
}

function eliminar()
{
    global $id, $nTarea;
    $nTarea->eliminar($id);
}

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
    <title>Tarea</title>
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
                    <h1 class="mt-4">Tarea</h1>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>

                            <div class="container ">

                                <h3>
                                    <?php if (isset($_POST['cargar']))
                                        echo 'Modificar';
                                    else
                                        echo 'Agregar';
                                    ?> Tarea
                                </h3>
                                <br>
                                <!-- Formulario -->
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php if (isset($_POST["cargar"]))
                                        echo $_POST["id"]; ?>">
                                    <div class="form-group row">
                                        <label for="nombre" class="col-sm-2 col-form-label">nombre</label>
                                        <div class="col-sm-10">
                                            <input type="text" required class="form-control" id="nombre" name="nombre"
                                                value="<?php if (isset($_POST["cargar"]))
                                                    echo $_POST["nombre"]; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="descripcion" class="col-sm-2 col-form-label">descripcion</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="descripcion" name="descripcion"
                                                value="<?php if (isset($_POST["cargar"]))
                                                    echo $_POST["descripcion"]; ?>">
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label for="fase" class="col-sm-2 col-form-label">Fase</label>
                                        <div class="col-sm-10">


                                            <select class="form-control " name="fase" id="fase">
                                                <option value="progreso" <?php if (isset($_POST["cargar"]) && $_POST["fase"] == "progreso")
                                                    echo "selected" ?>>Progreso</option>
                                                    <option value="finalizado" <?php if (isset($_POST["cargar"]) && $_POST["fase"] == "finalizado")
                                                    echo "selected" ?>>Finalizado</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class=" form-group row ">

                                            <?php
                                                if (isset($_POST['cargar'])) {
                                                    echo '
                                            <div class=" col-sm-6">
                                            <button type="submit" name="modificar" id="modificar" class="btn btn-primary">Modificar</button>
                                           </div> 
                                               <div class="col-sm-6">
                                                <a type="button" class="btn btn-info" href="PTarea.php">Cancelar</a>
                                                </div>';
                                                } else {
                                                    echo '
                                            <div class=" col-sm-6">
                                            <button type="submit" name="agregar" id="agregar" class="btn btn-primary">Agregar</button>
                                           </div> ';
                                                }

                                                ?>
                                    </div>

                                </form>
                            </div>
                        </div>





                        <div class=" card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>nombre</th>
                                            <th>Descripcion</th>
                                            <th>fase</th>

                                            <th>opciones</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php


                                        $res = listar();
                                        //var_dump($res->fetch_object());
                                        $html = '';
                                        while ($reg = $res->fetch_object()) {
                                            $html .= '<tr>';
                                            $html .= '<td>' . $reg->id . '</td>';
                                            $html .= '<td>' . $reg->nombre . '</td>';
                                            $html .= '<td>' . $reg->descripcion . '</td>';
                                            if ($reg->fase == 'progreso') {
                                                $html .= '<td><a target="_blank" style="background-color: 78C242; color: black; padding: 5px; display: inline-block;">'.$reg->fase.'</a></td>';
                                            } elseif ($reg->fase == 'finalizado') {
                                                $html .= '<td><a target="_blank" style="background-color: F36A6A; color: black; padding: 5px; display: inline-block;">'.$reg->fase.'</a></td>';
                                            } else {
                                                $html .= '<td>' . $reg->fase . '</td>';
                                            }


                                            $html = $html . '
                                               <td class="row"> 
                                               <form  method="POST">
                                                   <input type="hidden" name="id" value="' . $reg->id . '">
                                                    <input type="hidden" name="nombre" value="' . $reg->nombre . '">
                                                    <input type="hidden" name="descripcion" value="' . $reg->descripcion . '">
                                                    <input type="hidden" name="fase" value="' . $reg->fase . '">
     
                                                    <button type="submit" value="cargar" name="cargar"  class="btn btn-info" role="button"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                                 ';

                                            $html = $html . '  <button type="submit" value="eliminar" name="eliminar"  class="btn btn-danger" role="button"><i class="fa fa-trash" aria-hidden="true"></i></button>';


                                            $html = $html . '
                                                     </form>
                                                  </tr>';
                                        }
                                        echo $html;
                                        ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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