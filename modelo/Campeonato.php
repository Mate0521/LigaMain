<?php

class Campeonato
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

    //getters

    public function getIdCampeonato()
    {
        return $this->id_campeonato;
    }
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    //setters

    public function setIdCampeonato($id_campeonato)
    {
        $this->id_campeonato = $id_campeonato;
    }
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
    public function setNombre($nombre)
    {
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
    public function actualizarCampeonato()
    {
        //codigo para actualizar un campeonato en la base de datos
    }
    public function eliminarCampeonato()
    {
        //codigo para eliminar un campeonato de la base de datos
    }
}