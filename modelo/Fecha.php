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
}