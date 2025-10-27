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
        return [
            "sql"=>"INSERT INTO `g1_equipo`(`nombre`, `id_liga`, `img`) 
                VALUES ( :nombrre, :id_liga, :img );",
            "parametros"=>[
                ":nombrre"=>$this->nombre,
                ":id_liga"=>$this->id_liga,
                ":img"=>$this->img
            ]
            ];
    }
    public function obtenerEquipo()
    {
        return [
            "sql"=>"SELECT `nombre`, `id_liga`, `img` 
                FROM `g1_equipo` 
                WHERE `id_equipo` = :id_equipo ;",
            "parametros"=>[
                ":id_equipo"=>$this->id_equipo
            ]
            ];
    }
    public function listarEquipos()
    {
        return [
            "sql"=> "SELECT `id_equipo`, `nombre`, `id_liga`, `img` 
                FROM `g1_equipo`",
            "parametros"=>[]
        ];
    }
    public function validarNombre(){
        return [
            "sql"=>"SELECT `id_equipo`
                FROM `g1_equipo` 
                WHERE `nombre`= :nombre ;",
            "parametros"=>[
                ":nombre"=>$this->nombre
            ]
            ];
    }
    
}