<?php
/*
login.php
Descripción: verifica el email y contrasenia contra repositorio a traves de clases
y  devuelve un objeto JSON con success(verdadero/falso), nombre(nombre de usuario o texto de error)
 */
include_once "../models/Admin.php";
include_once "../models/Cliente.php";
include_once "../models/AplicationErrors.php";
session_start();
$email = "";
$password = "";

$nombre = "";
$oError = new AplicationErrors();
$nError = -1;
//verifica que haya llegado los datos
if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $oClien = new Cliente();
    $oClien->setEmail($email); //ver de donde pasan esos parametros
    $oClien->setContraseña($password);
    try {
        if ($oClien->buscarEmailPasword()) {
            $_SESSION["user"] = $oClien;
            $_SESSION["type"] = Cliente::CLIEN;
            $nombre = $oClien->getNombre();
        } else {
            $oAdmin = new Admin();
            $oAdmin->setEmail($email);
            $oAdmin->setContraseña($password);
            if ($oAdmin->buscarEmailPasword()) {
                $_SESSION["user"] = $oAdmin;
                $_SESSION["type"] = Admin::ADMIN;
                $nombre = $oAdmin->getNombre();
            } else {
                $nError = AplicationErrors::USR_DESCONOCIDO;
            }
        }
    } catch (Exeption $e) {
        error_log($e->getFile() . " " . $e->getLine() . " " . $e->getMessage(), 0);
        $nError = AplicationErrors::ERROR_EN_BD;
    }
} else {
    $nError = AplicationErrors::FALTAN_DATOS;
}

//checar de aqui para abajo
if ($nError == -1) {
    $sCadJson = '{
            "success": true,
            "body": {
                "nombre": "' . $nombre . '",
                "tipoUsuario": "' . $_SESSION["type"] . '"
            }
		}';
} else {
    $oError->setError($nError);
    $sCadJson = '{
            "success": false,
            "error": {
                "tipoUsuario": "UNKNOWN",
                "message": "' . $oError->getTextoError() . '"
            }
        }';
}
header('Content-type: application/json');
echo $sCadJson;
