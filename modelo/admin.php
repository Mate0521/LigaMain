<?php

class Admin
{
    //atributos
    private $id_admin;
    private $nombre;
    private $correo;
    private $clave; //recordar hashear antes de enviar ala base de datos 

    //constructor
    public function __construct($id_admin=null, $nombre=null, $correo=null, $clave=null)
    {
        $this->id_admin = $id_admin;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->clave = $clave;
    }

    //geters
    public function getIdAdmin()
    {
        return $this->id_admin;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function getClave()
    {
        return $this->clave;
    }
    //seters
    public function setIdAdmin($id_admin)
    {
        $this->id_admin = $id_admin;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    //metodos de crud de admin
    
    public function crearAdmin()
    {
        //codigo para crear un admin en la base de datos
    }
    public function autenticarAdmin()
    {
        $conexion = new Conexion();
        $adminDAO = new AdminDAO("", "", $this->correo, $this->clave);
        $sql =$adminDAO->autenticarAdmin();
        $conexion->abrir();
        $conexion->ejecutar($sql);
        if($fila = $conexion->registro()){
            $this->id_admin = $fila["id_admin"];
            $conexion->cerrar();
            return true;
        }
        return false;
    }

}