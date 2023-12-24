<?php
include_once "../datos/DNota.php";
class NNota
{
    public $Dnota;

    public function __construct()
    {
        $this->Dnota = new DNota();
    }
    public function listar(int $usuario_id)
    {
 
        return $this->Dnota->listar($usuario_id);
    }

    public function agregar(string $nombre,string $descripcion,string $link,string $fecha_hora, int $usuario_id)
    {
        $this->Dnota->agregar($nombre,$descripcion,$link,$fecha_hora,$usuario_id);
    }

    public function modificar(int $id, string $nombre,string $descripcion,string $link)
    {
        $this->Dnota->modificar($id,$nombre,$descripcion,$link);
    }

    public function eliminar(int $id)
    {
        $this->Dnota->eliminar($id);
    }
}
