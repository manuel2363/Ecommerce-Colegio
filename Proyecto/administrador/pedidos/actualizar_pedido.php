<?php
session_start();
include('../../lib/conexion.php');
include('./lib/functions.php');

if($_POST){

$id = $_POST['id'];
$fecha= $_POST['fecha'];
$nombre = $_POST['nombre'];
$nombreR = $_POST['nombreR'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$cp = $_POST['cp'];
$telefono = $_POST['telefono'];
$metodoenvio = $_POST['metodoenvio'];
$metodopago = $_POST['metodopago'];
$articulos = $_POST['articulos'];
$total = $_POST['total'];
$status = $_POST['status'];

$actualizar = new Pedido();
$actualizar->actualizar($id, $fecha, $nombre, $nombreR, $direccion, $ciudad, $estado, $cp, $telefono, $metodoenvio, $metodopago, $articulos, $total, $status);

}
?>

