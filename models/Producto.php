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
    public function getProducts($filterByL = "", $filterByM = "")
    {
        $qLinea = "SELECT id_linea FROM lineas";
        if ($filterByL !== "") {
            $filterByL = explode(',', $filterByL);
            if (!empty($filterByL)) {
                $qLinea .= " WHERE";
                foreach ($filterByL as $opt) {
                    $qLinea .= " nombre='$opt' OR";
                }
                $qLinea = substr($qLinea, 0, strlen($qLinea) - 3);
            }
        }

        $qMaterial = "SELECT * FROM productos";
        if ($filterByM !== "") {
            $filterByM = explode(',', $filterByM);
            if (!empty($filterByM)) {
                $qMaterial .= " WHERE";
                foreach ($filterByM as $opt) {
                    $qMaterial .= " material='$opt' OR";
                }
                $qMaterial = substr($qMaterial, 0, strlen($qMaterial) - 3);
            }
        }

        //     select
        //     id_producto, nombre, descripcion, imagen, estilo, material, estampado
        //     from
        //     (select id_linea from lineas where nombre= 'Edredones y Colchas') lin
        //     join categoria_lineas using (id_linea)
        //     join (select * from productos where material= 'ALGODON') pro
        //     using (id_producto);

        $aResultSet = null;
        $oRepository = new AccesoDatos();
        $aProductos = array();
        if ($oRepository->conectar()) {
            $sQuery = "SELECT id_producto, nombre, descripcion, imagen, estilo, material, estampado FROM";

            if (!empty($filterByL)) {
                $sQuery .= " ( $qLinea ) lin JOIN categoria_lineas USING (id_linea) JOIN";
            }

            $sQuery .= " ($qMaterial) pro";

            if (!empty($filterByL)) {
                $sQuery .= " USING (id_producto)";
            }

            $aResultSet = $oRepository->ejecutarConsulta($sQuery);
            if (!empty($aResultSet)) {
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
            }
        } else {
            throw new Exception("Productos->getProducts(): No se acceder al repositorio de dato");
        }
        return $aProductos;
    }

}
