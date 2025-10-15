<?php
class PartidoDAO
{
    //atributos
    private $id_partido;
    private $id_eq_local;
    private $id_eq_visit;
    private $id_fase;
    private $id_fecha;
    private $goles_local;
    private $goles_visit;

    //constructor
    public function __construct($id_partido=null, $id_eq_local=null, $id_eq_visit=null, $id_fase=null, $id_fecha=null, $goles_local=null, $goles_visit=null)
    {
        $this->id_partido = $id_partido;
        $this->id_eq_local = $id_eq_local;
        $this->id_eq_visit = $id_eq_visit;
        $this->id_fase = $id_fase;
        $this->id_fecha = $id_fecha;
        $this->goles_local = $goles_local;
        $this->goles_visit = $goles_visit;
    }

    public function crearPartido(){
        return "INSERT INTO `g1_partido`(`id_eq_local`, `id_eq_visit`, `id_fase`, `id_fecha`, `goles_local`, `goles_visit`) 
                VALUES ('". $this->id_eq_local ."','". $this->id_eq_visit ."','". $this->id_fase ."','". $this->id_fecha ."','0','0')";
    }

    public function listarPartidos($id_fechas){
        return "SELECT `id_partido`, `id_eq_local`, `id_eq_visit`, `id_fase`, `id_fecha`, `goles_local`, `goles_visit` 
                FROM `g1_partido`
                WHERE `id_fecha` IN  (". $id_fechas .");";
    }

}
