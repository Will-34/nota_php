<?php
include_once "../datos/DTarea.php";
class NTarea
{
    public $Dtarea;

    public function __construct()
    {
        $this->Dtarea = new DTarea();
    }
    public function listar(int $usuario_id)
    {
 
        return $this->Dtarea->listar($usuario_id);
    }

    public function agregar(string $nombre,string $descripcion,string $fase,string $fecha_hora, int $usuario_id)
    {
        $this->Dtarea->agregar($nombre,$descripcion,$fase,$fecha_hora,$usuario_id);
    }

    public function modificar(int $id, string $nombre,string $descripcion,string $fase)
    {
        $this->Dtarea->modificar($id,$nombre,$descripcion,$fase);
    }

    public function eliminar(int $id)
    {
        $this->Dtarea->eliminar($id);
    }
}
