<?php
session_start();
include('../../lib/conexion.php');
include('lib/functions.php');

echo $_POST['id'];

if($_POST){ 

if($_POST['tipo'] =='Administrador'){
	
	echo '<script type="text/javascript">
	alert("No puedes eliminar al administrador");
	window.location.href="mostrar_usuarios.php";
	</script>';

}else{

$id = $_POST['id'];
$delete = new Usuario();
$delete->eliminar($id);

}
}
?>
