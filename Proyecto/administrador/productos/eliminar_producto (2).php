<?php 
session_start();
include('../../lib/conexion.php');
include('lib/functions.php');

echo $_POST['id'];

if($_POST){
	$id = $_POST['id'];
	$delete = new Producto();
	$delete->eliminar($id);
}
?>