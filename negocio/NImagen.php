<?php
include_once "../datos/Dimagen.php";
class NImagen
{
    public $Dimagen;

    public function __construct()
    {
        $this->Dimagen = new DImagen();
    }
    public function listar(int $usuario_id)
    {
 
        return $this->Dimagen->listar($usuario_id);
    }
 
    public function agregar(string $nombre,string $url1,string $url2,string $fecha_hora, int $usuario_id)
    {
        $this->Dimagen->agregar($nombre,$url1,$url2,$fecha_hora,$usuario_id);
    }

    public function modificar(int $id, string $nombre)
    {
        $this->Dimagen->modificar($id,$nombre);
    }

    public function eliminar(int $id)
    {
        $this->Dimagen->eliminar($id);
    }
}
