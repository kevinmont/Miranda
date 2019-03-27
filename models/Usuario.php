<?php

error_reporting(E_ALL);
include_once "AccesoDatos.php";
abstract class Usuario
{

    protected $idUsuario = -1;
    protected $nombre = "";
    protected $aPaterno = "";
    protected $aMaterno = "";
    protected $email = "";
    protected $contraseña = "";

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setAPaterno($aPaterno)
    {
        $this->aPaterno = $aPaterno;
    }

    public function getAPaterno()
    {
        return $this->aPaterno;
    }

    public function setAMaterno($aMaterno)
    {
        $this->aMaterno = $aMaterno;
    }

    public function getAMaterno()
    {
        return $this->aMaterno;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;
    }

    public function getContraseña()
    {
        return $this->contraseña;
    }

    public function getNombreCompleto()
    {
        return $this->nombre . " " . $this->aPaterno . " " . $this->aMaterno;
    }

    protected function buscarEmailPasword()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $aResultSet = null;
        $bUserExist = false;
        if ($this->email == "" || $this->contraseña == "") {
            throw new Exception("Usuario->buscarPorEmailContraseña(): faltan datos");
        } else {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "SELECT id_usuario, nombre, a_paterno, a_materno
					FROM usuarios
					WHERE email ='" . $this->email . "'
					AND contrasenia = '" . $this->contraseña . "'";
                $aResultSet = $oAccesoDatos->ejecutarConsulta($sQuery);
                $oAccesoDatos->desconectar();
                if ($aResultSet) {
                    $this->idUsuario = $aResultSet[0][0];
                    $this->nombre = $aResultSet[0][1];
                    $this->aPaterno = $aResultSet[0][2];
                    $this->aMaterno = $aResultSet[0][3];
                    $bUserExist = true;
                }
            }
        }
        return $bUserExist;
    }

    /*Devuelve la cadena de inserción (para reutilización en herencia)*/
    protected function getInsertar()
    {
        $sQuery = "";
        if ($this->email == "" || $this->contraseña == "" || $this->nombre == "") {
            throw new Exception("Usuario->getInsertar(): faltan datos");
        } else {
            $sQuery = "INSERT INTO usuarios (nombre, a_paterno, a_materno, email, contrasenia)
				VALUES (" . $this->nombre . ", '" . $this->aPaterno . "',
				'" . $this->aMaterno . "', '" . $this->email . "',
				'" . $this->contraseña . "');";
        }
        return $sQuery;
    }

    /*Devuelve la cadena de modificación (para reutilización en herencia)*/
    protected function getModificar()
    {
        $sQuery = "";
        if ($this->idUsuario == -1 || $this->sContrasenia == "" || $this->sNombre == "") {
            throw new Exception("Usuario->getModificar(): faltan datos");
        } else {
            $sQuery = "UPDATE usuario
				SET contrasenia= '" . $this->contrasenia . "',
				nombre= '" . $this->nombre . "' ,
				a_paterno= '" . $this->aPaterno . "' ,
				a_materno= '" . $this->aMaterno . "')
                WHERE id_usuario = " . $this->idUsuario . ";";
        }
        return $sQuery;
    }

    /*Devuelve la cadena de eliminación (para reutilización en herencia)*/
    protected function getBorrar()
    {
        $sQuery = "";
        if ($this->idUsuario == -1) {
            throw new Exception("Usuario->getBorrar(): faltan datos");
        } else {
            $sQuery = "DELETE FROM usuario WHERE nCveUsu = " . $this->idUsuario . "; ";
        }
        return $sQuery;
    }
}
