<?php
/*
Cliente.php
Descripción: clase que encapsula el manejo de la entidad clientes
 */
error_reporting(E_ALL);
include_once "AccesoDatos.php"; //incluye  archivo que contiene la conexion a la BD
include_once "Usuario.php"; // incluye archivo que contiene datos de usario
//include_once("direccion.php")

//Cliente es un tipo de usuario(que incluyte herencia de usuario.php)
/**
 *
 */
class Cliente extends Usuario
{
    //define los aributos propios{
    private $numCelular;
    private $telCasa;
    private $calleNum;
    private $estado;
    private $municipio;
    private $cp;

    /*constante para facilitar el manejo de sesiones*/
    const CLIEN = "CLIENTE";
    public function setNumCelular($numCelular)
    {
        $this->numCelular = $numCelular;
    }
    public function getNumCelular()
    {
        return $this->numCelular;
    }

    public function setTelCasa($telCasa)
    {
        $this->telCasa = $telCasa;
    }
    public function getTelCasa()
    {
        return $this->telCasa;
    }

    //Otros set y get que pertenesen a dirección
    public function setCalleNum($calleNum)
    {
        $this->calleNum = $calleNum;
    }
    public function getCalleNum()
    {
        return $this->calleNum;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    }
    public function getMunicipio()
    {
        return $this->municipio;
    }

    public function setCp($cp)
    {
        $this->cp = $cp;
    }
    public function getCp()
    {
        return $this->cp;
    }

/*Busca por email, regresa True si lo encontro*/
    public function buscar()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = null;
        $bRet = false;
        if ($this->email == "") {
            throw new Exception("Cliente->buscar(): faltan datos");
        } else {
            if ($oAccesoDatos->conectar()) {
                // como el consultor es usuario y cliente al mismo tiempo.
                // Debe consultarse en dos tablas
                $sQuery = "SELECT t2.num_celular, t2.tel_casa, t3.calle_num,
                t3.estado, t3.municipio, t3.cp FROM usuarios as t1, clientes as t2, direcciones as t3
                 WHERE t1.id_usuario=" . $this->idUsuario . " 
                 AND t1.id_usuario=t2.id_cliente AND t2.id_cliente=t3.id_cliente;";
                $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
                $oAccesoDatos->desconectar();
                if (!empty($arrRS)) {
                    $this->numCelular = $arrRS[0][0];
                    $this->telCasa = $arrRS[0][1];
                    $this->calleNum = $arrRS[0][2];
                    $this->estado = $arrRS[0][3];
                    $this->municipio = $arrRS[0][4];
                    $this->cp = $arrRS[0][5];
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
