<?php
class Equipo
{
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
    public function getImg()
    {
        return $this->img;
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
    public function setImg($img)
    {
        $this->img = $img;
    }

    //metodos para el crud del equipo
    
    public function crearEquipo()
    {
        $conexion = new Conexion();
        $conexion -> abrir();
        $equipopDAO = new EquipoDAO("", $this -> nombre, $this->id_liga, $this->img);
        try{
            $conexion -> ejecutar($equipopDAO ->crearEquipo());
            $conexion -> cerrar();
            return true;
        }catch(Exception $e){
            return $e;
        }
    }

    public function obtenerEquipo()
    {
        $conexion = new Conexion();
        $equipoDAO = new EquipoDAO($this->id_equipo);
        $sql = $equipoDAO->obtenerEquipo();
        $conexion -> abrir();
        $conexion -> ejecutar($sql);
        if($fila = $conexion -> registro()){
            $this->nombre=$fila[0];

            $liga=new Liga($fila[1]);
            $liga->obtenerLiga();
            $this->id_liga=$liga;
            
            $this->img=$fila[2];
        }
        

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
            $equipos[] = new Equipo($fila[0], $fila[1], $fila[2], $fila[3]);
        }

        $conexion -> cerrar();
        return $equipos;
    }

    public function validarNombre(){
        $conexion = new Conexion();
        $equipoDAO = new EquipoDAO("", $this->nombre, $this->id_liga);
        $sql = $equipoDAO->validarNombre();
        $conexion->abrir();
        $conexion -> ejecutar($sql);
        $fila = $conexion -> registro();
        $conexion->cerrar();
        return !$fila[0];

    }
}