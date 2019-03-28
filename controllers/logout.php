<?php
/*
	logout.php
	Descripción: termina la sesión
*/
include_once("../modelo/AplicationErrors.php");
include_once("../modelo/Admin.php");
include_once("../modelo/Cliente.php");
session_start();
$sCadJson = "";
	if (isset($_SESSION["user"])){
		unset ($_SESSION["user"]);
		unset ($_SESSION["type"]);
		session_destroy();
	}
	header("Location: ../Index.php");
	exit();
?>