<?php
class TipoDAO{
    
    private $id_tipo;
    private $nombre;

    public function __construct($id_tipo = null, $nombre = null)
    {
        $this->id_tipo = $id_tipo;
        $this->nombre = $nombre;
    }

    public function obtenerTipos(){
        return "SELECT `id_tipo`, `nombre` FROM `g1_tipo`";
    }

    public function obtenerTipo(){
        return "SELECT `nombre`
                FROM `g1_tipo`
                WHERE `id_tipo`= ". $this->id_tipo ." ;";
    }
}