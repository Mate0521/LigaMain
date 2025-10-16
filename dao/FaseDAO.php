<?php

class FaseDAO
{
    private $id_fase;
    private $nombre;

    public function __construct($id_fase=null, $nombre=null)
    {
        $this->id_fase = $id_fase;
        $this->nombre = $nombre;
    }

    public function obtenerFase(){
        return "SELECT `nombre` FROM `g1_fase` WHERE `id_fase` =". $this->id_fase .";";
    }

}