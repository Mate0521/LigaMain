<?php

class Campeonato
{
    //atributos
    private $id_campeonato;
    private $id_usuario;
    private $nombre;
    private $id_tipo;

    //constructor
    public function __construct($id_campeonato=null, $id_usuario=null, $nombre=null, $id_tipo=null)
    {
        $this->id_campeonato = $id_campeonato;
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->id_tipo=$id_tipo;
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
    public function getIdTipo()
    {
        return $this->id_tipo;
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
    public function setIdTipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;
    }

    //metodos para el crud del campeonato

    public function crearCampeonato()
    {
        $conexion = new Conexion();
        $conexion -> abrir();
        $campeonatoDAO = new CampeonatoDAO("", $this->id_usuario, $this -> nombre, $this->id_tipo);        
        try{
            $conexion -> ejecutar($campeonatoDAO ->crearCampeonato());
            $conexion -> cerrar();
            $this->obtenerCampeonato();
            return true;
        }catch(Exception $e){
            return $e;
        }
    }
    public function obtenerCampeonato()
    {
        $conexion = new Conexion();
        $campeonatoDAO = new CampeonatoDAO("", $this->id_usuario, $this->nombre);
        $sql = $campeonatoDAO->valNombre();
        $conexion->abrir();
        $conexion->ejecutar($sql);
        if($fila = $conexion->registro()){
            $this->id_campeonato = $fila[0];
            $conexion->cerrar();
        }
    }
    public function obtenerCampeonatoId()
    {
        $conexion = new Conexion();
        $campeonatoDAO = new CampeonatoDAO($this->id_campeonato);
        $sql = $campeonatoDAO->obtenerCampeonato();
        $conexion->abrir();
        $conexion->ejecutar($sql);
        if($fila = $conexion->registro()){
            $this->id_usuario = $fila[0];
            $this-> nombre=$fila[1];
            $this-> id_tipo=$fila[2];
            $conexion->cerrar();
        }
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

    public function relaionarEquipos($idEquipo){
        $conexion = new Conexion();
        $conexion -> abrir();
        $campeonatoDAO = new CampeonatoDAO($this->id_campeonato, "", "");        
        try{
            $sql=$campeonatoDAO ->relaionarEquipos($idEquipo);
            $conexion -> ejecutar($sql);
            $conexion -> cerrar();
            return true;
        }catch(Exception $e){
            return $e;
        }

        
    }
    public function listarCampeonatos(){
        $conexion = new Conexion();
        $campeonatoDAO = new CampeonatoDAO("", $this->id_usuario);
        $sql = $campeonatoDAO->listarCampeonatos();
        $conexion -> abrir();
        $campeonatos = [];
        $conexion -> ejecutar($sql);

        while($fila = $conexion -> registro()){
            $campeonatos[] = new Campeonato($fila[0], $fila[1], $fila[2], $fila[3]);
        }

        $conexion -> cerrar();
        return $campeonatos;
    }
    public function listarEquipos(){
        $conexion = new Conexion();
        $campeonatoDAO = new CampeonatoDAO($this->id_campeonato);
        $sql = $campeonatoDAO->listarEquipos();
        $conexion -> abrir();
        $equiopos = [];
        $conexion -> ejecutar($sql);

        while($fila = $conexion -> registro()){
            $equiopos[] = $fila[0];
        }

        $conexion -> cerrar();
        return $equiopos;

    }


}