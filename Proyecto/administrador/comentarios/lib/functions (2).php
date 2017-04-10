<?php
class Comentario{
	var $id, $nombre, $email, $asunto, $comentario, $fecha, $status;
	
		function Comentar($nombre, $email, $asunto, $comentario, $fecha, $status){
			$this->nombre =$nombre;
			$this->email =$email;
			$this->asunto =$asunto;
			$this->comentario =$comentario;
			$this->fecha =$fecha;
			$this->status =$status;
			
			$sql="INSERT into comentarios(nombre, email, asunto, comentario, fecha, status) VALUES ('".$nombre."','".$email."','".$asunto."','".$comentario."', '".$fecha."', '".$status."')";
				$result=mysql_query($sql, Conectar::Conexion());
				
				echo'<script type="text/javascript">
				alert("Su comentario será validado en breve");
				window.location.href="mostrar_comentario.php";
				</script>';
		
		}

		
		
		function desaprobar($id){
			$this->id = $id;
			$sql = "UPDATE comentarios SET status = 'despublicado' WHERE id='$id'";
				$result = mysql_query($sql, Conectar::Conexion());
				
				echo '<script type="text/javascript">
				window.location.href="../mostrar_comentario.php"
				</script>';
		}
		
		function aprobar($id){
			$this->id = $id;
			$sql = "UPDATE comentarios SET status = 'publicado' WHERE id='$id'";
				$result = mysql_query($sql, Conectar::Conexion());
				
				echo '<script type="text/javascript">
				window.location.href="../mostrar_comentario.php"
				</script>';
		}
		
		
		
		function actualizar($id, $name, $email, $asunto, $comentario, $fecha, $status){
		$this-> id = $id;
		$this-> name = $name;
		$this-> email = $email;
		$this-> asunto = $asunto;
		$this-> fecha = $fecha;
		$this-> comentario = $comentario;
		$this-> status = $status;
		$sql = "UPDATE comentarios SET nombre = '$name', email = '$email', asunto = '$asunto', comentario = '$comentario', fecha = '$fecha', status = '$status' WHERE id = $id";
		mysql_query($sql, Conectar::Conexion());
		echo'<script type="text/javascript">
		alert("El comentario se ha actualizado correctamente");
		window.location.href="mostrar_comentario.php";
		</script>';
		
	}

	function eliminar($id){
		$this-> id = $id;
		$sql = "DELETE FROM comentarios WHERE id=$id";
		$result = mysql_query($sql, Conectar::Conexion());
		echo'<script type="text/javascript">
		alert("El comentario se ha eliminado correctamente");
		window.location.href="mostrar_comentario.php";
		</script>';
	}
		
		
		
		
		}

?>