<?php
class Fecha
{
    private $id_fecha;
    private $id_campeonato;
    private $fecha;

    //constructor
    public function __construct($id_fecha=null, $id_campeonato=null, $fecha=null)
    {
        $this->id_fecha = $id_fecha;
        $this->id_campeonato = $id_campeonato;
        $this->fecha = $fecha;
    }
    //getters
    public function getIdFecha()
    {
        return $this->id_fecha;
    }
    public function getIdCampeonato()
    {
        return $this->id_campeonato;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    //setters
    public function setIdFecha($id_fecha)
    {
        $this->id_fecha = $id_fecha;
    }
    public function setIdCampeonato($id_campeonato)
    {
        $this->id_campeonato = $id_campeonato;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    //metodos para crear la fecha en la base de datos
    public function crearFecha()
    {
        $conexion = new Conexion();
        $conexion -> abrir();
        $fechaDAO = new FechaDAO("", $this->id_campeonato, $this->fecha);        
        try{
            $sql=$fechaDAO ->crearFecha();
            $conexion -> ejecutar($sql);
            $conexion -> cerrar();
            return true;
        }catch(Exception $e){
            return $e;
        }

    }

    public function listarFechas(){
        $conexion = new Conexion();
        $fechaDAO = new FechaDAO("", $this->id_campeonato);
        $sql = $fechaDAO->listarFechas();
        $conexion -> abrir();
        $fechas = [];
        $conexion -> ejecutar($sql);

        while($fila = $conexion -> registro()){
            $fechas[] = new Fecha($fila[0], $this->id_campeonato, $fila[1]);       
        }

        $conexion -> cerrar();
        return $fechas;
    }

    public function obtenerFecha(){
        $conexion = new Conexion();
        $fechaDAO = new FechaDAO($this->id_fecha);
        $sql = $fechaDAO->obtenerFecha();
        $conexion -> abrir();
        $conexion -> ejecutar($sql);
        if($fila = $conexion->registro()){
            $this->fecha=$fila[0];

            $campeonato = new Campeonato($fila[1]);
            $campeonato->obtenerCampeonatoId();
            $this->id_campeonato=$campeonato;
        }
        $conexion -> cerrar();
    }

    public function eliminarFechas(){
        $conexion = new Conexion();
        $fechaDAO = new FechaDAO("", $this->id_campeonato);
        //primero se debe de eliminar la relacion con los partidos 
        //previamente debemostener listas los ids de las fechas 
        $fechas=$this->listarFechas();
        //llamado a los partidos
        $partido = new Partido();
        $partido->eliminarPartidos($fechas);
        //ahora sin relacion alguna eliminamos las fechas 
        $sql=$fechaDAO->eliminarFechas();
        $conexion -> abrir();
        try{
            $conexion -> ejecutar($sql);
            $conexion->cerrar();
        }catch(Exception $e){
            return $e;
        }


    }
}