<?php
class Partido
{
    // --- Atributos ---
    private $id_partido;
    private $id_eq_local;
    private $id_eq_visit;
    private $id_fase;
    private $id_fecha;
    private $goles_local;
    private $goles_visit;

    // --- Constructor ---
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

    // --- Getters ---
    public function getIdPartido() { 
        return $this->id_partido; 
    }
    public function getIdEqLocal() { 
        return $this->id_eq_local; 
    }
    public function getIdEqVisit() { 
        return $this->id_eq_visit; 
    }
    public function getIdFase() { 
        return $this->id_fase; 
    }
    public function getIdFecha() { 
        return $this->id_fecha; 
    }
    public function getGolesLocal() { 
        return $this->goles_local; 
    }
    public function getGolesVisit() { 
        return $this->goles_visit; 
    }

    // --- Setters ---
    public function setIdPartido($id_partido) { 
        $this->id_partido = $id_partido; 
    }
    public function setIdEqLocal($id_eq_local) { 
        $this->id_eq_local = $id_eq_local; 
    }
    public function setIdEqVisit($id_eq_visit) { 
        $this->id_eq_visit = $id_eq_visit; 
    }
    public function setIdFase($id_fase) { 
        $this->id_fase = $id_fase; 
    }
    public function setIdFecha($id_fecha) {
        $this->id_fecha = $id_fecha; 
    }
    public function setGolesLocal($goles_local) { 
        $this->goles_local = $goles_local; 
    }
    public function setGolesVisit($goles_visit) { 
        $this->goles_visit = $goles_visit; 
    }

    // --- Crear distribución según tipo de torneo ---
    public function crearDistribucion($equipos, $tipo, $fechas)
    {
        switch ($tipo) {
            case 1:
                $this->distribucion($fechas, $this->todosContraTodos($equipos));
                break;
            case 2:
                $this->eliminatoria();
                break;
            case 3:
                $this->mixta();
                break;
            default:
                echo "Tipo de torneo no válido.";
                break;
        }
    }

    // --- Todos contra todos ---
    public function todosContraTodos($equipos)
    {
        $n = count($equipos);
        if ($n % 2 != 0) {
            $equipos[] = null;
            $n++;
        }

        $jornadas = $n - 1;
        $partidosPorJornada = $n / 2;
        $calendario = [];

        for ($i = 0; $i < $jornadas; $i++) {
            $fecha = [];
            for ($j = 0; $j < $partidosPorJornada; $j++) {
                $local = $equipos[$j];
                $visit = $equipos[$n - 1 - $j];
                if ($local !== null && $visit !== null) {
                    $fecha[] = [
                        'local' => $local,
                        'visit' => $visit
                    ];
                }
            }
            $calendario[] = $fecha;
            $ultimo = array_pop($equipos);
            array_splice($equipos, 1, 0, [$ultimo]);
        }

        return $calendario;
    }

    public function eliminatoria() {

    }
    public function mixta() {

    }

    // --- Distribución en fechas ---
    public function distribucion($fechas, $calendario)
    {
        $partidos = [];
        $id_fase = 1;
        for ($i = 0; $i < count($calendario); $i++) {
            $jornada = $calendario[$i];
            $fechaObj = $fechas[$i];
            foreach ($jornada as $match) {
                $local = $match['local'];
                $visit = $match['visit'];

                $partido = new Partido();
                $partido->setIdEqLocal($local);
                $partido->setIdEqVisit($visit);
                $partido->setIdFase($id_fase);
                $partido->setIdFecha($fechaObj->getIdFecha());
                $partido->setGolesLocal(0);
                $partido->setGolesVisit(0);

                $partidos[] = $partido;
            }
        }
        return $this->insertarPartidos($partidos);
    }

    public function insertarPartidos($partidos)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        try {
            foreach ($partidos as $partido) {
                $partidoDAO = new PartidoDAO("", $partido->getIdEqLocal(), $partido->getIdEqVisit(), $partido->getIdFase(), $partido->getIdFecha());
                $sql = $partidoDAO->crearPartido();
                $conexion->ejecutar($sql);
            }
            $conexion->cerrar();
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

    // --- Obtener Partidos ---
    public function obtenerPartidos($fechas){

        $conexion = new Conexion();
        $conexion->abrir();
        $partidoDAO = new PartidoDAO();

        $id_fechas = [];
        foreach ($fechas as $fecha) {
            $id_fechas[] = $fecha->getIdFecha();
        }
        $id_fechas = implode(',', $id_fechas);

        $sql = $partidoDAO->listarPartidos($id_fechas);
        $partidos = [];
        $conexion->ejecutar($sql);

        while ($fila = $conexion->registro()) {
            $this->id_partido = $fila[0];

            $eq_local = new Equipo($fila[1]);
            $eq_local->obtenerEquipo();
            $this->id_eq_local = $eq_local;

            $eq_visit = new Equipo($fila[2]);
            $eq_visit->obtenerEquipo();
            $this->id_eq_visit = $eq_visit;

            $fase = new Fase($fila[3]);
            $fase->obtenerFase();
            $this->id_fase = $fase;

            $fecha = new Fecha($fila[4]);
            $fecha->obtenerFecha();
            $this->id_fecha = $fecha;

            $this->goles_local = $fila[5];
            $this->goles_visit = $fila[6];

            $partidos[] = new Partido(
                $this->id_partido,
                $this->id_eq_local,
                $this->id_eq_visit,
                $this->id_fase,
                $this->id_fecha,
                $this->goles_local,
                $this->goles_visit
            );
        }

        $conexion->cerrar();
        return $partidos;
    }

    // --- Actualizar resultado y puntos (punto 7) ---
    public function actualizarResultado() {
        $partidoDAO = new PartidoDAO($this->id_partido, "", "", "", "", $this->goles_local, $this->goles_visit );

        // Actualizar los goles del partido
        $partidoDAO->actualizarResultado(); 

        if ($this->goles_local > $this->goles_visit) {
            // Gana el local
            $partidoDAO->actualizarPuntos($this->id_eq_local->getIdEquipo(), 3, $this->goles_local, $this->goles_visit);
            $partidoDAO->actualizarPuntos($this->id_eq_visit->getIdEquipo(), 0, $this->goles_visit, $this->goles_local);
        } elseif ($this->goles_local < $this->goles_visit) {
            // Gana el visitante
            $partidoDAO->actualizarPuntos($this->id_eq_local->getIdEquipo(), 0, $this->goles_local, $this->goles_visit);
            $partidoDAO->actualizarPuntos($this->id_eq_visit->getIdEquipo(), 3, $this->goles_visit, $this->goles_local);
        } else {
            // Empate
            $partidoDAO->actualizarPuntos($this->id_eq_local->getIdEquipo(), 1, $this->goles_local, $this->goles_visit);
            $partidoDAO->actualizarPuntos($this->id_eq_visit->getIdEquipo(), 1, $this->goles_visit, $this->goles_local);
        }
    }


    // --- Consultar partido por ID ---
    public function consultar()
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $partidoDAO=new PartidoDAO($this->id_partido);

        $sql = $partidoDAO->consultar();

        $conexion->ejecutar($sql);

        if ($conexion->filas() > 0) {
            $fila = $conexion->registro();

            $this->id_partido = $fila[0];

            $eq_local = new Equipo($fila[1]);
            $eq_local->obtenerEquipo();
            $this->id_eq_local = $eq_local;

            $eq_visit = new Equipo($fila[2]);
            $eq_visit->obtenerEquipo();
            $this->id_eq_visit = $eq_visit;

            $fase = new Fase($fila[3]);
            $fase->obtenerFase();
            $this->id_fase = $fase;

            $fecha = new Fecha($fila[4]);
            $fecha->obtenerFecha();
            $this->id_fecha = $fecha;

            $this->goles_local = $fila[5];
            $this->goles_visit = $fila[6];
        }

        $conexion->cerrar();
    }

    // --- Generar tabla de posiciones (punto 8) ---
    public function generarTablaPosiciones()
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "
            SELECT 
                e.id_equipo,
                e.nombre,
                e.puntos,
                e.goles_favor,
                e.goles_contra,
                (e.goles_favor - e.goles_contra) AS diferencia
            FROM g1_equipo e
            ORDER BY 
                e.puntos DESC,
                diferencia DESC,
                e.goles_favor DESC
        ";
        $conexion->ejecutar($sql);

        $tabla = [];
        while ($fila = $conexion->registro()) {
            $tabla[] = [
                'id_equipo' => $fila['id_equipo'],
                'nombre' => $fila['nombre'],
                'puntos' => $fila['puntos'],
                'goles_favor' => $fila['goles_favor'],
                'goles_contra' => $fila['goles_contra'],
                'diferencia' => $fila['diferencia']
            ];
        }

        $conexion->cerrar();
        return $tabla;
    }

}
?>
