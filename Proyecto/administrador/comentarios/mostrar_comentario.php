<?php
session_start();
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
include('../../lib/conexion.php');
?>


<html>
<title>Proyecto - ITJO</title>
<head>
<link href="../../imagenes/BURRO.png" rel="icon" type="image/x-icon" />
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
	<img src="../usuarios/<?php echo $_SESSION['imagen']; ?>" alt="" width="80" height="80" border="3" /><br>
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
<h1>Gestión de comentarios</h1>

<a href="agregar_comentario.php">Agregar comentario ADMINISTRADOR</a>

<br>

<table border="10" align="center" cellspacing="2" cellpadding="2" style="">
<tr>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Nombre</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Email</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Asunto</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Comentario</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Fecha</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Status</th>
	
	<th style="border-color:#4E6FFF;  border-width:3px; ">Publicar</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Editar</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Eliminar</th>
</tr>


<?php
$sql = "SELECT * FROM comentarios";
$result = mysql_query($sql,Conectar::Conexion());
	while ($row = mysql_fetch_array($result)){
?>

<tr>
	<td align="middle" style="border-color:#D0142D; border-style:dashed; border-width:5px;"><?php echo $row[1]; ?></td>
	<td align="middle" style="border-color:#D0142D;  border-width:2px;"><?php echo $row[2]; ?></td>
	<td align="middle" style="border-color:#D0142D; border-width:2px;"><?php echo $row[3]; ?></td>
	<td align="middle" style="border-color:#D0142D; border-width:2px;"><textarea style="border-style:none;" readonly><?php echo $row[4]; ?></textarea></td>
	<td align="middle" style="border-color:#D0142D; border-width:2px;"><?php echo $row[5]; ?></td>
	<td align="middle" style="border-color:#D0142D;  border-width:2px;"><?php echo $row[6]; ?></td>	
	
	
	<td align="middle" style="border-color:#666666; border-width:3px;">
		<form action="lib/aprobar_comentario.php" method="post">
			<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
			<input type="submit" value="publicar">
		</form>
		<form action="lib/desaprobar_comentario.php" method="post">
			<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
			<input type="submit" value="despublicar">
		</form>
	
	</td>
	
	
	
	
	
	
	<td style="border-color:#666666; border-width:3px;">
	<form action="editar_comentario.php" method="post">
		<input type="hidden" name="id" value="<?php echo $row[0]; ?>" />
		<input type="hidden" name="name" value="<?php echo $row[1]; ?>" />
		<input type="hidden" name="email" value="<?php echo $row[2]; ?>" />
		<input type="hidden" name="asunto" value="<?php echo $row[3]; ?>" />
		<input type="hidden" name="comentario" value="<?php echo $row[4]; ?>" />
		<input type="hidden" name="fecha" value="<?php echo $row[5]; ?>" />
		<input type="hidden" name="status" value="<?php echo $row[6]; ?>" />
		<input type="submit" value="Editar">
	</form>
	</td>
	<td style="border-color:#666666; border-width:3px;">
	<form action="eliminar_comentario.php" method="post">
		<input type="hidden" name="id" value="<?php echo $row[0]; ?>" />
		<input type="submit" value="Eliminar" />
	</form>
	
	</td>


</tr>

<?php
}
?>


</table>
</section>
</center>
</body>
</html>




