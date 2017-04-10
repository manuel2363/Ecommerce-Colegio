<?php
class Pedido{
	var $id, $fecha, $nombre, $nombreR, $direccion, $ciudad, $estado, $cp, $telefono, $metodoenvio, $metodopago, $articulos, $total, $status;
	
		function actualizar($id, $fecha, $nombre, $nombreR, $direccion, $ciudad, $estado, $cp, $telefono, $metodoenvio, $metodopago, $articulos, $total, $status){
			$this->id =$id;
			$this->fecha =$fecha;
			$this->nombre =$nombre;
			$this->nombreR =$nombreR;
			$this->direccion =$direccion;
			$this->ciudad =$ciudad;
			$this->estado =$estado;
			$this->cp =$cp;
			$this->telefono =$telefono;
			$this->metodoenvio =$metodoenvio;
			$this->metodopago =$metodopago;
			$this->articulos =$articulos;
			$this->total =$total;
			$this->status =$status;
		
			$sql="UPDATE pedidos SET fecha = '$fecha', nombre = '$nombre', nombreR = '$nombreR', direccion = '$direccion', ciudad = '$ciudad', cp = '$cp', telefono = '$telefono', metodoenvio = '$metodoenvio', metodopago = '$metodopago', articulos = '$articulos', total = '$total', status = '$status' WHERE id = $id";            
				$result=mysql_query($sql, Conectar::Conexion());
				
				echo'<script type="text/javascript">
				alert("El status del pedido ha sido actualizado correctamente");
				window.location.href="mostrar_pedido.php";
				</script>';
		
		}
		
		function eliminar($id){
		$this-> id = $id;
		$sql = "DELETE FROM pedidos WHERE id=$id";
		$result = mysql_query($sql, Conectar::Conexion());
		echo'<script type="text/javascript">
		alert("El pedido se ha eliminado correctamente");
		window.location.href="mostrar_pedido.php";
		</script>';
	}
	
	
		}
?>