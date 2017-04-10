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
		
	<!---->	<li><a href="mostrar_productos.php">PRODUCTOS-A</a>
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
	<!---->	<li><a href="../comentarios/mostrar_comentario.php">COMENTARIOS-A</a>
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
<h1>Editar producto</h1>


<?php
$id = $_POST['id'];
$portada = $_POST['portada'];
$nombreP = $_POST['nombreP'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$fecha  = $_POST['fecha'];
$categoria = $_POST['categoria'];
$status = $_POST['status'];
?>

<form action="actualizar_producto.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>" />

<label>Portada</label><br>
<img src="<?php echo $portada; ?>" width="120" height="120" /><br>
<input type="hidden" name="portada" value="<?php echo $portada; ?>" /><br>
<input type="file" name="portada2"><br>
<br><br>
<label>Nombre</label>
<input type="text" name="nombreP" value="<?php echo $nombreP; ?>" />
<br>
<label>Descripción</label>
<input type="text" name="descripcion" value="<?php echo $descripcion; ?>" />
<br>
<label>Precio</label>
<input type="number" name="precio" value="<?php echo $precio; ?>" />
<br>
<label>Stock</label>
<input type="number" name="stock" required value="<?php echo $stock; ?>" />
<br>
<label>Fecha</label>
<input type="text" name="fecha" value="<?php echo date('d/m/Y'); ?>" readonly="readonly" />
<br>
<label for=""> Status </label>
<select name="status">
	<option>publicado</option>
	<option>despublicado</option>
</select>
<br>

<label>Categoria</label>
<select name="categoria">
	<option value=""> Seleccione una categoria...</option>
	<?php
	$sql="SELECT * FROM categorias";
	$result= mysql_query($sql, Conectar::Conexion());
	while($row = mysql_fetch_array($result)){
	?>
	<option value="<?php echo $row[1]; ?>" <?php if($categoria == $row[1] ) {?> selected="selected" <?php }?> >
	<?php echo $row[1]; ?>
	
	</option>
	
	<?php
	}
	?>
	</select>
	
	
	<br>
	<input type="submit" value="Actualizar" />

</form>









</center>
</body>
</html>




