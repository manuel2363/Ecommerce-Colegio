<?php
session_start();
include('../../lib/conexion.php');
include('./lib/functions.php');


if($_POST){
	if($_FILES['avatar2']['name'] !=""){
		$rutaServidor = 'imagenes';
		$rutaTemporal = $_FILES['avatar2']['tmp_name'];
		$nombreImagen = $_FILES['avatar2']['name'];
		$rutaDestino = $rutaServidor.'/'.$nombreImagen;
		move_uploaded_file($rutaTemporal, $rutaDestino);

}else{
$rutaDestino = $_POST['avatar'];

}

$id = $_POST['id'];
$name = $_POST['name'];
$e_mail = $_POST['e_mail'];
$contraseña = $_POST['contraseña'];
$tipo = $_POST['tipo'];

$actualizar = new Usuario();
$actualizar->actualizar($id, $rutaDestino, $name, $e_mail, $contraseña, $tipo);

}
?>






