<?php 
class EquipoDAO
{
    //atributos
    private $id_equipo;
    private $nombre;
    private $id_liga;
    private $img;

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
        return "SELECT `nombre`, `id_liga`, `img` 
                FROM `g1_equipo` 
                WHERE `id_equipo` = ". $this->id_equipo .";";
    }
    public function listarEquipos()
    {
        return "SELECT `id_equipo`, `nombre`, `id_liga`, `img` 
                FROM `g1_equipo`";
    }
    
}