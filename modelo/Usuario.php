<?php

class Usuario
{
    //atributos
    private $id_usuario;
    private $nombre;
    private $correo;
    private $clave; //recordar hashear antes de enviar ala base de datos 

    //constructor
    public function __construct($id_usuario=null, $nombre=null, $correo=null, $clave=null)
    {
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->clave = $clave;
    }

    //geters
    public function getIdUsuario()
    {
        return $this->id_usuario;
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
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
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

    //metodsos para el crud del usuario
    
    public function crearUsuario()
    {
        $conexion = new Conexion();
        $conexion -> abrir();
        $clienteDAO = new UsuarioDAO("", $this -> nombre, $this -> correo, $this -> clave);        
        try{
            $conexion -> ejecutar($clienteDAO ->crearUsuario());
            $conexion -> cerrar();
            return true;
        }catch(Exception $e){
            return $e;
        }
    }
    public function autenticarUsuario()
    {
        $conexion = new Conexion();
        $adminDAO = new UsuarioDAO("", "", $this->correo, $this->clave);
        $sql =$adminDAO->autenticarUsuario();
        $conexion->abrir();
        $conexion->ejecutar($sql);
        if($fila = $conexion->registro()){
            $this->id_usuario = $fila[0];
            $conexion->cerrar();
            return true;
        }
        return false;
    }
    public function obtenerUsuario()
    {
        $conexion = new Conexion();
        $usuarioDAO = new UsuarioDAO($this->id_usuario);
        $sql = $usuarioDAO->obtenerUsuario();
        $conexion->abrir();
        $conexion->ejecutar($sql);
        if($fila = $conexion->registro()){
            $this->nombre = $fila[0];
            $this->correo = $fila[1];
            $conexion->cerrar();
            return true;
        }
        return false;
    }

}