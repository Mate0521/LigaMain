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
        //codigo para crear un usuario en la base de datos
    }
    public function autenticarUsuario()
    {
        //codigo para obtener un usuario de la base de datos
    }

}