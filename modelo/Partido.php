<?php
class Equipo
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

    //getters
    public function getIdPartido()
    {
        return $this->id_partido;
    }
    public function getIdEqLocal()
    {
        return $this->id_eq_local;
    }
    public function getIdEqVisit()
    {
        return $this->id_eq_visit;
    }
    public function getIdFase()
    {
        return $this->id_fase;
    }
    public function getIdFecha()
    {
        return $this->id_fecha;
    }
    public function getGolesLocal()
    {
        return $this->goles_local;
    }
    public function getGolesVisit()
    {
        return $this->goles_visit;
    }
    //setters
    public function setIdPartido($id_partido)
    {
        $this->id_partido = $id_partido;
    }
    public function setIdEqLocal($id_eq_local)
    {
        $this->id_eq_local = $id_eq_local;
    }
    public function setIdEqVisit($id_eq_visit)
    {
        $this->id_eq_visit = $id_eq_visit;
    }
    public function setIdFase($id_fase)
    {
        $this->id_fase = $id_fase;
    }
    public function setIdFecha($id_fecha)
    {
        $this->id_fecha = $id_fecha;
    }
    public function setGolesLocal($goles_local)
    {
        $this->goles_local = $goles_local;
    }
    public function setGolesVisit($goles_visit)
    {
        $this->goles_visit = $goles_visit;
    }

    //metodos para el crud del partido
    public function crearPartido()
    {
        //codigo para crear un partido en la base de datos
    }
    public function modificarPartido()
    {
        //codigo para modificar un partido en la base de datos
    }


}