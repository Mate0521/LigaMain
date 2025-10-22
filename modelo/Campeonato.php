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

            $usuario=new Usuario($fila[0]);
            $usuario->obtenerUsuario();
            $this->id_usuario = $usuario;

            $this-> nombre=$fila[1];

            $tipo=new Tipo($fila[2]);
            $tipo->obtenerTipo();
            $this-> id_tipo=$tipo;

            $conexion->cerrar();
        }
    }
    public function obtenerCampeonatoIdUsuario()
    {
        $conexion = new Conexion();
        $campeonatoDAO = new CampeonatoDAO("", $this->id_usuario);
        $sql = $campeonatoDAO->obtenerCampeonatoUsuario();
        $conexion->abrir();
        $conexion->ejecutar($sql);
        while($fila = $conexion -> registro()){
            $campeonatos[]= $fila[0];
        }
        $conexion->cerrar();
        return $campeonatos;
    }
    public function eliminarCampeonato()
    {
        $conexion = new Conexion();
        $campeonatoDAO = new CampeonatoDAO($this->id_campeonato);
        //primero eliminar los equipos y fechas relacionacionados con este 
        $sql=$campeonatoDAO->eliminarRelacionEquipos();
        $conexion->abrir();
        try{
            $conexion->ejecutar($sql);
            //ahora eliminar la relacion con las fechas 
            $fecha=new Fecha("",$this->id_campeonato);
            $fecha->eliminarFechas();
            //ya sin relacion alguna elminamos el campeonato
            $sql = $campeonatoDAO->eliminarCampeonato();
            $conexion->ejecutar($sql);
        }catch(Exception $e){
            return $e;
        }
        


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

            $this->id_campeonato=$fila[0];
            
            $usuario=new Usuario($fila[1]);
            $usuario->obtenerUsuario();
            $this->id_usuario=$usuario;

            $this->nombre=$fila[2];

            $tipo=new Tipo($fila[3]);
            $tipo->obtenerTipo();
            $this->id_tipo=$tipo;



            $campeonatos[] = new Campeonato($this->id_campeonato, $this->id_usuario, $this->nombre, $this->id_tipo);
        }

        $conexion -> cerrar();
        return $campeonatos;
    }
    public function listarCampeonatosAll(){
        $conexion = new Conexion();
        $campeonatoDAO = new CampeonatoDAO();
        $sql = $campeonatoDAO->listarCampeonatosAll();
        $conexion -> abrir();
        $campeonatos = [];
        $conexion -> ejecutar($sql);

        while($fila = $conexion -> registro()){

            $this->id_campeonato=$fila[0];
            
            $usuario=new Usuario($fila[1]);
            $usuario->obtenerUsuario();
            $this->id_usuario=$usuario;

            $this->nombre=$fila[2];

            $tipo=new Tipo($fila[3]);
            $tipo->obtenerTipo();
            $this->id_tipo=$tipo;



            $campeonatos[] = new Campeonato($this->id_campeonato, $this->id_usuario, $this->nombre, $this->id_tipo);
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