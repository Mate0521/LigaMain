<?php
class TipoDAO{
    
    private $id_tipo;
    private $nombre;

    public function __construct($id_tipo = null, $nombre = null)
    {
        $this->id_tipo = $id_tipo;
        $this->nombre = $nombre;
    }

    public function obtenerTipos() {
        return [
            "sql" => "SELECT id_tipo, nombre 
                    FROM g1_tipo",
            "parametros" => []
        ];
    }

    public function obtenerTipo() {
        return [
            "sql" => "SELECT nombre 
                    FROM g1_tipo 
                    WHERE id_tipo = :id_tipo",
            "parametros" => ["
                :id_tipo" => $this->id_tipo
                ]
        ];
    }
}