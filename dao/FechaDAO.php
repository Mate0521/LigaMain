<?php

class FechaDAO
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

    //metodos para el crud de la fecha
    public function crearFecha()
    {
        return "INSERT INTO `g1_fecha`(`id_campeonato`, `fecha`) 
                VALUES ('". $this->id_campeonato ."','". $this->fecha ."');";
    }

    public function listarFechas(){
        return "SELECT `id_fecha`,  `fecha`
                FROM `g1_fecha` 
                WHERE `id_campeonato` = ". $this->id_campeonato .";";
    }

    public function obtenerFecha(){
        return "SELECT `fecha`, `id_campeonato`
                FROM `g1_fecha` 
                WHERE `id_fecha` = ". $this->id_fecha .";";
    }

    public function eliminarFechas(){
        return "DELETE FROM `g1_fecha` 
                WHERE `id_campeonato`=". $this->id_campeonato ." ;";
    }
}