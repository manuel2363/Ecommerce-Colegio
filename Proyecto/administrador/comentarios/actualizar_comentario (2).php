<?php
session_start();
include('../../lib/conexion.php');
include('./lib/functions.php');

if($_POST){

$id = $_POST['id'];
$name= $_POST['name'];
$asunto = $_POST['asunto'];
$comentario = $_POST['comentario'];
$fecha = $_POST['fecha'];
$status = $_POST['status'];


$actualizar = new Comentario();
$actualizar->actualizar($id, $name, $email, $asunto, $comentario, $fecha, $status);

}
?>

