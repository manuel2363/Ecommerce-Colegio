<?php
session_start();
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
include('../../lib/conexion.php');
include('lib/functions.php');
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
		
	<!---->	<li><a href="mostrar_usuarios.php">USUARIOS-A</a>
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
	<img src="./<?php echo $_SESSION['imagen']; ?>" alt="" width="80" height="80" border="3" /><br>
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



<center>
<br><br><br><br><br><br><br>
<section class="titulo">
<h1>Agregar usuario</h1>

<form action="" method="post" onsubmit="return validarForm(this);" enctype="multipart/form-data">
	<label>Avatar: </label>
	<input type="file" value="" name="avatar" />
	<br>
	<label> Nombre: </label>
	<input type="text" name="name">
	<br>
	<label> Email: </label>
	<input type="email" name="e_mail" placeholder="usuario@servidor.com">
	<br>
	<label> Password: </label>
	<input type="password" name="contrasena">
	<br>
	<label>Comprobar Password: </label>
	<input type="password" value="" name="contrasena2">
	<br>
	<label for="">Privilegios: </label>
			<select name="tipo">
			<option>Administrador</option>
			<option>Usuario</option>
			</select>
	<br /><br>
	
	<input type="submit" value="Agregar Usuario"/>
	<br><br><br>
</form>

</section>


			<?php
			if ($_POST) {
				$name = $_POST['name'];
				$e_mail = $_POST['e_mail'];
				$contrasena = $_POST['contrasena'];
				$cifrado = md5($contrasena);
				$contrasena2=$_POST['contrasena2'];
					$cifrado2=md5($contrasena2);
					$tipo=$_POST['tipo'];
					
			
				if ($cifrado==$cifrado2){
				
					$usuario = new Usuario();
					$usuario -> registrar($name, $e_mail, $cifrado, $tipo);
				
				}
			}
	
			?>













</center>
</body>
</html>




