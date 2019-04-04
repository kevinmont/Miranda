<?php
include_once '../models/Linea.php';
include_once '../models/AplicationErrors.php';
$error = "";
$lineas = new Lineas();
$aLineas;
$response = "{";
try {
    $aLineas = $lineas->getAll();
} catch (Exception $e) {
    error_log($e->getFile() . " " . $e->getLine() . " " . $e->getMessage(), 0);
    $error = AplicationErrors::ERROR_EN_BD;
}

if ($error === "") {
    $response .= '"status": 200,
        "lineas": [';
    foreach ($aLineas as $linea) {
        $response .= '{
                "nombre": "' . $linea->getNombre() . '",
                "descripcion": "' . $linea->getDescripcion() . '"
            },';
    }
    $response = substr($response, 0, strlen($response) - 1);
    $response .= ']}';
} else {
    $response = '{
        "status": false,
        "error": {
            "code": "204"
            "message": "' . $error . '"
        }
    }';
}

echo $response;
