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

<center>
<br><br><br><br>
<div class="titulo">
<h1>Bienvenido a tu carrito de compras</h1>
</div>
<div class="titulo">
<img src="../imagenes/paso2.png" width="550" height="80"/>
<br><br>
<h3>Segundo paso: Selecciona un metodo de paquetería</h3>
<h4>Esto para poder realizar el envio</h4>
</div>

<article class="fondoformulario">
	<?php
		$name = $_POST['name'];
		$nombreR = $_POST['nombreR'];
		$email = $_POST['email'];
		$direccion = $_POST['direccion'];
		$ciudad = $_POST['ciudad'];
		$estado = $_POST['estado'];
		$cp = $_POST['cp'];
		$telefono = $_POST['telefono'];
		$total = $_POST['total'];
			$_SESSION['name']=$name;
			$_SESSION['nombreR']=$nombreR;
			$_SESSION['email']=$email;
			$_SESSION['direccion']=$direccion;
			$_SESSION['ciudad']=$ciudad;
			$_SESSION['estado']=$estado;
			$_SESSION['cp']=$cp;
			$_SESSION['telefono']=$telefono;
			$_SESSION['total']=$total;
	?>
	
<form action="pago6.php" method="post" onsubmit="return validarForm(this);">
	<br><br>
	<input type="radio" name="paqueteria" value="Estafeta" checked /> &nbsp; &nbsp; &nbsp;  &nbsp;  <img src="../imagenes/estafeta.jpg" width="200" height="50" />
	<br><br>
	<input type="radio" name="paqueteria" value="Multipack" /> &nbsp; &nbsp; &nbsp;  &nbsp;  <img src="../imagenes/multipack.gif" width="200" height="50" />
	<br><br>
	<input type="radio" name="paqueteria" value="Redpack"  /> &nbsp; &nbsp; &nbsp;  &nbsp;  <img src="../imagenes/redpack.png" width="200" height="50" />
	<br><br>
	<input type="radio" name="paqueteria" value="DHL"  /> &nbsp; &nbsp; &nbsp;  &nbsp;  <img src="../imagenes/dhl.gif" width="200" height="50" />
	<br><br>
	<br><br>
		<input type="image" src="../imagenes/continuar.png" style="width: 135px; height: 40px;" />
</form>
	<br><br><br><br>
	
	<a>De acuerdo al tipo de pago que hayas elegido, nosotros te diremos a travez de correo cuanto te costará este tipo de pago</a>
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
