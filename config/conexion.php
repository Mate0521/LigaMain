<?php

class Conexion{
    private $conexion;
    private $resultado;
    
    public function abrir(){
        // $this -> conexion = new mysqli("localhost", "root", "", "liga_main");
        $this -> conexion = new mysqli(
           "localhost", 
           "itiud_aplint", 
           "GYesgQ118&", 
         "itiud_aplint");
            
    }
    
    public function cerrar(){
        $this -> conexion -> close();
    }
public function ejecutar($sentencia){
    $this->resultado = $this->conexion->query($sentencia);
    if (!$this->resultado) {
        // Mostrar el error exacto de MySQL
        echo "<b>Error SQL:</b> " . $this->conexion->error . "<br>";
        echo "<b>Consulta:</b> " . htmlspecialchars($sentencia) . "<br>";
    }
}

public function registro(){
    if ($this->resultado && $this->resultado !== true) {
        return $this->resultado->fetch_row();
    } else {
        return null; // Evita el fatal error si la consulta falló o no devuelve filas
    }
}

    
    public function filas(){
        return $this -> resultado -> num_rows;
    }
    
}


?>