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
        return "SELECT  `id_usuario`, `nombre`, `id_tipo` 
                FROM `g1_campeonato` 
                WHERE `id_campeonato` = ". $this->id_campeonato ." ;";
    }
    public function obtenerCampeonatoUsuario()
    {
        return "SELECT  `id_campeonato`
                FROM `g1_campeonato` 
                WHERE `id_usuario` = ". $this->id_usuario ." ;";
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
    public function listarCampeonatosAll(){
        return "SELECT `id_campeonato`, `id_usuario`, `nombre`, `id_tipo` 
                FROM `g1_campeonato` ;";
    }
    public function listarEquipos(){
        return "SELECT  `id_equipo`, `puntuacion` 
                FROM `g1_campeonato_equipos` 
                WHERE `id_campeonato`=". $this->id_campeonato.";";

    }
    public function eliminarRelacionEquipos(){
        return "DELETE FROM `g1_campeonato_equipos` 
                WHERE `id_campeonato`=". $this->id_campeonato .";";
    }
    public function eliminarCampeonato(){
        return "DELETE FROM `g1_campeonato` 
                WHERE `id_campeonato` =". $this->id_campeonato .";";
    }

    public function obtenerTablaPosiciones($idCampeonato) {
        $conexion = new Conexion();
        $conexion->abrir();

        $sql = "SELECT e.nombre, ec.puntuacion, ec.goles_favor, ec.goles_contra,
                    (ec.goles_favor - ec.goles_contra) AS diferencia_gol
                FROM g1_campeonato_equipos ec
                INNER JOIN g1_equipo e ON ec.id_equipo = e.id_equipo
                WHERE ec.id_campeonato = $idCampeonato
                ORDER BY ec.puntuacion DESC, ec.goles_favor DESC, diferencia_gol DESC";

        // Ejecutar la consulta
        $conexion->ejecutar($sql);

        $tabla = [];
        while ($fila = $conexion->registro()) {
            $tabla[] = [
                'nombre' => $fila[0],
                'puntos' => $fila[1],
                'goles_favor' => $fila[2],
                'goles_contra' => $fila[3],
                'diferencia_gol' => $fila[4]
            ];
        }

        $conexion->cerrar();
        return $tabla;
    }



    
}