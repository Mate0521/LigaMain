<?php
class Partido
{
    //atributos
    private $id_partido;
    private $id_eq_local;
    private $id_eq_visit;
    private $id_fase;
    private $id_fecha;
    private $goles_local;
    private $goles_visit;

    //constructor
    public function __construct($id_partido=null, $id_eq_local=null, $id_eq_visit=null, $id_fase=null, $id_fecha=null, $goles_local=null, $goles_visit=null)
    {
        $this->id_partido = $id_partido;
        $this->id_eq_local = $id_eq_local;
        $this->id_eq_visit = $id_eq_visit;
        $this->id_fase = $id_fase;
        $this->id_fecha = $id_fecha;
        $this->goles_local = $goles_local;
        $this->goles_visit = $goles_visit;
    }

    //getters
    public function getIdPartido()
    {
        return $this->id_partido;
    }
    public function getIdEqLocal()
    {
        return $this->id_eq_local;
    }
    public function getIdEqVisit()
    {
        return $this->id_eq_visit;
    }
    public function getIdFase()
    {
        return $this->id_fase;
    }
    public function getIdFecha()
    {
        return $this->id_fecha;
    }
    public function getGolesLocal()
    {
        return $this->goles_local;
    }
    public function getGolesVisit()
    {
        return $this->goles_visit;
    }
    //setters
    public function setIdPartido($id_partido)
    {
        $this->id_partido = $id_partido;
    }
    public function setIdEqLocal($id_eq_local)
    {
        $this->id_eq_local = $id_eq_local;
    }
    public function setIdEqVisit($id_eq_visit)
    {
        $this->id_eq_visit = $id_eq_visit;
    }
    public function setIdFase($id_fase)
    {
        $this->id_fase = $id_fase;
    }
    public function setIdFecha($id_fecha)
    {
        $this->id_fecha = $id_fecha;
    }
    public function setGolesLocal($goles_local)
    {
        $this->goles_local = $goles_local;
    }
    public function setGolesVisit($goles_visit)
    {
        $this->goles_visit = $goles_visit;
    }

    //metodos para el crud del partido
    public function crearPartido()
    {
        //codigo para crear un partido en la base de datos
    }
    public function modificarPartido()
    {
        //codigo para modificar un partido en la base de datos
    }

    public function crearDistribucion($equipos, $tipo, $fechas){
        switch ($tipo){
            case 1:
                $this->distribucion($fechas,$this->todosContraTodos($equipos));
                break;
            case 2:
                $this->eliminatoria($equipos);
                break;
            case 3:
                $this->mixta($equipos);
                break;
            default:
                echo "Tipo de torneo no válido.";
                break;
        }
    }

    public function todosContraTodos($equipos){
        $n = count($equipos);

        // si el número de equipos es impar, agregamos un "equipo descanso"
        if ($n % 2 != 0) {
            $equipos[] = null; // null representa "DESCANSA"
            $n++;
        }

        $jornadas = $n - 1;
        $partidosPorJornada = $n / 2;
        $calendario = [];

        // Rotación tipo círculo (método clásico)
        for ($i = 0; $i < $jornadas; $i++) {
            $fecha = [];

            for ($j = 0; $j < $partidosPorJornada; $j++) {
                $local = $equipos[$j];
                $visit = $equipos[$n - 1 - $j];

                // Evitar agregar partidos con "descanso"
                if ($local !== null && $visit !== null) {
                    $fecha[] = [
                        'local' => $local,
                        'visit' => $visit
                    ];
                }
            }

            $calendario[] = $fecha;

            // rotar los equipos excepto el primero
            $ultimo = array_pop($equipos);
            array_splice($equipos, 1, 0, [$ultimo]);
        }

        return $calendario;

    }
    public function eliminatoria($equipos){

    }
    public function mixta($equipos){

    }

    public function distribucion($fechas, $calendario){
        $partidos = [];
        var_dump("apartir de aqui weon", $calendario, "y hasta aqui");
        $id_fase = 1; // fase del todos contra todos


        // Recorrer jornadas (cada jornada = una fecha)
        for ($i = 0; $i < count($calendario); $i++) {
            $jornada = $calendario[$i];
            $fechaObj = $fechas[$i];

            foreach ($jornada as $match) {
                $local = $match['local'];
                var_dump($local);
                $visit = $match['visit'];
                var_dump($visit);

                // Crear nuevo partido
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
        var_dump("pere hasta aqui",$partidos);
        return $this->insertarPartidos($partidos);


    }
    public function insertarPartidos($partidos){
        $conexion = new Conexion();
        $conexion -> abrir();
        try{
            foreach($partidos as $partido){
                $partidoDAO = new PartidoDAO( "", $partido->getIdEqLocal(), $partido->getIdEqVisit(), $partido->getIdFase(), $partido->getIdFecha() );
                $sql = $partidoDAO->crearPartido();
                $conexion -> ejecutar($sql);
            }
            $conexion -> cerrar();
            return true;

        }catch(Exception $e){
            return $e;
        }       
    }

    public function obtenerPartidos( $fechas){
        $conexion = new Conexion();
        $conexion -> abrir();
        $partidoDAO= new PartidoDAO();

        $id_fechas = [];
        foreach ($fechas as $fecha) {
            $id_fechas[] = $fecha->getIdFecha();
        }
        $id_fechas= implode(',', $id_fechas);

        $sql = $partidoDAO->listarPartidos($id_fechas);
        $partidos = [];
        $conexion -> ejecutar($sql);

        while($fila = $conexion -> registro()){
            $partidos[] = new Partido($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6]);
        }

        $conexion -> cerrar();
        return $partidos;

    }
}