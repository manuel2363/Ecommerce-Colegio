<?php

include('lib/conexion.php');
include('lib/functions.php');
?>

<html>
<title>Proyecto - ITJO</title>
<head>

<script type="text/javascript">
function validarForm(formulario){

	if(formulario.imagen.value.length==0){
		formulario.imagen.focus();
		alert('no has seleccionado una imagen');
		return false;
	}
	if(formulario.nombre.value.length==0){
		formulario.nombre.focus();
		alert('No has escrito tu nombre');
		return false;
	}
	if(formulario.email.value.length==0){
		formulario.email.focus();
		alert('No has escrito tu E-Mail');
		return false;
	}
	if(formulario.password.value.length==0){
		formulario.password.focus();
		alert('no has escrito tu password');
		return false;
	}
	if(formulario.password2.value.length==0){
		formulario.password2.focus();
		alert('no has confirmado tu password');
		return false;
	}
	if(formulario.password.value!=formulario.password2.value){
		formulario.password.focus();
		alert('Los password no coinciden');
		return false;
	}
	
return true;
}
</script>

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
		<li><a href="index.php">INICIO</a></li>
		
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="./procesocar/pedidos.php"><img src="./imagenes/carrito.png" width="200" height="60"  /></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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



<body>

<br><br><br><br><br>
<center>



<br>


	
	

<?php
if(!isset($_SESSION['nombre'])){
echo'
<table border="0" class="fondoAzul">
<tr>
<br><center>
<h3>Introduce los datos requeridos</h3>
<br>
</tr>
<tr>
<td width="350">
<form action="" method="post" onsubmit="return validarForm(this);" enctype="multipart/form-data">

<div id="flashContent">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="300" height="280" id="camara" align="middle">
				<param name="movie" value="./swf/camara.swf" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#0082AE" />
				<param name="play" value="true" />
				<param name="loop" value="true" />
				<param name="wmode" value="window" />
				<param name="scale" value="showall" />
				<param name="menu" value="true" />
				<param name="devicefont" value="false" />
				<param name="salign" value="" />
				<param name="allowScriptAccess" value="sameDomain" />
				<!--[if !IE]>-->
				<object type="application/x-shockwave-flash" data="./swf/camara.swf" width="300" height="280">
					<param name="movie" value="./swf/camara.swf" />
					<param name="quality" value="high" />
					<param name="bgcolor" value="#0082AE" />
					<param name="play" value="true" />
					<param name="loop" value="true" />
					<param name="wmode" value="window" />
					<param name="scale" value="showall" />
					<param name="menu" value="true" />
					<param name="devicefont" value="false" />
					<param name="salign" value="" />
					<param name="allowScriptAccess" value="sameDomain" />
				</object>
			</object>
		</div>
		
</td>
</center>
<td>
<center>
<h3>Datos de registro</h3>
<br><br>
<label>Imagen: </label>
<br>
<input type="file" value="" name="imagen" required>
<br>


<br><label>Nombre: </label>
<input type="text" name="nombre" style="border-style:none;" required>

<br><label>Email: </label>
<input type="email" value="" name="email" style="border-style:none;" required>

<br><label>Password: </label>
<input type="password" value="" name="password" style="border-style:none;" required>

<br><label>Comprobar Password: </label>
<input type="password" value="" name="password2" style="border-style:none;" required>
<br><br>
<input type="submit" value="Registrarte">
</form>
</center>
</td>
</tr>
</table>
';
}else{
echo'<script type="text/javascript">
	alert("Necesitas salir de la sesion para poder registrar otro usuario");
	window.location.href="inde.php";
	</script>';
}

?>


<?php
if ($_POST){
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$encryptado=md5($password);
	$password2 = $_POST['password2'];
		$encryptar2=md5($password2);
	//md5 crea 32 caracteres diferentes en la DB para que nadie pueda ver el password
	



if ($encryptado==$encryptar2){
	
	$usuario = new Usuario();
	$usuario -> registrar($nombre, $email, $encryptado);
	
	}else{
	
	echo '<script type="text/javascript">
		alert("Su compobacion de password no coincide");
		window.location.href="frm_registro.php";
		</script>';
}
}



?>


<br><br>
&#191;Ya tienes cuenta?<br>
<a href="frm_login.php"><img src="./imagenes/ingresar.png" style="width: 135px; height: 40px;"/></a>

<br><br><br>

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