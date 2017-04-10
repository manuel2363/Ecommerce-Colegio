<?php
session_start();
include('../lib/conexion.php');
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
?>


<html>
<title>INDEX TANGAS</title>
<head>

<script type="text/javascript">
function validarForm(formulario) {
  if(formulario.cantidad.value.length==0) { //comprueba que no esté vacío
    formulario.cantidad.focus();   
    alert('No puedes comprar cero productos'); 
    return false; //devolvemos el foco
  }
  return true;
}
</script>


<link href="./imagenes/Escudo.jpg" rel="icon" type="image/x-icon" />
<link href="../css/estilos.css" rel="stylesheet" type="text/css" />

<!--MENU CSS-->
<style type="text/css">
*{
margin: 0px;
padding: 0px; 
}

#header{
 margin: auto;
 width: 300px;
 font-family:Arial, Arial, Arial;
}

ul, ol{
list-style:none;
}

.nav > li {
float:left;
}

.nav li a {
background-color: #0082AE;
color: white;
text-decoration:none;
font-weight: 600;
padding:10px 12px;
display:block;
border-radius:8px;
border:2px solid black;
box-shadow: 5px 7px 10px black;
}

.nav li a:hover{
background-color:#C30C0C;
}

.nav li ul{
display:none;
position:absolute;
min-width:140px;
}

.nav li:hover > ul{
display:block;
}

.nav li ul li ul{
right:-140px;
top:0px;
}

</style>

</head>


<body class="body">

<a name="ANCLAJE">ANCLAJE</a>

<a href="#ANCLAJE"><img class="anclaje" src="../imagenes/Arriba.png" width="80" height="80" onmouseover="this.src='../imagenes/Arriba2.png';" onmouseout="this.src='../imagenes/Arriba.png';"></a>




<table border="0" class="menu" >
<tr>
<td><a href="../todo.php"><img src="../imagenes/banner2.png" width="500" height="70"  /></a>
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>
<center>

<div id="header">
	<ul class="nav">
		<li><a href="../index.php">INICIO</a></li>
		
		<li><a href="../todo.php">TODO</a>
			<ul>
				<li><a href="../Clasica.php">Clásica</a></li>
				<li><a href="../Experimental.php">Experimental</a></li>
				<li><a href="../Sexi.php">Sexi</a></li>
				<li><a href="../Salvaje.php">Salvaje</a></li>
			</ul>
		</li>
	
		<li><a href="../contacto.php">CONTACTO</a></li>
	</ul>
</div>
</center>
</td>



<td width="450">

<?php
	if (isset($_SESSION['nombre'])) {
	
	
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="../procesocar/pedidos.php"><img src="../imagenes/carrito.png" width="200" height="60"  /></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="../administrador/usuarios/<?php echo $_SESSION['imagen'];?>" class="foto" alt="" width="70" height="60" border="3" />
	
	<td >
	
<?php

	echo 'Bienvenid@: '.$_SESSION['nombre'];
	
	}else{
		echo "";
	}

?>	



<?php
	if (!isset($_SESSION['nombre'])){
	
?>
	
	<a href="../frm_login.php"><img src="../imagenes/ingresar.png" style="width: 135px; height: 40px;"/></a>
	<a href="../frm_registro.php"><img src="../imagenes/registrarse.png" style="width: 122px; height: 35px;"/></a>
<?php
} else{
?>
	<br><a href="../logout.php"><img src="../imagenes/cerrar.png" style="width: 122px; height: 35px;"/></a>
<?php
}
?>

</td>
</td>






</tr>
</table>


<table class="facebook3">
<tr><td>
<?php
$archivo="../contador.txt";
$abre=fopen($archivo, "r");
$total=fread($abre, filesize($archivo));

fclose($abre);
$abre=fopen($archivo,"w");
$total=$total+1;
$grabar=fwrite($abre,$total);

fclose($abre);

echo"<center><font face='Lucida Sans Unicode' size='3' ><b>VISITAS:<br>".$total." </b></font></center>";
?>
</td></tr>
</table>

<center>

<br><br><br><br><br><br>


<article class="fondoArticulo">
		<?php
			if (isset($_SESSION['nombre'])){
				echo'<br><h1>Bienvenido a tu carrito de compras</h1>';
		?>
		
		<!--ARREGLO MULTIDIMENCIONAL O ASOCIATIVO-->
		<?php
			if(isset($_POST['id'])){
				$id = $_POST['id'];
				$portada = $_POST['portada'];
				$nombreP = $_POST['nombreP'];
				$precio = $_POST['precio'];
				$stock = $_POST['stock'];
				$categoria = $_POST['categoria'];
				$cantidad = $_POST['cantidad'];
		$shopCart[] = array('id'=>$id,'portada'=>$portada,'nombreP'=>$nombreP,'precio'=>$precio,'stock'=>$stock,'cantidad'=>$cantidad); 
			}
			
			
			if(isset($_SESSION['carrito'])){
				$shopCart = $_SESSION['carrito'];
				if(isset($_POST['id'])){
					$id = $_POST['id'];
					$portada = $_POST['portada'];
					$nombreP = $_POST['nombreP'];
					$precio = $_POST['precio'];
					$stock = $_POST['stock'];
					$categoria = $_POST['categoria'];
					$cantidad = $_POST['cantidad'];
						$posicion=-1;
				for($i=0; $i<count($shopCart);$i++){
					if($id == $shopCart[$i]['id']){
						$posicion = $i;
					}
				}
				
				if($posicion != -1){
					$cantidad_nueva = $shopCart[$posicion]['cantidad'] + $cantidad;
					$shopCart[$posicion] = array('id'=>$id,'portada'=>$portada,'nombreP'=>$nombreP,'precio'=>$precio,'stock'=>$stock,'cantidad'=>$cantidad_nueva);
				}else{
					$shopCart[] = array('id'=>$id,'portada'=>$portada,'nombreP'=>$nombreP,'precio'=>$precio,'stock'=>$stock,'cantidad'=>$cantidad); 
				}
				
				}
			}
			
			
			
			//NUEVOS PROCESOS.....
			
			//PROCESO PARA ACTUALIZAR PRODUCTOS
				if(isset($_POST['idUpdate'])){
					$idUpdate = $_POST['idUpdate'];
					$cantidad = $_POST['cantidad'];
					$shopCart[$idUpdate]['cantidad'] = $cantidad;
				}
				
			//PROCESO PARA ELIMINAR PRODUCTOS
				if(isset($_POST['ideliminar'])){
					$ideliminar = $_POST['ideliminar'];
					$shopCart[$ideliminar] = NULL;
				}
				
				
				if(isset($shopCart)){
					$_SESSION['carrito'] = $shopCart;
				}
		?>
		<center>
<table class="fondoBoton" >
	<thead><center><tr><th>Foto</th><th>&nbsp; Nombre &nbsp;</th><th>&nbsp; &nbsp; Precio &nbsp; &nbsp;</th><th>Cantidad</th><th><center>Subtotal</th><th>Eliminar</th></tr></center></thead>
	<tbody>
	<tr><?php
	if(isset($shopCart)){
		$total = 0;
	for($i=0; $i<count($shopCart); $i++){
		if($shopCart[$i] != NULL){
	?>
		
		<td><center><img src="../administrador/productos/<?php echo $shopCart [$i]['portada']; ?>" width="220" height="150" class="imagendetalle" border="4" alt="" /></center></td>
		<td><center><?php echo $shopCart [$i]['nombreP']; ?></center></td>
		<td><center><?php echo '$ '; echo $shopCart [$i]['precio']; ?></center></td>
		
		<td><center>
		
		
		<form action="#" method="post" onsubmit="return validarForm(this); ">
			<center><input type="hidden" name="idUpdate" value="<?php echo $i; ?>" /></center>
			<center><input type="number" name="cantidad" min="1" max="<?php echo $shopCart[$i]['stock']; ?>" value="<?php echo $shopCart[$i]['cantidad']; ?>" style="text-align: center;"/></center>
			<br><center><input type="image" value="Actualizar" src="../imagenes/actualizar.png" style="width: 80px; height: 80px;"/></center>
		</form>
		
		
		</td>
		
		<!--AQUÍ SE GUARDAN LOS CALCULOS DE LOS PRECIOS...-->
		<td><?php $subtotal = $shopCart[$i]['precio']*$shopCart[$i]['cantidad']; 
				$total=$subtotal+$total;
				echo '$ '; echo $subtotal;
			?>
		</td>
		
		<td>
			<form action="carrito3.php" method="post">
				<input type="hidden" name="ideliminar" value="<?php echo $i; ?>" />
				<input type="image" value="Eliminar" src="../imagenes/eliminar.png" style="width: 70px; height: 70px;"/>
			</form>
		</td>
	</tr><?php }}}?>
	
	<tr>
		<td colspan="4" > &nbsp; </td>
		
		<td>Total <br> $ <?php echo $total; ?><br>
			<form action="formulario4.php" method="post">
				<input type="hidden" name="total" value="<?php echo $total; ?>" />
				<center><input type="image" src="../imagenes/comprar.png" style="width: 135px; height: 40px;"/></center>
			</form>
		</td>
	
	</tr><br>
	</tbody><br>
</table></center>
		
		<br>
		
		<form action="../todo.php" method="post">
			<input type="image" src="../imagenes/seguir.png" style="width: 120px; height: 40px;" />
		</form>
		<br><br><br><br>
		<?php
		}else{
		
		echo'<script type="text/javascript">
		alert("Debes iniciar sesión para poder ingresar al carrito de compras.");
		window.location.href="../frm_login.php";
		</script>';
		}
		?>

</article>


<br><br><br><br>
</center>
</center>

</body>
</html>



<!--SOLO LO PUEDE VER EL ADMINISTRADOR-->
<?php
if(isset($_SESSION['nombre'])){
	if($_SESSION['privilegios']=='Administrador'){
	
	echo'
?>
<table class="facebook2">
<tr><td>
<h3>Administrador</h3>
<h4>
<a href="../administrador/index.php">INDEX-A</a><br>
<a href="../administrador/productos/mostrar_productos.php">PRODUCTOS-A</a><br>
<a href="../administrador/usuarios/mostrar_usuarios.php">USUARIOS-A</a><br>
<a href="../administrador/comentarios/mostrar_comentario.php">COMENTARIOS-A</a><br>
</h4>
</td></tr>
</table>
';
}}
?>