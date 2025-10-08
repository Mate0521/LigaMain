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
        //codigo para crear una fecha en la base de datos
    }
}