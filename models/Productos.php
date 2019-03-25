<?php

error_reporting(E_ALL);
include_once "AccesoDatos.php";
class Producto
{
    private $idProducto = -1;
    private $nombre = "";
    private $descripcion = "";
    private $imagen = "";
    private $estilo = "";
    private $material = "";
    private $estampado = "";

    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
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

    public function setImagen($image)
    {
        $this->imagen = $image;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setMaterial($material)
    {
        $this->material = $material;
    }

    public function getMaterial()
    {
        return $this->material;
    }

    public function setEstilo($estilo)
    {
        $this->estilo = $estilo;
    }

    public function getEstilo()
    {
        return $this->estilo;
    }

    public function setEstampado($estampado)
    {
        $this->estampado = $estampado;
    }

    public function getEstampado()
    {
        return $this->estampado;
    }

    // limit must be less than 20.
    public function getProducts($limit = 20, $orderBy = null)
    {
        $aResultSet = null;
        $oRepository = new AccesoDatos();
        $aProductos = array();
        if ($oRepository->conectar()) {
            $sQuery = "SELECT * FROM productos ";

            if (!is_null($orderBy)) {
                $sQuery .= " ORDER BY ". $orderBy;
            }
            // $sQuery .= " LIMIT " . $limit > 20 ? 20 : $limit . "";
            $aResultSet = $oRepository->ejecutarConsulta($sQuery);
            foreach ($aResultSet as $row) {
                $oProducto = new Producto();
                $oProducto->setIdProducto($row[0]);
                $oProducto->setNombre($row[1]);
                $oProducto->setDescripcion($row[2]);
                $oProducto->setImagen($row[3]);
                $oProducto->setEstilo($row[4]);
                $oProducto->setMaterial($row[5]);
                $oProducto->setEstampado($row[6]);
                array_push($aProductos, $oProducto);
            }
        } else {
            throw new Exception("Productos->getProducts(): No se acceder al repositorio de dato");
        }
        return $aProductos;
    }

}
