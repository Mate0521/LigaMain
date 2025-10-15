<?php

class Fase
{
    private $id_fase;
    private $nombre;

    public function __construct($id_fase=null, $nombre=null)
    {
        $this->id_fase = $id_fase;
        $this->nombre = $nombre;
    }
    //getters
    public function getIdFase()
    {
        return $this->id_fase;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    //setters
    public function setIdLiga($id_fase)
    {
        $this->id_fase = $id_fase;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function obtenerFase(){
        $conexion = new Conexion();
        $faseDAO = new FaseDAO($this->id_fase);
        $sql = $faseDAO->obtenerFase();
        $conexion -> abrir();
        $conexion -> ejecutar($sql);
        if($fila = $conexion->registro()){
            $this->nombre=$fila[0];
        }
        $conexion -> cerrar();
    }


}