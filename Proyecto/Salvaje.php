<?php
session_start();
include('lib/conexion.php');
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
?>


<html>
<title>INDEX TANGAS</title>
<head>
<link href="./imagenes/Escudo.jpg" rel="icon" type="image/x-icon" />
<link href="./css/estilos.css" rel="stylesheet" type="text/css" />

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

<a href="#ANCLAJE"><img class="anclaje" src="./imagenes/Arriba.png" width="80" height="80" onmouseover="this.src='./imagenes/Arriba2.png';" onmouseout="this.src='./imagenes/Arriba.png';"></a>




<table border="0" class="menu" >
<tr>
<td><a href="todo.php"><img src="./imagenes/banner2.png" width="500" height="70"  /></a>
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>
<center>

<div id="header">
	<ul class="nav">
		<li><a href="index.php">INDEX</a></li>
		
		<li><a href="todo.php">TODO</a>
			<ul>
				<li><a href="Clasica.php">Clásica</a></li>
				<li><a href="Experimental.php">Experimental</a></li>
				<li><a href="Sexi.php">Sexi</a></li>
				<li><a href="Salvaje.php">Salvaje</a></li>
			</ul>
		</li>
	
		<li><a href="contacto.php">CONTACTO</a></li>
	</ul>
</div>
</center>
</td>



<td width="450">

<?php
	if (isset($_SESSION['nombre'])) {
	
	
?>

	<a href="./procesocar/pedidos.php"><img src="./imagenes/carrito.png" width="200" height="60"  /></a> 
	<img src="../administrador/usuarios/<?php echo $_SESSION['imagen']; ?>" class="foto" alt="" width="60" height="60" border="2" />
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
	
	<a href="frm_login.php"><img src="./imagenes/ingresar.png" style="width: 135px; height: 40px;"/></a>
	<a href="frm_registro.php"><img src="./imagenes/registrarse.png" style="width: 122px; height: 35px;"/></a>
<?php
} else{
?>
	<br><a href="logout.php"><img src="./imagenes/cerrar.png" style="width: 122px; height: 35px;"/></a>
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
$archivo="contador.txt";
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

<tr><td><img src="./imagenes/facebook.png" width="40" height="40" ></td></tr>
<tr><td><img src="./imagenes/blogger.png" width="40" height="40" ></td></tr>
<tr><td><img src="./imagenes/twitter.png" width="40" height="40"></td></tr>
<tr><td><img src="./imagenes/youtube.png" width="40" height="40"></td></tr>
<tr><td><img src="./imagenes/google.png" width="40" height="40"></td></tr>

</table>


<center>
<br><br><br><br>
<section class="titulo">
<h1>Elije una tanga</h1>
<h3>Categoria: Salvaje </h3>
</section>



	<div class="products">	

		<?php
		$sql="SELECT * FROM productos WHERE categoria='Salvaje' and status='publicado' ";
		$result=mysql_query($sql, Conectar::Conexion());
		
		if($result != 0){
	
		while ($row = mysql_fetch_array($result)){
		?>
	
		<div>
<h3>Nombre: <?php echo $row[2]; ?></h3>
<img src="./administrador/productos/<?php echo $row[1]; ?>" width="120" height="120" alt="" />
<p>Categoria: <?php echo $row[7]; ?></p>
<p>Precio: <?php echo $row[4]; ?></p>
<p>Disponibles: <?php echo $row[5]; ?></p>

<form action="./procesocar/detalles.php" method="post">
	<input type="hidden" name="id" value="<?php echo $row[0]; ?>" />
	<input type="hidden" name="portada" value="<?php echo $row[1]; ?>" />
	<input type="hidden" name="nombreP" value="<?php echo $row[2]; ?>" />
	<input type="hidden" name="descripcion" value="<?php echo $row[3]; ?>" />
	<input type="hidden" name="precio" value="<?php echo $row[4]; ?>" />
	<input type="hidden" name="stock" value="<?php echo $row[5]; ?>" />
	<input type="hidden" name="fecha" value="<?php echo $row[6]; ?>" />
	<input type="hidden" name="categoria" value="<?php echo $row[7]; ?>" />
<input type="image" value="Ver Detalles" src="./imagenes/ver.png" style="width: 135px; height: 40px;" /><!--este es el boton-->

</form>
<form action="./procesocar/carrito3.php" method="post">
	<input type="hidden" name="id" value="<?php echo $row[0]; ?>" />
	<input type="hidden" name="portada" value="<?php echo $row[1]; ?>" />
	<input type="hidden" name="nombreP" value="<?php echo $row[2]; ?>" />
	<input type="hidden" name="descripcion" value="<?php echo $row[3]; ?>" />
	<input type="hidden" name="precio" value="<?php echo $row[4]; ?>" />
	<input type="hidden" name="stock" value="<?php echo $row[5]; ?>" />
	<input type="hidden" name="fecha" value="<?php echo $row[6]; ?>" />
	<input type="hidden" name="categoria" value="<?php echo $row[7]; ?>" />
	<input type="hidden" name="cantidad" value="1" />
<input type="image" value="Agregar al carrito" src="./imagenes/agregar.png" style="width: 135px; height: 40px;" /><!--este es el boton-->

</form>		

		</div>
		
		<?php
		}
		?>
		
		<?php
		}else{
		
		echo'
		<br>
		<br>
		<h2>No hay productos en esta categoria, le pedimos una disculta Att: Tangas Lalito</h2>
		<br>
		<br>
		';
		}
		?>
		
		
		</div>
		

</div>
</center>


</body>
</html>

<!--SOLO LO PUEDE VER EL ADMINISTRADOR-->
<?php
if(isset($_SESSION['nombre'])){
	if($_SESSION['privilegios']=='Administrador'){
	
	echo'
<table class="facebook2">
<tr><td>
<h3>Administrador</h3>
<h4>
<a href="./administrador/index.php">INDEX-A</a><br>
<a href="./administrador/productos/mostrar_productos.php">PRODUCTOS-A</a><br>
<a href="./administrador/usuarios/mostrar_usuarios.php">USUARIOS-A</a><br>
<a href="./administrador/comentarios/mostrar_comentario.php">COMENTARIOS-A</a><br>
</h4>
</td></tr>
</table>
';
}}
?>

