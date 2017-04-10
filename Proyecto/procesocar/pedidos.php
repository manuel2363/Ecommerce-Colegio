<?php
session_start();
include('../lib/conexion.php');
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
?>


<html>
<title>Proyecto - ITJO</title>
<head>
<meta charset="UTF-8";>

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

	
	<a href="../procesocar/pedidos.php"><img src="../imagenes/carrito.png" width="200" height="60"  /></a> 
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

<br><br><br><br><br><br>


<article class="fondoArticulo">
<h2>Aquí podrás ver tus pedidos, y es Status de los mismos</h2>
<br><br>

<table border="10" align="center" cellspacing="2" cellpadding="2" style="">
<tr>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Fecha</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Nombre</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Nombre Real</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Dirección</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Ciudad</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Estado</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">C.P.</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Teléfono</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Paquetería</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Forma de Pago</th>

	<th style="border-color:#4E6FFF;  border-width:3px; ">Total</th>
	<th style="border-color:#4E6FFF;  border-width:3px; ">Status</th>
</tr>


<?php
$nombre = $_SESSION['nombre'];
$sql = "SELECT * FROM pedidos WHERE nombre like '%$nombre%' ";
$result = mysql_query($sql,Conectar::Conexion());
$num_rows = mysql_num_rows($result);

if($num_rows!=0){
while ($row = mysql_fetch_array($result)){
?>

<tr>
	<td align="middle" style="border-color:#D0142D; border-style:dashed; border-width:5px;"><?php echo $row[1]; ?></td>
	<td align="middle" style="border-color:#D0142D;  border-width:2px;"><?php echo $row[2]; ?></td>
	<td align="middle" style="border-color:#D0142D; border-width:2px;"><?php echo $row[3]; ?></td>
	<td align="middle" style="border-color:#D0142D; border-width:2px;"><?php echo $row[4]; ?></td>
	<td align="middle" style="border-color:#D0142D; border-width:2px;"><?php echo $row[5]; ?></td>
	<td align="middle" style="border-color:#D0142D;  border-width:2px;"><?php echo $row[6]; ?></td>	
	<td align="middle" style="border-color:#D0142D;  border-width:2px;"><?php echo $row[7]; ?></td>	
	<td align="middle" style="border-color:#D0142D;  border-width:2px;"><?php echo $row[8]; ?></td>	
	<td align="middle" style="border-color:#D0142D;  border-width:2px;"><?php echo $row[9]; ?></td>	
	<td align="middle" style="border-color:#D0142D;  border-width:2px;"><?php echo $row[10]; ?></td>	
	
	<td align="middle" style="border-color:#D0142D;  border-width:2px;"><?php echo $row[12]; ?></td>	
	<td align="middle" style="border-color:#D0142D;  border-width:2px;"><?php echo $row[13]; ?></td>	
</tr>
<?php
}
?>
</table>

<?php 
}else{
echo'<h2>Usted no cuenta actualmente con pedidos</h2>';
}
?>






</article>


<br><br><br><br>
</center>
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