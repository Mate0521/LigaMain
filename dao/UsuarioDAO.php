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
    public function crearUsuario()
    {
        return [
            "sql"=>"insert into g1_usuario(nombre, correo, clave)
                values (':nombre', ':correo', ':clave')",
            "parametros"=>[
                ":nombre"=>$this->nombre,
                ":correo"=>$this->correo,
                ":clave"=>md5($this->clave)
            ]
            ];
    }
    public function autenticarUsuario()
    {   
        return [
            "sql"=>"SELECT id_usuario
                FROM g1_usuario
                WHERE correo = '$this->correo' AND clave = '".md5($this->clave)."';",
            "parametros"=>[
                ":correo"=>$this->correo,
                ":clave"=>md5($this->clave)
            ]
            ];
    }
    public function obtenerUsuario()
    {
        return [
            "sql"=>"SELECT `nombre`, `correo` 
                FROM `g1_usuario` 
                WHERE `id_usuario` = :id_usuaio ;",
            "parametros"=>[
                ":id_usuaio"=>$this->id_usuario
            ]
            ];
    }

    public function eliminarUsuario(){
        return [
            "sql"=>"DELETE FROM `g1_usuario` 
                WHERE `id_usuario`= :id_usuario ;",
            "parametros"=>[
                ":id_usuario"=>$this->id_usuario
            ]
            ];
    }
    public function listarUsuarios(){
        return [
            "sql"=>"SELECT `id_usuario`, `nombre`, `correo` 
                FROM `g1_usuario`",
            "parametros"=>[]
        ];
    }
}