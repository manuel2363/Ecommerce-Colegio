<?php
session_start();
include('../lib/conexion.php');
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
?>


<html>
<title>Proyecto - ITJO</title>
<head>
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
	<img src="../administrador/usuarios/<?php echo $_SESSION['imagen']; ?>" class="foto" alt="" width="70" height="60" border="3" />
	
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


<table class="facebook">

<tr><td><img src="../imagenes/facebook.png" width="40" height="40" ></td></tr>
<tr><td><img src="../imagenes/blogger.png" width="40" height="40" ></td></tr>
<tr><td><img src="../imagenes/twitter.png" width="40" height="40"></td></tr>
<tr><td><img src="../imagenes/youtube.png" width="40" height="40"></td></tr>
<tr><td><img src="../imagenes/google.png" width="40" height="40"></td></tr>

</table>


<center>
<br><br><br><br>
<div class="titulo">
<h1>Bienvenido a tu carrito de compras</h1>
</div>
<div class="titulo">
<img src="../imagenes/paso4.png" width="550" height="80"/>
<br><br>
<h3>Cuarto paso: Verifica si los productos que seleccionaste son los que realmente vas a comprar.</h3>
<h4>Verifica también tus datos.</h4>
</div>

<article class="fondoArticulo">
	<br><br>
	<?php
		$pago = $_POST['pago'];
		$total = $_POST['total'];
	$_SESSION['name']=$name;
	$_SESSION['nombreR']=$nombreR;
	$_SESSION['email']=$email;
	$_SESSION['direccion']=$direccion;
	$_SESSION['ciudad']=$ciudad;
	$_SESSION['estado']=$estado;
	$_SESSION['cp']=$cp;
	$_SESSION['telefono']=$telefono;
	$_SESSION['paqueteria']=$paqueteria;
	$_SESSION['pago']=$pago;
	$_SESSION['total']=$total;
	
	?>
	
<center>
<table class="fondoBoton" >
	<thead><center><tr><th>Foto</th><th>&nbsp; Nombre &nbsp;</th><th>&nbsp; &nbsp; Precio &nbsp; &nbsp;</th><th>&nbsp; &nbsp; Cantidad &nbsp; &nbsp;</th><th><center>Subtotal</th></tr></center></thead>
	<tbody>
	<tr><?php
	$shopCart = $_SESSION['carrito'];
	if(isset($shopCart)){
		$total = 0;
	for($i=0; $i<count($shopCart); $i++){
		if($shopCart[$i] != NULL){
	?>
		
		<td><center><img src="../administrador/productos/<?php echo $shopCart [$i]['portada']; ?>" width="220" height="150" class="imagendetalle" border="4" alt="" /></center></td>
		<td><center><?php echo $shopCart [$i]['nombreP']; ?></center></td>
		<td><center><?php echo '$ '; echo $shopCart [$i]['precio']; ?></center></td>
		<td><center><?php echo $shopCart[$i]['cantidad']; ?></center></td>
		
		<!--AQUÍ SE GUARDAN LOS CALCULOS DE LOS PRECIOS...-->
		<td><?php $subtotal = $shopCart[$i]['precio']*$shopCart[$i]['cantidad']; 
				$total=$subtotal+$total;
				echo '$ '; echo $subtotal;
			?>
		</td>
	
	</tr><?php }}}?>
	
	<tr>
		<td colspan="4" > &nbsp; </td>
		<td>Total <br> $ <?php echo $total; ?><br>
		
		
	</tr>
	</tbody>
</table>
</center><br>

<article class="articuloverificar" >
<br><br>
<h3>Nombre: <?php echo $name; ?></h3>
<h3>Nombre Real: <?php echo $nombreR; ?></h3>
<h3>E-mail: <?php echo $email; ?></h3>
<h3>Dirección: <br> <?php echo $direccion; ?></h3>
<h3>Ciudad: <?php echo $ciudad; ?></h3>
<h3>Estado: <?php echo $estado; ?></h3>
<h3>C.P.<?php echo $cp; ?></h3>
<h3>Teléfono<?php echo $telefono; ?></h3>
<br><br>
<h3>Método de envio seleccionado: <?php echo $paqueteria; ?></h4>
<br><br>
<h3>Método de pago seleccionado: <?php echo $pago; ?></h4>
<br><br>
</article>
	<br><br>
	
	<form action="finalizar8.php" method="post">
	<input type="hidden" name="total" value="<?php echo $total; ?>" />
	<input type="image" src="../imagenes/finalizar.png" style="width: 200px; height: 60px;"/>
	<br><br><br><br>
	</form>
	<a>Te sugerimos bla bla</a>
</article>





<br><br><br><br>
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
