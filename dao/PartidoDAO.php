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
        return [
            "sql"=>"INSERT INTO g1_partido (id_eq_local, id_eq_visit, id_fase, id_fecha, goles_local, goles_visit)
                VALUES (:id_eq_local, :id_eq_visit, :id_fase, :fecha, 0, 0)",
            "parametros"=>[
                ":id_eq_local"=>$this->id_eq_local,
                ":id_eq_visit"=>$this->id_eq_visit,
                ":id_fase"=>$this->id_fase,
                ":fecha"=>$this->id_fecha
            ]
            ];
    }

    // Listar partidos por fechas
    public function listarPartidos($id_fechas)
    {
        if (!is_array($id_fechas)) {
            $id_fechas = explode(',', $id_fechas);
        }

        // creamos placeholders dinámicos (:id_fecha0, :id_fecha1, etc.)
        $placeholders = [];
        $parametros = [];
        foreach ($id_fechas as $index => $valor) {
            $ph = ":id_fecha{$index}";
            $placeholders[] = $ph;
            $parametros[$ph] = $valor;
        }

        // Unimos todos los placeholders en una sola cadena
        $inClause = implode(', ', $placeholders);

        return [
            "sql" => "SELECT id_partido, id_eq_local, id_eq_visit, id_fase, id_fecha, goles_local, goles_visit 
                    FROM g1_partido
                    WHERE id_fecha IN ($inClause)",
            "parametros" => $parametros
        ];
    }

    // Consultar partido individual
    public function consultar()
    {
        return [
            "sql"=>"SELECT id_partido, id_eq_local, id_eq_visit, id_fase, id_fecha, goles_local, goles_visit 
                FROM g1_partido 
                WHERE id_partido = :id_partido ;",
            "parametros"=>[
                ":id_partido"=>$this->id_partido
            ]
            ];
    }

        // Actualizar resultado
    public function actualizarResultado() {
        return [
            "sql" => "UPDATE g1_partido 
                      SET goles_local = :goles_local, goles_visit = :goles_visit 
                      WHERE id_partido = :id_partido;",
            "parametros" => [
                ":goles_local" => $this->goles_local,
                ":goles_visit" => $this->goles_visit,
                ":id_partido" => $this->id_partido
            ]
        ];
    }

    public function actualizarPuntos($id_equipo, $puntos, $goles_favor, $goles_contra, $id_campeonato) {
        return [
            "sql" => "UPDATE g1_campeonato_equipos
                    SET puntuacion = puntuacion + :puntos,
                        goles_favor = goles_favor + :goles_favor,
                        goles_contra = goles_contra + :goles_contra
                    WHERE id_equipo = :id_equipo AND id_campeonato  = :id_campeonato ;",
            "parametros" => [
                ":puntos" => $puntos,
                ":goles_favor" => $goles_favor,
                ":goles_contra" => $goles_contra,
                ":id_equipo" => $id_equipo,
                ":id_campeonato"=> $id_campeonato
            ]
        ];
    }

    public function eliminarPartidos($id_fechas)
    {
        if (!is_array($id_fechas)) {
            $id_fechas = explode(',', $id_fechas);
        }

        // creamos placeholders dinámicos (:id_fecha0, :id_fecha1, etc.)
        $placeholders = [];
        $parametros = [];
        foreach ($id_fechas as $index => $valor) {
            $ph = ":id_fecha{$index}";
            $placeholders[] = $ph;
            $parametros[$ph] = $valor;
        }

        // Unimos todos los placeholders en una sola cadena
        $inClause = implode(', ', $placeholders);

        return [
            "sql" => "DELETE FROM g1_partido
                    WHERE id_fecha IN ($inClause)",
            "parametros" => $parametros
        ];
    }

}
?>
