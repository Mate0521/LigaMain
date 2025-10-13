<?php

class Campeonato
{
    //atributos
    private $id_campeonato;
    private $id_usuario;
    private $nombre;

    //constructor
    public function __construct($id_campeonato=null, $id_usuario=null, $nombre=null)
    {
        $this->id_campeonato = $id_campeonato;
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
    }

    //getters

    public function getIdCampeonato()
    {
        return $this->id_campeonato;
    }
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    //setters

    public function setIdCampeonato($id_campeonato)
    {
        $this->id_campeonato = $id_campeonato;
    }
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    //metodos para el crud del campeonato

    public function crearCampeonato()
    {
        $conexion = new Conexion();
        $conexion -> abrir();
        $campeonatoDAO = new CampeonatoDAO("", $this->id_usuario, $this -> nombre);        
        try{
            $conexion -> ejecutar($campeonatoDAO ->crearCampeonato());
            $conexion -> cerrar();
            return true;
        }catch(Exception $e){
            return $e;
        }
    }
    public function obtenerCampeonato()
    {
        //codigo para obtener un campeonato de la base de datos
    }
    public function actualizarCampeonato()
    {
        //codigo para actualizar un campeonato en la base de datos
    }
    public function eliminarCampeonato()
    {
        //codigo para eliminar un campeonato de la base de datos
    }
    public function validarNombre()
    {
        $conexion = new Conexion();
        $campeonatoDAO = new CampeonatoDAO("", $this->id_usuario, $this->nombre);
        $sql = $campeonatoDAO->valNombre();
        $conexion->abrir();
        $conexion->ejecutar($sql);
        if($fila = $conexion->registro()){
            $this->id_campeonato = $fila[0];
            $conexion->cerrar();
            return false;
        }
        return true;
    }

    public function relaionarEquipos(){
        
    }
}