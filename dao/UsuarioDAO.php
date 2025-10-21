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
        return "insert into g1_usuario(nombre, correo, clave)
                values ('" . $this -> nombre . "', '". $this -> correo . "','" . md5($this -> clave) . "')";
    }
    public function autenticarUsuario()
    {   
        return "SELECT id_usuario
                FROM g1_usuario
                WHERE correo = '$this->correo' AND clave = '".md5($this->clave)."';";
    }
    public function obtenerUsuario()
    {
        return "SELECT `nombre`, `correo` 
                FROM `g1_usuario` 
                WHERE `id_usuario` = ". $this->id_usuario .";";
    }

    public function eliminarUsuario(){
        return "DELETE FROM `g1_usuario` 
                WHERE `id_usuario`=". $this -> id_usuario .";";
    }
    public function listarUsuarios(){
        return  "SELECT `id_usuario`, `nombre`, `correo` 
                FROM `g1_usuario`";
    }
}