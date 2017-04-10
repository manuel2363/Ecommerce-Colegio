<?php
session_start();
include('../../lib/conexion.php');
include('./lib/functions.php');
?>

<?php

if($_POST['id']){
	if($_FILES['portada2']['name'] !=""){
		$rutaServidor = 'images';
		$rutaTemporal = $_FILES['portada2']['tmp_name'];
		$nombreImagen = $_FILES['portada2']['name'];
		$rutaDestino = $rutaServidor.'/'.$nombreImagen;
		move_uploaded_file($rutaTemporal, $rutaDestino);

}else{
$rutaDestino = $_POST['portada'];



}

$id = $_POST['id'];
$nombreP = $_POST['nombreP'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$fecha = $_POST['fecha'];
$categoria = $_POST['categoria'];
$status = $_POST['status'];

$actualizar = new Producto();
$actualizar->actualizar($id, $rutaDestino, $nombreP, $descripcion, $precio, $stock, $fecha, $categoria, $status);

}
?>






