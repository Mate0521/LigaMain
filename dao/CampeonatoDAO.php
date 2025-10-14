<?php

class CampeonatoDAO
{
    //atributos
    private $id_campeonato;
    private $id_usuario;
    private $nombre;
    private $id_tipo;

    //constructor
    public function __construct($id_campeonato=null, $id_usuario=null, $nombre=null, $id_tipo=null)
    {
        $this->id_campeonato = $id_campeonato;
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->id_tipo= $id_tipo;
    }

    //metodos para el crud del campeonato

    public function crearCampeonato()
    {
        return "INSERT INTO `g1_campeonato`( `id_usuario`, `nombre`, `id_tipo`) 
                VALUES ('". $this->id_usuario ."','". $this->nombre ."', '". $this->id_tipo ."');";
    }
    public function obtenerCampeonato()
    {
        //codigo para obtener un campeonato de la base de datos
    }
    public function valNombre()
    {
       return " SELECT `id_campeonato`
                FROM `g1_campeonato` 
                WHERE `id_usuario`=". $this->id_usuario ." AND `nombre`='". $this->nombre ."';";
    }
    public function relaionarEquipos($id_equipo){
        return "INSERT INTO `g1_campeonato_equipos`(`id_campeonato`, `id_equipo`, `puntuacion`) 
                VALUES ('". $this->id_campeonato ."','". $id_equipo ."','0')";
    }
    public function listarCampeonatos(){
        return "SELECT `id_campeonato`, `id_usuario`, `nombre`, `id_tipo` 
                FROM `g1_campeonato` 
                WHERE `id_usuario` = '". $this->id_usuario ."';";
    }
    
}