<?php

include_once "../models/Producto.php";
include_once "../models/Usuario.php";
include_once "../models/AplicationErrors.php";
session_start();

// Si no existe session
// no se muestra el precion y los estampados
$response = '{';
$error = -1;
$filterByL = "";
$filterByM = "";
$oProduct = new Producto();
$oError = new AplicationErrors();

if (isset($_GET['filterByL']) && !empty($_GET['filterByL'])) {
    $filterByL = $_GET['filterByL'];
}

if (isset($_GET['filterByM']) && !empty($_GET['filterByM'])) {
    $filterByM = $_GET['filterByM'];
}

if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    try {
        $productos = $oProduct->getProducts($filterByL, $filterByM);
        if (!empty($productos)) {
            $response .= '"status": 200,
        "products" : [';
            foreach ($productos as $producto) {
                $response .= '{
                "id": "' . $producto->getIdProducto() . '",
                "nombre": "' . $producto->getNombre() . '",
                "descripcion": "' . $producto->getDescripcion() . '",
                "imagen": "' . $producto->getImagen() . '",
                "estilo": "' . $producto->getEstilo() . '",
                "material": "' . $producto->getMaterial() . '",
                "estampado": "' . $producto->getEstampado() . '",
                "color": "",
                "precio": ""
            },';
            }
            $response = substr($response, 0, strlen($response) - 1);
            $response .= ']}';
        } else {
            $error = AplicationErrors::PRODUCTO_NO_ENCONTRADO;
        }
    } catch (\Throwable $th) {
        error_log($e->getFile() . " " . $e->getLine() . " " . $e->getMessage(), 0);
        $error = AplicationErrors::ERROR_EN_BD;
    }
} else {
    try {
        $productos = $oProduct->getProducts($filterByL, $filterByM);
        if (!empty($productos)) {
            $response .= '"status": 200,
            "products" : [';
            foreach ($productos as $producto) {
                $response .= '{
                    "id": "' . $producto->getIdProducto() . '",
                    "nombre": "' . $producto->getNombre() . '",
                    "descripcion": "' . $producto->getDescripcion() . '",
                    "imagen": "' . $producto->getImagen() . '",
                    "estilo": "' . $producto->getEstilo() . '",
                    "material": "' . $producto->getMaterial() . '",
                    "color": ""
                },';
            }
            $response = substr($response, 0, strlen($response) - 1);
            $response .= ']}';
        } else {
            $error = AplicationErrors::PRODUCTO_NO_ENCONTRADO;
        }
    } catch (Exception $e) {
        error_log($e->getFile() . " " . $e->getLine() . " " . $e->getMessage(), 0);
        $error = AplicationErrors::ERROR_EN_BD;
    }
}
if ($error !== -1) {
    $oError->setError($error);
    $response = '{
        "status": 204,
        "message": "No content",
        "body": {
            "error": "' . $oError->getTextoError() . '"
        }
    }';
}
header('Content-Type: application/json');
echo $response;

// de lo contrario el json debera
