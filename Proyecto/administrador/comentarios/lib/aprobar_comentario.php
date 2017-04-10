<?php
session_start();
include('../../../lib/conexion.php');
include('functions.php');

	if($_POST){
	$id=$_POST['id'];
	$aprobar = new Comentario();
	$aprobar -> aprobar($id);
	}
	
	
	if(!isset($_SESSION['nombre'])){
	
	echo'<script type="text/javascript">
	window.location.href="../../../frm_login.php";
	</script>';
	
	}else{
	
		if($_SESSION['privilegios']=='Administrador'){
		
		}else{
		
			echo'<script type="text/javascript">
			alert("no cuenta con suficientes permisos para estar aquí");
			window.location.href="../../../index.php";
			</script>';
		}
	}
	
	
?>