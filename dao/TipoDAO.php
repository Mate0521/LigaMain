<?php
class TipoDAO{
    
    private $id_tipo;
    private $nombre;

    public function __construct($id_tipo = null, $nombre = null)
    {
        $this->id_tipo = $id_tipo;
        $this->nombre = $nombre;
    }

    public function obtenerTipo(){
        return "SELECT `id_tipo`, `nombre` FROM `g1_tipo`";
    }
}