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
    public function autenticarAdmin()
    {
        //codigo para obtener un admin de la base de datos
    }

}