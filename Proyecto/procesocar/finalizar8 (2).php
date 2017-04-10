<?php
session_start();
include('../lib/conexion.php');
include('../lib/functions.php');
?>

<article>
	<?php
	$shopCart = $_SESSION['carrito'];
	if(isset($shopCart)){
		for($i=0; $i<count($shopCart); $i++){
			$compra = $shopCart[$i]['nombre']."[".$shopCart[$i]['precio']."] = ".$shopCart[$i]['cantidad'].".";
			$comprado =$compra;
		}
		for($i=0; $i<count($shopCart); $i++){
			if($shopCart[$i]!=NULL){
				$id = $shopCart[$i]['id'];
				$cantidad = $shopCart[$i]['cantidad'];
				$stockActualizado = new Producto();
				$stockActualizado->actualizarStock($id, $cantidad);
			}
		}
		

		
		$fecha = date("d/m/Y H:i:s");
		$usuario = $_SESSION['name'];
		$nombreR = $_SESSION['nombreR'];
		$direccion = $_SESSION['direccion'];
		$ciudad = $_SESSION['ciudad'];
		$estado = $_SESSION['estado'];
		$cp = $_SESSION['cp'];
		$telefono = $_SESSION['telefono'];
		$paqueteria = $_SESSION['paqueteria'];
		$pago = $_SESSION['pago'];
		$comprado;
		
		$total = $_POST['total'];
		$total = $_SESSION['total'];
		
		$addPedido = new Pedido();
		$addPedido->ingresarPedido($fecha,$usuario,$nombreR,$direccion,$ciudad,$estado,$cp,$telefono,$paqueteria,$pago,$comprado,$total);
	}
	
	?>
	
</article>