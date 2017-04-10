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


<br><br><br><br>

<center>

<div class="titulo">
<h1>DETALLES DE LA TANGA</h1>
</div>

<article class="articulodetalle">

<?php
	$id = $_POST['id'];
	$portada = $_POST['portada'];
	$nombreP = $_POST['nombreP'];
	$descripcion = $_POST['descripcion'];
	$precio = $_POST['precio'];
	$stock = $_POST['stock'];
	$fecha = $_POST['fecha'];
	$categoria = $_POST['categoria'];
?>
	

	
	
	
	<h2>Imagen: </h2><br>
	<img src="../administrador/productos/<?php echo $portada; ?>" width="500" height="350" class="imagendetalle" border="5" alt=""/> 
	
	<br><br>
	<table>
	<td class="fondoBoton" >
<!--------------------------------------------------------------------------------------------->
	
	<form action="carrito3.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input type="hidden" name="portada" value="<?php echo $portada; ?>" />
		<input type="hidden" name="nombreP" value="<?php echo $nombreP; ?>" />
		<input type="hidden" name="descripcion" value="<?php echo $descripcion; ?>" />
		<input type="hidden" name="precio" value="<?php echo $precio; ?>" />
		<input type="hidden" name="stock" value="<?php echo $stock; ?>" />
		<input type="hidden" name="fecha" value="<?php echo $fecha; ?>" />
		<input type="hidden" name="categoria" value="<?php echo $categoria; ?>" />
		<input type="hidden" name="cantidad" value="1" />
			<input type="image" src="../imagenes/agregar.png" value="Agregar al carrito" style="width: 200px; height: 70px;"/>
	</form>
	
	<br>
	<a href="../todo.php" ><img src="../imagenes/seguir.png" style="width: 120px; height: 40px;"/></a>
<!--------------------------------------------------------------------------------------------->	
	</td>
	
	<td class="fondoBoton" width="400">
	<br><br>
	<h2>Nombre: <?php echo $nombreP; ?></h2>
	<h2>Descripción: <?php echo $descripcion; ?></h2>
	<h2>Precio: <?php echo $precio; ?></h2>
	<h2>Disponibles: <?php echo $stock; ?></h2>
	<h2>Categoria: <?php echo $categoria; ?></h2>
	<h4>Fecha de lanzamiento: <?php echo $fecha; ?></h4>
	
	<br><br>
	
	</td>
	</table>

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