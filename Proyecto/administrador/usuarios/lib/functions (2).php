<?php
	Class Usuario{
	var $id, $avatar, $avatar2, $name, $e_mail, $contraseña, $tipo;
	
	function registrar($name, $e_mail, $cifrado, $tipo){
	
	$this-> name = $nombre;
	$this-> e_mail = $e_mail;
	$this-> cifrado = $cifrado;
	$this-> tipo = $tipo;
	
	$sql="SELECT * FROM usuarios WHERE email='".$email."'";
	
	$result = mysql_query($sql, Conectar::Conexion());
	
	$contar = mysql_num_rows($result);
	
	if($contar==0){
		
		if ($_FILES['avatar']['type']=='image/jpg' || $_FILES['avatar']['type']=='image/jpeg' || $_FILES['avatar']['type']=='image/png'){

		$rutaServidor = 'imagenes';
		$rutaTemporal = $_FILES['avatar']['tmp_name'];
		$nombreImagen = $_FILES['avatar']['name'];
		$rutaDestino = $rutaServidor.'/'.$nombreImagen;
		
		move_uploaded_file($rutaTemporal,$rutaDestino);
		
		$sql="INSERT INTO usuarios (imagen, nombre, email, password, privilegios) VALUES('".$rutaDestino."', '".$name."', '".$e_mail."', '".$cifrado."', '".$tipo."')";

		$result = mysql_query($sql, Conectar::Conexion());
		
		echo '<script type="text/javascript">
			alert("Su registro ha sido con exito");
			window.location.href="mostrar_usuarios.php";
			</script>';
	}else{
		echo '<script type="text/javascript">
			alert("Su imagen no es compatible, vuelva a intentarlo");
			window.location.href="agregar_usuario.php;
			</script>';
	}
	
	}else{
		echo '<script type="text/javascript">
				alert("Su email ya ha sido registrado");
				windows.location.href="agregar_usuario.php";
				</script>';
	}

}


	function actualizar($id, $rutaDestino, $name, $e_mail, $contraseña, $tipo){
		$this-> id = $id;
		$this-> avatar = $rutaDestino;
		$this-> name = $name;
		$this-> e_mail = $e_mail;
		$this-> contraseña = $contraseña;
		$this-> tipo = $tipo;
		$sql = "UPDATE usuarios SET imagen = '$rutaDestino', nombre = '$name', email = '$e_mail', privilegios = '$tipo' WHERE id = $id";
		mysql_query($sql, Conectar::Conexion());
		echo'<script type="text/javascript">
		alert("El usuario se ha actualizado correctamente");
		window.location.href="mostrar_usuarios.php";
		</script>
		';
		
	}

	function eliminar($id){
		$this-> id = $id;
		$sql = "DELETE FROM usuarios WHERE id=$id";
		$result = mysql_query($sql, Conectar::Conexion());
		echo'<script type="text/javascript">
		alert("El usuario se ha eliminado correctamente");
		window.location.href="mostrar_usuarios.php";
		</script>';
	}
		
		



}

?>