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
    public function autenticarAdmin()
    {
        return [
            "sql" => "SELECT `id_admin` 
                      FROM `g1_admin` 
                      WHERE correo = :correo and clave = :clave ;",
            "parametros" => [
                ":correo" => $this->correo,
                ":clave" => md5($this->clave)
            ]

            ];
    }
    public function obtenerAdmin()
    {
        return [
            "sql" => "SELECT `nombre`, `correo` 
                      FROM `g1_admin` 
                      WHERE `id_admin` = :id_admin ;",
            "parametros" => [
                ":id_admin" => $this->id_admin
            ]
            ];

    }

}   