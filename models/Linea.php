<?php

include_once 'AccesoDatos.php';

class Lineas
{

    private $id = "";
    private $nombre = "";
    private $descripcion;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getAll()
    {
        $aResultSet = null;
        $oRepository = new AccesoDatos();
        $aLineas = array();
        if ($oRepository->conectar()) {
            $sQuery = "SELECT id_linea, nombre, descripcion FROM lineas;";
            $aResultSet = $oRepository->ejecutarConsulta($sQuery);
            foreach ($aResultSet as $row) {
                $oLinea = new Lineas();
                $oLinea->setId($row[0]);
                $oLinea->setNombre($row[1]);
                $oLinea->setDescripcion($row[2]);
                array_push($aLineas, $oLinea);
            }
        } else {
            throw new Exception("Productos->getProducts(): No se pudo acceder al repositorio de dato");
        }
        return $aLineas;
    }
}
