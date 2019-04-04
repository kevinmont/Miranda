<?php

include_once "../models/Producto.php";
include_once "../models/Usuario.php";
session_start();

// Si no existe session
// no se muestra el precion y los estampados
$response = '{';
$error = -1;
$oProduct = new Producto();
// if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
$productos = $oProduct->getProducts();

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
                "color": ""
            },';
    }
    $response = substr($response, 0, strlen($response) - 1);
    $response .= ']}';
} else {
    $error = "No existen productos";
}
// podemos buscar todos los productos que no
// } else {
//     $error = 1; // Ha ocurrido un error;
//     // no podemos visualizar los datos de precio y material
// }
if ($error !== -1) {
    $response = '{
        "status": "204",
        "message": "No content",
        "body": {
            "error": "' . $error . '"
        }
    }';
}
header('Content-Type: application/json');
echo $response;

// de lo contrario el json debera
