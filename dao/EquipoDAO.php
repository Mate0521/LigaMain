<?php 
class EquipoDAO
{
    //atributos
    private $id_equipo;
    private $nombre;
    private $id_liga;
    private $img;

    //contructor
    
    public function __construct($id_equipo=null, $nombre=null, $id_liga=null, $img=null)
    {
        $this->id_equipo = $id_equipo;
        $this->nombre = $nombre;
        $this->id_liga = $id_liga;
        $this->img = $img;
    }

    //metodos para el crud del equipo
    public function crearEquipo()
    {
        return "INSERT INTO `g1_equipo`(`nombre`, `id_liga`, `img`) 
                VALUES ('". $this->nombre ."','". $this->id_liga ."','". $this->img ."');";
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
    public function validarNombre(){
        return "SELECT `id_equipo`
                FROM `g1_equipo` 
                WHERE `nombre`= '". $this->nombre ."';";
    }
    public function eliminarUsuario(){
        
    }
    
}