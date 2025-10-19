<?php

class Tipo
{
    private $id_tipo;
    private $nombre;

    public function __construct($id_tipo = null, $nombre = null)
    {
        $this->id_tipo = $id_tipo;
        $this->nombre = $nombre;
    }

    public function getIdTipo()
    {
        return $this->id_tipo;
    }

    public function setIdTipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function obtenerTipos(){
        $conexion = new Conexion();
        $tipoDAO = new TipoDAO();
        $sql = $tipoDAO->obtenerTipos();
        $conexion -> abrir();
        $tipos = [];
        $conexion -> ejecutar($sql);

        while($fila = $conexion -> registro()){
            $tipos[] = new Tipo($fila[0], $fila[1]);
        }

        $conexion -> cerrar();
        return $tipos;

    }

    public function obtenerTipo(){
        $conexion = new Conexion();
        $tipoDAO = new TipoDAO($this->id_tipo);
        $sql = $tipoDAO->obtenerTipo();
        $conexion -> abrir();
        $conexion -> ejecutar($sql);
        if($fila=$conexion->registro()){
            $this->nombre= $fila[0];
        }

        $conexion -> cerrar();
    }
}