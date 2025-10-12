<?php

class UsuarioDAO
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

    //metodos 
    public function crearAdmin()
    {
        //codigo para crear un admin en la base de datos
    }
    public function autenticarUsuario()
    {
        return "SELECT id_usuario
                FROM g1_usuario
                WHERE correo = '$this->correo' AND clave = ".md5($this->clave);
    }

}