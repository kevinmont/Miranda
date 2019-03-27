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
		session_destroy();
	}
	header("Location: ../Index.php");
	exit();
?>