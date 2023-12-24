<?php

include_once "Conexion.php";

class DNota
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
        $sql = "SELECT * FROM notas WHERE estado = '1' and usuario_id = '".$usuario_id."' order by id desc";
        return $this->conexion->listado($sql);
    }

    public function agregar($nombre,$descripcion,$link,$fecha_hora,$usuario_id)
    {
        $sql = "INSERT INTO notas (nombre, descripcion, link, fecha_hora,usuario_id)
                VALUES ('" . $nombre . "','" .$descripcion . "','"  . $link . "','".$fecha_hora."','".$usuario_id."')";
        $this->conexion->consulta($sql);
    }

    public function modificar($id,$nombre,$descripcion,$link)
    {
        $sql = "UPDATE notas SET  nombre= '" . $nombre . "',descripcion='" .$descripcion . "',link='"  . $link . "' WHERE id='" . $id . "' ";
        $this->conexion->consulta($sql);
    }

  
    public function eliminar($id)
    {
        $sql = "UPDATE notas SET  estado= '0' WHERE id='" . $id . "' ";
        return $this->conexion->consulta($sql);
    }
}
