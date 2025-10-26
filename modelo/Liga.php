<?php

class Liga
{
    private $id_liga;
    private $nombre;

    //constructor
    public function __construct($id_liga=null, $nombre=null)
    {
        $this->id_liga = $id_liga;
        $this->nombre = $nombre;
    }
    //getters
    public function getIdLiga()
    {
        return $this->id_liga;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    //setters
    public function setIdLiga($id_liga)
    {
        $this->id_liga = $id_liga;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function obtenerLiga(){
        $conexion = new Conexion();
        $ligaDAO = new LigaDAO($this->id_liga);
        $sql = $ligaDAO->obtenerLiga();
        $conexion -> abrir();
        $conexion -> ejecutar($sql['sql'], $sql['parametros']);
        if($fila = $conexion->registro()){
            $this->nombre=$fila[0];
        }
        $conexion -> cerrar();
    }
    public function listarLigas(){
        $conexion = new Conexion();
        $ligaDAO = new LigaDAO();
        $sql = $ligaDAO->listarLigas();
        $conexion -> abrir();
        $conexion -> ejecutar($sql['sql'], $sql['parametros']);
        $ligas=[];
        while($fila = $conexion -> registro()){
            $ligas[] = new Liga($fila[0], $fila[1]);
        }
        $conexion -> cerrar();
        return $ligas;

    }
}