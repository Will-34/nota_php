<?php

include_once "Conexion.php";

class DImagen
{
    private  $id;
    private  $nombre;

    public $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function listar($usuario_id)
    {
        $sql = "SELECT * FROM imagen WHERE estado = '1' and usuario_id = '".$usuario_id."' order by id desc";
        return $this->conexion->listado($sql);
    }

    public function agregar($nombre,$url1,$url2,$fecha_hora,$usuario_id)
    {
        $sql = "INSERT INTO imagen (nombre, url1, url2, fecha_hora,usuario_id)
                VALUES ('" . $nombre . "','" .$url1 . "','"  . $url2 . "','".$fecha_hora."','".$usuario_id."')";
        $this->conexion->consulta($sql);
    }

    public function modificar($id,$nombre)
    {
        $sql = "UPDATE imagen SET  nombre= '" . $nombre . "' WHERE id='" . $id . "' ";
        $this->conexion->consulta($sql);
    }

  
    public function eliminar($id)
    {
        $sql = "UPDATE imagen SET  estado= '0' WHERE id='" . $id . "' ";
        return $this->conexion->consulta($sql);
    }
}
