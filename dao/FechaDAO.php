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
        return [
            "sql"=>"INSERT INTO `g1_fecha`(`id_campeonato`, `fecha`) 
                VALUES (':id_campeonato',':fecha ');",
            "parametros"=>[
                ":id_campeonato"=>$this->id_campeonato,
                ":fecha"=>$this->fecha
            ]
            ];

    }

    public function listarFechas(){
        return [
            "sql"=>"SELECT `id_fecha`,  `fecha`
                FROM `g1_fecha` 
                WHERE `id_campeonato` = ". $this->id_campeonato .";",
            "parametros"=>[
                ":id_campeonato"=>$this->id_campeonato
            ]
            ];
    }

    public function obtenerFecha(){
        return[
            "sql"=>"SELECT `fecha`, `id_campeonato`
                FROM `g1_fecha` 
                WHERE `id_fecha` = :id_fecha ;",
            "parametros"=>[
                ":id_fecha"=>$this->id_fecha
            ]
            ];
    }

    public function eliminarFechas(){
        return[
            "sql"=>"DELETE FROM `g1_fecha` 
                WHERE `id_campeonato`= :id_campeonato ;",
            "parametros"=>[
                ":id_campeonato"=>$this->id_campeonato
            ]
            ];
    }
}