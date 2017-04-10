<?php
session_start();
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
include('./lib/functions.php');
include('./lib/conexion.php')
?>


<html>
<title>Proyecto - ITJO</title>

<head>
<meta charset="UTF-8";>
<link href="./imagenes/Escudo.jpg" rel="icon" type="image/x-icon" />
<link href="./css/estilos.css" rel="stylesheet" type="text/css" />


<script>
	function cuenta(){
		document.forms[0].caracteres.value=document.forms[0].comentario.value.length
	}

</script>


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

<center>
<br><br><br><br>
<section class="titulo">
<h1>Comentanos tu opinión o haznos una pregunta</h1>





<br>

<?php if(!isset($_SESSION['nombre'])){
?>

<h3>No puedes comentar si no estas registrado o si no has iniciado sesión, no pierdas el tiempo y hazlo ahora!!!</h3>
<br><a href="frm_registro.php"><img src="./imagenes/registrarse.png" style="width: 122px; height: 35px;"/></a>
<br><br>
</section>
<div class="coments2">
<?php 
}else{
?>

<form action="#" method="post" onsubmit="return validar()">
	<label>Nombre</label>
	<input type="text" name="nombre" readonly value="<?php echo $_SESSION['nombre'];?>"><br>
	<label>Email</label>
	<input type="email" name="email" readonly value="<?php echo $_SESSION['email'];?>"><br>
	<label>Asunto</label>
	<input placeholder="Opinión" type="text" name="asunto"><br>

	<br>
	
	Sólo puedes escribir 250 caracteres <br>
	Caracteres escritos: <input type="text" name="caracteres" readonly size="4" /> 
	
	<br>
	<textarea cols="40" rows="5" name="comentario" onKeyDown="cuenta()" onKeyDown="cuenta()" maxlength="250" placeholder="¿Qué opinas de esta pagina y sus productos?"></textarea><br>
	
	<input type="submit" value="Comentar" /> <br>
	
</form>

<?php
	if($_POST){
	$nombre=$_POST['nombre'];
	$email=$_POST['email'];
	$asunto=$_POST['asunto'];
	$comentario=$_POST['comentario'];
	$fecha=date('d/m/Y');
	
	$coment = new Comentario();
	$coment->Comentar($nombre, $email, $asunto, $comentario, $fecha);
	}

?>


<?php
}
?>

	</div>
	<br>
	<div class="coments2">
	
		<?php
			$sql= "SELECT * FROM comentarios WHERE status='publicado'";
			$result= mysql_query($sql, Conectar::Conexion());
			while ($row = mysql_fetch_array($result)){
		
		?>
	
	<table width="800">
	<tr><td>
		Fecha: <?php echo $row[5]; ?>
		<h3 style="color: #FFB7B7;"><?php echo $row[1]; ?> dijo:		</h3>
		<h3><textarea border="0" readonly value style="overflow:auto; border-style:none; color: white; background-color: #242424;; border-width: 1px;" cols="80" rows="2"  ><?php echo $row[4]; ?> </textarea>	<br><br></h3>
	</td></tr>
	</table>	
		<span style="color: black;" >______________________________________________________________________________________________________________</span>
	 <br><br>
	<?php
	}
	?>

	

</div>
<br><br>
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

