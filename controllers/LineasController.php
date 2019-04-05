<?php
include_once '../models/Linea.php';
include_once '../models/AplicationErrors.php';
$error = -1;
$lineas = new Lineas();
$oError = new AplicationErrors();
$aLineas;
$response = "{";
try {
    $aLineas = $lineas->getAll();
    if (!empty($aLineas)) {
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
        $error = AplicationErrors::NO_EXISTE_BUSCADO;
    }
} catch (Exception $e) {
    error_log($e->getFile() . " " . $e->getLine() . " " . $e->getMessage(), 0);
    $error = AplicationErrors::ERROR_EN_BD;
}

if ($error !== -1) {
    $oError->setError($error);
    $response = '{
        "status": false,
        "error": {
            "code": "204"
            "message": "' . $oError->getTextoError() . '"
        }
    }';
} 

header('Content-Type: application/json');
echo $response;
