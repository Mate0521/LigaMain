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
        return [
            "sql" => "INSERT INTO `g1_campeonato`( `id_usuario`, `nombre`, `id_tipo`) 
                      VALUES (':id_usuario',':nombre', ':id_tipo');",
            "parametros"  => [
                ":id_usuario"=> $this->id_usuario,
                ":nombre" => $this->nombre,
                ":id_tipo" => $this->id_tipo
            ]
            ];
    }
    public function obtenerCampeonato()
    {
        return[
            "sql" => "SELECT  `id_usuario`, `nombre`, `id_tipo` 
                      FROM `g1_campeonato` 
                      WHERE `id_campeonato` = :id_campeonato ;",
            "parametros" =>[
                ":id_campeonato"=>$this->id_campeonato
            ]
            ];
    }
    public function obtenerCampeonatoUsuario()
    {
        return[
            "sql"=> "SELECT  `id_campeonato`
                      FROM `g1_campeonato` 
                      WHERE `id_usuario` = :id_usuario ;",
            "parametros" => [
                ":id_usuario"=> $this->id_usuario
            ]
            ];
    }
    public function valNombre()
    {
        return [
            "sql"=>" SELECT `id_campeonato`
                FROM `g1_campeonato` 
                WHERE `id_usuario`= :id_usuario AND `nombre`=':nombre';",
            "parametros"=>[
                ":id_usuario"=>$this->id_usuario,
                ":nombre"=>$this->nombre
            ]
            ];
    }
    public function relaionarEquipos($id_equipo){
        return[
            "slq"=>"INSERT INTO `g1_campeonato_equipos`(`id_campeonato`, `id_equipo`, `puntuacion`) 
                VALUES (':id_campeonato',':id_equipo','0')",
            "parametros"=>[
                ":id_campeonato"=>$this->id_campeonato,
                ":id_equipo"=>$id_equipo
            ]
            ];
    }
    public function listarCampeonatos(){
        return [
            "sql"=> "SELECT `id_campeonato`, `id_usuario`, `nombre`, `id_tipo` 
                FROM `g1_campeonato` 
                WHERE `id_usuario` = :id_usuario ;",
            "parametros"=> [
                ":id_usuario"=> $this->id_usuario
            ]
            ];
    }
    public function listarCampeonatosAll(){
        return [
            "sql"=>"SELECT `id_campeonato`, `id_usuario`, `nombre`, `id_tipo` 
                FROM `g1_campeonato` ;",
            "parametros"=>[]
            ];
    }
    public function listarEquipos(){
        return [
            "sql"=>"SELECT  `id_equipo`, `puntuacion` 
                FROM `g1_campeonato_equipos` 
                WHERE `id_campeonato`= :id_campeonato ;",
            "parametros"=>[
                ":id_campeonato"=>$this->id_campeonato
            ]
            ];

    }
    public function eliminarRelacionEquipos(){
        return [
            "sql" => "DELETE FROM `g1_campeonato_equipos` 
                      WHERE `id_campeonato`= :id_campeonato ;",
            "parametros" => [
                ":id_campeonato"=>$this->id_campeonato
            ]
            ];
    }
    public function eliminarCampeonato(){
        return [
            "sql"=> "DELETE FROM `g1_campeonato` 
                WHERE `id_campeonato` = :id_campeonato;",
            "parametros"=>[
                ":id_campeonato"=>$this->id_campeonato
            ]
            ];
    }

    public function obtenerTablaPosiciones() {
        return [
            "sql"=>"SELECT e.nombre, ec.puntuacion, ec.goles_favor, ec.goles_contra,
                    (ec.goles_favor - ec.goles_contra) AS diferencia_gol
                FROM g1_campeonato_equipos ec
                INNER JOIN g1_equipo e ON ec.id_equipo = e.id_equipo
                WHERE ec.id_campeonato = :id_campeonato
                ORDER BY ec.puntuacion DESC, ec.goles_favor DESC, diferencia_gol DESC",
            "parametros"=>[
                ":id_campeonato"=>$this->id_campeonato
            ]
            ];
    }



    
}