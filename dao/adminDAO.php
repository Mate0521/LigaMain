<?php

class AdminDAO
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

    //metodos 
    public function crearAdmin()
    {
        //codigo para crear un admin en la base de datos
    }
    public function autenticarAdmin()
    {
        return "SELECT id_admin
                FROM g1_admin
                WHERE correo = '$this->correo' AND clave = ".md5($this->clave);
    }

}   