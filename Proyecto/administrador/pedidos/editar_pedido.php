<?php
session_start();
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
include('../../lib/conexion.php');
include('./lib/functions.php');
?>


<html>
<title>Proyecto - ITJO</title>
<head>
<link href="./imagenes/Escudo.jpg" rel="icon" type="image/x-icon" />
<link href="../../css/estilos.css" rel="stylesheet" type="text/css" />

<!--MENU CSS-->
<style type="text/css">
*{
margin: 0px;
padding: 0px; 
}

#header{
 margin: auto;
 width: 500px;
 font-family:Arial, Arial, Arial;
}

ul, ol{
list-style:none;
}

.nav > li {
float:left;
}

.nav li a {
background-color: #3A3838;
color: white;
text-decoration:none;
padding:10px 12px;
display:block;
border-radius:8px;
border:2px solid white;
box-shadow: 5px 7px 10px black;
}

.nav li a:hover{
background-color:#FFB1B1;
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

<a href="#ANCLAJE"><img class="anclaje" src="../../imagenes/Arriba.png" width="80" height="80" onmouseover="this.src='../../imagenes/Arriba2.png';" onmouseout="this.src='../../imagenes/Arriba.png';"></a>




<table border="0" class="menu">
<tr>

<td width="400" class="fondoBlanco"><img src="../../imagenes/banner.jpg">
</td>

<td><h2>Bienvenid@ Administrador</h2>



<div id="header">
	<ul class="nav">
	<!---->	<li><a href="../index.php">INDEX-A</a> <!--administrador-->
			<ul><a href="../../index.php">Index</a></ul> <!--usuario-->
		</li>
		
	<!---->	<li><a href="../productos/mostrar_productos.php">PRODUCTOS-A</a>
			<ul>
				<li><a href="../../Salvaje.php">Salvaje</a></li>
				<li><a href="../../Sexi.php">Sexi</a></li>
				<li><a href="../../Clasica.php">Clasica</a></li>
				<li><a href="../../Experimental.php">Experimental</a></li>
				<li><a href="../../todo.php">Todo</a></li>
			</ul>
		</li>	
		
	<!---->	<li><a href="../usuarios/mostrar_usuarios.php">USUARIOS-A</a>
		</li>
	<!---->	<li><a href="mostrar_comentario.php">COMENTARIOS-A</a>
			<ul><a href="../../contacto.php">Comentarios</a></ul> 
		</li>	
			
			</ul>
</div>

</td>

<td width="200" class="fondoBlanco">



<?php
if(isset($_SESSION['nombre'])){
	if($_SESSION['privilegios']=='Administrador'){

?>

<?php
	if (isset($_SESSION['nombre'])) {
	
	
?>
	<img src="../usuarios/<?php echo $imagen; ?>" alt="" width="80" height="80" border="3" /><br>
<?php

	echo 'Bienvenido!!: '.$_SESSION['nombre'];
	
	}else{
		echo "Tu estas en el sitio web de las tangas mas grandes!";
	}

?>	

<?php
	if (!isset($_SESSION['nombre'])){
	
?>
	
<?php
} else{
?>
	<br><a href="logout.php">CERRAR SESION</a>
<?php
}
?>

<?php
}else{

	echo '<script type="text/javascript">
	alert("No tienes los suficientes privilegios para estar aquí");
	window.location.href="../../index.php";
	</script>';

}


}else{
	echo '<script type="text/javascript">
	window.location.href="../../index.php";
	</script>';

}
?>




</td>

</tr>
</table>



<table class="facebook">

<tr><td><img src="../../imagenes/facebook.png" width="40" height="40" onmouseover="this.src='../../imagenes/facebook2.png';" onmouseout="this.src='../../imagenes/facebook.png';"></td></tr>
<tr><td><img src="../../imagenes/rss.png" width="40" height="40" onmouseover="this.src='../../imagenes/rss2.png';" onmouseout="this.src='../../imagenes/rss.png';"></td></tr>
<tr><td><img src="../../imagenes/twitter.png" width="40" height="40" onmouseover="this.src='../../imagenes/twitter2.png';" onmouseout="this.src='../../imagenes/twitter.png';"></td></tr>

</table>


<center>
<br><br><br><br><br><br><br>
<section class="titulo">
<h1>Editar Pedido</h1>


<?php
$id = $_POST['id'];
$fecha = $_POST['fecha'];
$nombre = $_POST['nombre'];
$nombreR = $_POST['nombreR'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$cp = $_POST['cp'];
$telefono = $_POST['telefono'];
$metodoenvio = $_POST['metodoenvio'];
$metodopago = $_POST['metodopago'];
//$articulos = $_POST['articulos'];
$total = $_POST['total'];
$status = $_POST['status'];
?>

<form action="actualizar_pedido.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<h3> Recuerda: Elegir el STATUS</h3>
<label>Fecha</label>
<input type="text" name="fecha" value="<?php echo $fecha; ?>"  readonly />
<br>
<label>Nombre</label>
<input type="text" name="nombre" value="<?php echo $nombre; ?>" readonly  />
<br>
<label>Nombre Real</label>
<input type="text" name="nombreR" value="<?php echo $nombreR; ?>" readonly />
<br>
<label>Dirección</label>
<input type="text" name="direccion" value="<?php echo $direccion; ?>" readonly />
<br>
<label>Ciudad</label>
<input type="text" name="ciudad" value="<?php echo $ciudad; ?>" readonly />
<br>
<label>Estado</label>
<input type="text" name="estado" value="<?php echo $estado; ?>" readonly />
<br>
<label>C.P.</label>
<input type="text" name="cp" value="<?php echo $cp; ?>" readonly />
<br>
<label>Teléfono</label>
<input type="text" name="telefono" value="<?php echo $telefono; ?>" readonly />
<br>
<label>Metodo de Envio</label>
<input type="text" name="metodoenvio" value="<?php echo $metodoenvio; ?>" readonly />
<br>
<label>Metodo de pago</label>
<input type="text" name="metodopago" value="<?php echo $metodopago; ?>" readonly />
<br>
<!--<label>Artículos</label>
<input type="text" name="articulos" value="<?php echo $articulos; ?>" readonly  />
<br>-->
<label>Total</label>
<input type="text" name="status" value="<?php echo $status; ?>" readonly />
<br>
<label>Status</label>
<br>
<select name="status">
	<?php
	$sql = "SELECT * FROM status";
	$result = mysql_query($sql, Conectar::Conexion());
	while($row = mysql_fetch_array($result)){
	?>
	<option value="<?php echo $row[1]; ?>" <?php if ($status== $row[1]) {?> selected="selected" <?php }?>> <?php echo $row[1]; ?></option>

	<?php
	}
	?>
</select>
<br>


	<br>
	<input type="submit" value="Actualizar Pedido" />
<br><br><br>
</form>
</center>
</body>
</html>




