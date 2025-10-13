<?php 
class EquipoDAO
{
    //atributos
    private $id_equipo;
    private $nombre;
    private $id_liga;

    //contructor
    
    public function __construct($id_equipo=null, $nombre=null, $id_liga=null)
    {
        $this->id_equipo = $id_equipo;
        $this->nombre = $nombre;
        $this->id_liga = $id_liga;
    }

    //metodos para el crud del equipo
    public function crearEquipo()
    {
        //codigo para crear un equipo en la base de datos
    }
    public function obtenerEquipo()
    {
        //codigo para obtener un equipo de la base de datos
    }
    public function listarEquipos()
    {
        return "SELECT `id_equipo`, `nombre`, `id_liga` 
                FROM `g1_equipo`;";
    }
    
}