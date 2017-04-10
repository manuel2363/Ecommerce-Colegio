<?php
session_start();
include('../../lib/conexion.php');
include('../../lib/sesion.php');

if($_POST){
$estado = $_POST['estado'];
$_SESSION['estado']=$estado;
	echo'
	<script type="text/javascript">
		alert("El estado del sitio ha sido actualizado correctamente");
		window.location.href="../index.php"
	</script>';
}
?>