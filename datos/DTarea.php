<?php

include_once "Conexion.php";

class DTarea
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
        $sql = "SELECT * FROM tareas WHERE estado = '1' and usuario_id = '".$usuario_id."' order by id desc";
        return $this->conexion->listado($sql);
    }

    public function agregar($nombre,$descripcion,$fase,$fecha_hora,$usuario_id)
    {
        $sql = "INSERT INTO tareas (nombre, descripcion, fase, fecha_hora,usuario_id)
                VALUES ('" . $nombre . "','" .$descripcion . "','"  . $fase . "','".$fecha_hora."','".$usuario_id."')";
        $this->conexion->consulta($sql);
    }

    public function modificar($id,$nombre,$descripcion,$fase)
    {
        $sql = "UPDATE tareas SET  nombre= '" . $nombre . "',descripcion='" .$descripcion . "',fase='"  . $fase . "' WHERE id='" . $id . "' ";
        $this->conexion->consulta($sql);
    }

  
    public function eliminar($id)
    {
        $sql = "UPDATE tareas SET  estado= '0' WHERE id='" . $id . "' ";
        return $this->conexion->consulta($sql);
    }
}
