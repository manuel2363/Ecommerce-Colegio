<?php 

class Usuario{

	var $id, $nombre, $email, $encryptar, $privilegios;
	
	function registrar($nombre, $email, $encryptar){
	
	$this-> nombre = $nombre;
	$this-> email = $email;
	$this-> encryptar = $encryptar;
	
	$sql="SELECT * FROM usuarios WHERE email='".$email."'";
	$result = mysql_query($sql, Conectar::conexion());
	$contar = mysql_num_rows($result);
	
	if($contar==0){
	

if ($_FILES['imagen']['type']=='image/jpg' || $_FILES['imagen']['type']=='image/jpeg' || $_FILES['imagen']['type']=='image/png'){


		$rutaServidor = 'imagenes'; 
		$rutaTemporal = $_FILES['imagen']['tmp_name'];
		$nombreImagen = $_FILES['imagen']['name']; 
		$rutaAdmin = './administrador/usuarios/';  //
		$rutaDestino = $rutaServidor.'/'.$nombreImagen; 
		
		move_uploaded_file($rutaTemporal,$rutaAdmin.'/'.$rutaDestino);  //
										
	
		
		$sql="INSERT INTO usuarios (nombre, email, password, imagen) VALUES('".$nombre."', '".$email."', '".$encryptar."', '".$rutaDestino."')";

		$result = mysql_query($sql, Conectar::Conexion());
		
		echo '<script type="text/javascript">
			alert("Su registro ha sido con exito");
			window.location.href="index.php";
			</script>';
	}else{
		echo '<script type="text/javascript">
			alert("Su imagen no es compatible, vuelva a intentarlo");
			window.location.href="frm_registro.php;
			</script>';
	}
	
	}else{
		echo '<script type="text/javascript">
				alert("Su email ya ha sido registrado");
				windows.location.href="frm_registro.php";
				</script>';
				
	
	
	
	}

}
}




class Comentario{
	var $id, $nombre, $email, $asunto, $comentario, $fecha;
	
		function Comentar($nombre, $email, $asunto, $comentario, $fecha){
			$this->nombre =$nombre;
			$this->email =$email;
			$this->asunto =$asunto;
			$this->comentario =$comentario;
			$this->fecha =$fecha;
			
			$sql="INSERT into comentarios(nombre, email, asunto, comentario, fecha) VALUES ('".$nombre."','".$email."','".$asunto."','".$comentario."', '".$fecha."')";
				$result=mysql_query($sql, Conectar::Conexion());
				
				echo'<script type="text/javascript">
				alert("Su comentario será validado en breve");
				window.location.href="contacto.php";
				</script>';
		
		}

}

class Producto{
	var $id, $cantidad;
	function actualizarStock($id, $cantidad){
		$this->id = $id;
		$this->cantidad = $cantidad;
		
		$sql="SELECT * FROM productos WHERE id= $id";
		$result= mysql_query($sql, Conectar::Conexion());
		$row = mysql_fetch_array($result);
		$stock = $row[5];
		$stockActualizado = $stock-$cantidad;
		if(isset($id)){
			$sql = "UPDATE productos SET stock= '$stockActualizado' WHERE id=$id";
			$result = mysql_query($sql, Conectar::Conexion());
		}
	}
}

class Pedido{
		var $fecha,$usuario,$nombreR,$direccion,$ciudad,$estado,$cp,$telefono,$paqueteria,$pago,$comprado,$total;
		
		function ingresarPedido($fecha,$usuario,$nombreR,$direccion,$ciudad,$estado,$cp,$telefono,$paqueteria,$pago,$comprado,$total){
			$this->fecha = $fecha;
			$this->usuario = $usuario;
			$this->nombreR = $nombreR;
			$this->direccion = $direccion;
			$this->ciudad = $ciudad;
			$this->estado = $estado;
			$this->cp = $cp;
			$this->telefono = $telefono;
			$this->paqueteria = $paqueteria;
			$this->pago = $pago;
			$this->comprado = $comprado;
			$this->total = $total;
			
			$sql = "INSERT INTO pedidos (fecha, nombre, nombreR, direccion, ciudad, estado, cp, telefono, metodoenvio, metodopago, articulos, total) VALUES ('".$fecha."', '".$usuario."', '".$nombreR."', '".$direccion."', '".$ciudad."', '".$estado."', '".$cp."', '".$telefono."', '".$paqueteria."', '".$pago."', '".$comprado."', '".$total."')";
			$result=mysql_query($sql, Conectar::conexion());
			echo '<script type="text/javascript">
				alert("El Pedido ha sido realizado correctamente, en breve te enviaremos un correo para que nos confirmes el pago.");	
				window.location.href="../index.php";
				</script>';
			unset ($_SESSION['carrito']);
		}
		
	}

	

?>














