<?php
/*
Admin.php
Descripción: clase que encapsula el manejo de la entidad Administrador
 */
error_reporting(E_ALL);
include_once "AccesoDatos.php"; //incluye  archivo que contiene la conexion a la BD
include_once "Usuario.php"; // incluye archivo que contiene datos de usario

//Admin es un tipo de usuario(que incluyte herencia de usuario.php)
/**
 *
 */
class Admin extends Usuario
{
    private $imagen = "";
    //atributo propio, por que el email y la contrasenia los hereda de usuario.php
    const ADMIN = "ADMINISTRADOR"; //constante, ¿para que nos va servir?

    public function getImagen()
    {
        return $this->imagen;
    }
    public function setSalario($imagen)
    {
        $this->imagen = $imagen;
    }

    //Busca por Email, regresa un True si lo encontro
    public function buscar()
    {
        $oAccesoDatos = new AccesoDatos(); // es el metodo de conexión en AccesoDatos.php
        $sQuery = ""; //guardara las consultas que se le haran a la BD
        $arrRS = null; //arreglo de usuario
        $bRet = false;
        if ($this->email == "") {
            throw new Exception("Administrador->buscar(): faltan datos");
        } else {
            if ($oAccesoDatos->conectar()) {
                //puesto que admin es usuario pero tambien admin,
                //se tiene que buscar sus datos en dos tablas
                $sQuery = "SELECT t1.id_usuario, t1.nombre, t1.a_paterno, t1.a_materno,
				t1.email, t1.contrasenia, t2.imagen FROM usuarios t1, administradores t2
				WHERE t1.id_usuario=$this->idUsuario
				AND t1.id_usuario= t2.id_administrador;";

                $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
                $oAccesoDatos->desconectar();

                if (!empty($arrRS)) {
                    $this->idUsuario = $arrRS[0][0];
                    $this->nombre = $arrRS[0][1];
                    $this->aPaterno = $arrRS[0][2];
                    $this->aMaterno = $arrRS[0][3];
                    $this->email = $arrRS[0][4];
                    $this->contraseña = $arrRS[0][5];
                    $this->imagen = $arrRS[0][6];
                    $bRet = true;
                }
            }
        }
        return $bRet;
    }

    public function buscarEmailPasword()
    {
        $bRet = false;
        if (parent::buscarEmailPasword() && $this->buscar()) {
            $bRet = true;
        }
        return $bRet;
    }
}
