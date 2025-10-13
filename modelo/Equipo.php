<?php
class Equipo
{
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
    
    //getters
    
    public function getIdEquipo()
    {
        return $this->id_equipo;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getIdLiga()
    {
        return $this->id_liga;
    }

    //setters
    
    public function setIdEquipo($id_equipo)
    {
        $this->id_equipo = $id_equipo;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setIdLiga($id_liga)
    {
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
    public function actualizarEquipo()
    {
        //codigo para actualizar un equipo en la base de datos
    }
    public function eliminarEquipo()
    {
        //codigo para eliminar un equipo de la base de datos
    }
    public function listarEquipos()
    {
        $conexion = new Conexion();
        $equipoDAO = new EquipoDAO();
        $sql = $equipoDAO->listarEquipos();
        $conexion -> abrir();
        $equipos = [];
        $conexion -> ejecutar($sql);
        while($fila = $conexion -> registro()){
            $equipos[] = new Equipo($fila[0], $fila[1], $fila[2]);
        }
        $conexion -> cerrar();
        return $equipos;
    }
}