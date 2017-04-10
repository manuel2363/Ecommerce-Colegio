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
	//$iduser = $_SESSION['id'];
	if($_SESSION['privilegios']=='Administrador'){

?>

<?php
	if (isset($_SESSION['nombre'])) {
	
	
?>
	<img src="../usuarios/<?php echo $_SESSION['imagen'] ?>" alt="" width="80" height="80" border="3" /><br>
<?php

	echo 'Bienvenido!!: '.$_SESSION['nombre'];
	
	}else{
		echo "Tu estas en el sitio web de los mejores productos!";
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
<h1>Agregar producto</h1>

<form action="agregar_productos.php" method="post" enctype="multipart/form-data" onsubmit="return validar()">
	<label for=""> Portada </label>
	<br>
	<input type="file" name="portada" />
	<br><br>
	<label for=""> Nombre </label>
	<br>
	<input type="text" name="nombreP">
	<br><br>
	<label for=""> Descripcion </label>
	<br>
	<input type="text" name="descripcion">
	<br><br>
	<label for=""> Precio </label>
	<br>
	<input type="number" name="precio">
	<br><br>
	<label for=""> Stock </label>
	<br>
	<input type="number" name="stock" min="0"  required />
	<br><br>
	<label for=""> Fecha </label>
	<br>
	<input type="text" name="fecha" value="<?php echo date('d/M/Y'); ?>" readonly />
	<br><br>
	<label for=""> Status </label>
	<br>
	<select name="status">
	<option>publicado</option>
	<option>despublicado</option>
	</select>
	<br><br>
	
	<label for=""> Categoria </label>
		<select name="categoria">
		<option value=""> Seleccione una Categoria...</option>
		
		<?php
		$sql = "SELECT * FROM categorias";
		$result = mysql_query($sql, Conectar::Conexion());
		while($row = mysql_fetch_array($result)){
		
		?>
		<option value="<?php echo $row[1];?>">  <?php echo $row[1];?></option>
		
		
		<?php
		}
		?>
		</select>
		
	<br><br>
	<input type="submit" value="Agregar producto" />
	
</form>

</section>


<?php

	if($_POST){
	if($_FILES['portada']['type'] == 'image/jpg' || $_FILES['portada']['type'] == 'image/jpeg' || $_FILES['portada']['type'] == 'image/png' ){
		if($_FILES['portada']['size'] <= 51200000){
		
		$rutaServidor = 'images';
		$rutaTemporal = $_FILES['portada']['tmp_name'];
		$nombreImagen = $_FILES['portada']['name'];
		$rutaDestino = $rutaServidor.'/'.$nombreImagen;
		
		move_uploaded_file($rutaTemporal, $rutaDestino);
		
		
		$nombreP = $_POST['nombreP'];
		$descripcion = $_POST['descripcion'];
		$precio = $_POST['precio'];
		$stock = $_POST['stock'];
		$fecha = $_POST['fecha'];
		$categoria = $_POST['categoria'];
		$status = $_POST['status'];
		$id=$_SESSION['id'];

		$agregar = new Producto();
		$agregar->agregar($rutaDestino, $nombreP, $descripcion, $precio, $stock, $fecha, $categoria, $status, $id);
		}else{
		echo'<script type="text/javascript">
		alert("Solo se admiten imagenes de 0.5 Mbytes o inferiores a ese tamaño");
		</script>';
		}
	
	
	}else{
	echo'<script type="text/javascript">
	alert("Solo se admiten imagenes jpg o png, vuelva a intentarlo");
	</script>';
	}
	}
	
?>













</center>
</body>
</html>




