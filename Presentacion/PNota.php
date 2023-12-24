<?php

session_start();

if($_SESSION["rol_usuario"]== null){
    header("Location: PLogin.php");
  }


include_once "../negocio/NNota.php";
$nNota = new NNota();


$id = isset($_POST["id"]) ? $_POST["id"] : "";
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
$link = isset($_POST["link"]) ? $_POST["link"] : "";

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
    global $nombre, $descripcion, $link, $nNota, $fecha_hora, $usuario_id;
    $nNota->agregar($nombre, $descripcion, $link, $fecha_hora, $usuario_id);
}

function modificar()
{
    global $nombre, $descripcion, $link, $nNota, $id;
    $nNota->modificar($id, $nombre, $descripcion, $link);
}

function listar()
{
    global $nNota, $usuario_id;
    return $nNota->listar($usuario_id);
}

function eliminar()
{
    global $id, $nNota;
    $nNota->eliminar($id);
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
    <title>Nota</title>
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
                    <h1 class="mt-4">Nota</h1>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>

                            <div class="container ">

                                <h3>
                                    <?php if (isset($_POST['cargar']))
                                        echo 'Modificar';
                                    else
                                        echo 'Agregar';
                                    ?> Nota
                                </h3>
                                <br>
                                <!-- Formulario -->
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id"
                                        value="<?php if (isset($_POST["cargar"]))
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
                                            <input type="text" required class="form-control" id="descripcion"
                                                name="descripcion"
                                                value="<?php if (isset($_POST["cargar"]))
                                                    echo $_POST["descripcion"]; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="link" class="col-sm-2 col-form-label">link</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="link" name="link"
                                            value="<?php if (isset($_POST["cargar"]))
                                                    echo $_POST["link"]; ?>">
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
                                                <a type="button" class="btn btn-info" href="PNota.php">Cancelar</a>
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
                                            <th>link</th>

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
                                            
                                            if ($reg->link != null) {
                                                $html .= '<td><a href="' . $reg->link . '" target="_blank" style="background-color: orange; color: black; padding: 5px; display: inline-block;">click</a></td>';
                                            } else {
                                                $html .= '<td></td>';
                                            }

                                            $html = $html . '
                                               <td class="row"> 
                                               <form  method="POST">
                                                   <input type="hidden" name="id" value="' . $reg->id . '">
                                                    <input type="hidden" name="nombre" value="' . $reg->nombre . '">
                                                    <input type="hidden" name="descripcion" value="' . $reg->descripcion . '">
                                                    <input type="hidden" name="link" value="' . $reg->link . '">
                                                  
                                                    

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