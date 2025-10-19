<?php
class LigaDAO
{
    //atributos
    private $id_liga;
    private $nombre;

    //constructor
    public function __construct($id_liga=null, $nombre=null)
    {
        $this->id_liga = $id_liga;
        $this->nombre = $nombre;
    }

    //metodos para el crud de la liga
    public function crearLiga()
    {
        //codigo para crear una liga en la base de datos
    }
    public function obtenerLiga()
    {
        return "SELECT `nombre` 
                FROM `g1_liga` 
                WHERE `id_liga` = ". $this->id_liga .";";
    }
}