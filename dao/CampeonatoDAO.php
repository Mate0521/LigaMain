<?php

class CampeonatoDAO
{
    //atributos
    private $id_campeonato;
    private $id_usuario;
    private $nombre;

    //constructor
    public function __construct($id_campeonato=null, $id_usuario=null, $nombre=null)
    {
        $this->id_campeonato = $id_campeonato;
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
    }

    //metodos para el crud del campeonato

    public function crearCampeonato()
    {
        //codigo para crear un campeonato en la base de datos
    }
    public function obtenerCampeonato()
    {
        //codigo para obtener un campeonato de la base de datos
    }
    
}