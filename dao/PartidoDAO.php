<?php

class PartidoDAO
{
    // Atributos
    private $id_partido;
    private $id_eq_local;
    private $id_eq_visit;
    private $id_fase;
    private $id_fecha;
    private $goles_local;
    private $goles_visit;

    // Constructor
    public function __construct($id_partido = null, $id_eq_local = null, $id_eq_visit = null, $id_fase = null, $id_fecha = null, $goles_local = null, $goles_visit = null)
    {
        $this->id_partido = $id_partido;
        $this->id_eq_local = $id_eq_local;
        $this->id_eq_visit = $id_eq_visit;
        $this->id_fase = $id_fase;
        $this->id_fecha = $id_fecha;
        $this->goles_local = $goles_local;
        $this->goles_visit = $goles_visit;
    }

    // Crear partido
    public function crearPartido()
    {
        return "INSERT INTO g1_partido (id_eq_local, id_eq_visit, id_fase, id_fecha, goles_local, goles_visit)
                VALUES ('{$this->id_eq_local}', '{$this->id_eq_visit}', '{$this->id_fase}', '{$this->id_fecha}', 0, 0)";
    }

    // Listar partidos por fechas
    public function listarPartidos($id_fechas)
    {
        return "SELECT id_partido, id_eq_local, id_eq_visit, id_fase, id_fecha, goles_local, goles_visit 
                FROM g1_partido
                WHERE id_fecha IN ($id_fechas)";
    }

    // Consultar partido individual
    public function consultar()
    {
        return "SELECT id_partido, id_eq_local, id_eq_visit, id_fase, id_fecha, goles_local, goles_visit 
                FROM g1_partido 
                WHERE id_partido = " . $this->id_partido.";";
    }

        // Actualizar resultado
    public function actualizarResultado()
    {
        $conexion = new Conexion();
        $conexion->abrir();

        $sql = "UPDATE g1_partido 
                SET goles_local = ". $this->goles_local.", goles_visit = ". $this->goles_visit ." 
                WHERE id_partido = ". $this->id_partido;

        $conexion->ejecutar($sql);
        $conexion->cerrar();
    }


    public function actualizarPuntos($idEquipo, $puntos, $golesFavor, $golesContra)
    {
        $conexion = new Conexion();
        $conexion->abrir();

        // Suma los puntos y los goles en la tabla campeonato_equipos
        $sql = "UPDATE g1_campeonato_equipos 
                SET puntuacion = puntuacion + $puntos,
                    goles_favor = goles_favor + $golesFavor,
                    goles_contra = goles_contra + $golesContra
                WHERE id_equipo = $idEquipo";

        $conexion->ejecutar($sql);
        $conexion->cerrar();
    }


}
?>
