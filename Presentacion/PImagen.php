<?php

session_start();

if ($_SESSION["rol_usuario"] == null) {
    header("Location: PLogin.php");
}


include_once "../negocio/NImagen.php";
$nImagen = new NImagen();


$id = isset($_POST["id"]) ? $_POST["id"] : "";
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";

$imagen_base64;

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    // Ruta temporal del archivo cargado
    $archivo_temporal = $_FILES['imagen']['tmp_name'];
    $imagen = file_get_contents($archivo_temporal);
    $imagen_base64 = base64_encode($imagen);
}



$url1_image;
$url2_image;

$usuario_id = $_SESSION["id_usuario"];
$fecha_hora = date('Y-m-d H:i:s');


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
    global $nombre, $fase, $nImagen, $fecha_hora, $usuario_id, $url1_image, $url2_image, $imagen_base64;
    if ($imagen_base64 != null) {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://api.imgbb.com/1/upload?expiration=86400&key= " your api key in web free " ',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('image' => $imagen_base64),
            )
        );

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
        } else {
            $objet = json_decode($response);

            $url = $objet->data->url;
            $url2 = $objet->data->thumb->url;

            $url1_image = $url;
            $url2_image = $url2;
            $nImagen->agregar($nombre, $url1_image, $url2_image, $fecha_hora, $usuario_id);
        }



    }

    // Aquí puedes continuar con el procesamiento o almacenamiento de los datos

}

function modificar()
{
    global $nombre, $nImagen, $id;
    $nImagen->modificar($id, $nombre);
}

function listar()
{
    global $nImagen, $usuario_id;
    return $nImagen->listar($usuario_id);
}

function eliminar()
{
    global $id, $nImagen;
    $nImagen->eliminar($id);
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
    <title>Imagen Temporal</title>
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
                    <h1 class="mt-4">Imagen Temporal</h1>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>

                            <div class="container ">

                                <h3>
                                    <?php if (isset($_POST['cargar']))
                                        echo 'Modificar';
                                    else
                                        echo 'Agregar';
                                    ?> Imagen
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
                                        <label for="imagen" class="col-sm-2 col-form-label">Imagen</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="imagen" name="imagen" value="">
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
                                                <a type="button" class="btn btn-info" href="PImagen.php">Cancelar</a>
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
                                            <th>image</th>
                                            <th>url</th>

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
                                            $html .= '<td><img src="' . $reg->url2 . '" alt="Imagen 2" width="50" height="50"></td>';
                                            $html .= '<td><a href="' . $reg->url1 . '" target="_blank" style="background-color: orange; color: black; padding: 5px; display: inline-block;">click</a></td>';



                                            $html = $html . '
                                               <td class="row"> 
                                               <form  method="POST">
                                                   <input type="hidden" name="id" value="' . $reg->id . '">
                                                    <input type="hidden" name="nombre" value="' . $reg->nombre . '">
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
