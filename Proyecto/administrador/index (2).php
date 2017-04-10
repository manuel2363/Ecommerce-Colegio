<?php
session_start();
//si session_start esta en el tercer renglon o en el 4to renglon nos aparecerá error
include('mysql.php');
//include('../lib/conexion.php');

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
 width: 600px;
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
<td>
</td>
<td><td>
<td>
<center>

<div id="header">
	<ul class="nav">
	<!---->	<li><a href="index.php">INDEX-A</a> <!--administrador-->
			<ul><a href="../index.php">Index</a></ul> <!--usuario-->
		</li>
		
	<!---->	<li><a href="./productos/mostrar_productos.php">PRODUCTOS-A</a>
			<ul>
				<li><a href="../Salvaje.php">Salvaje</a></li>
				<li><a href="../Sexi.php">Sexi</a></li>
				<li><a href="../Clasica.php">Clasica</a></li>
				<li><a href="../Experimental.php">Experimental</a></li>
				<li><a href="../todo.php">Todo</a></li>
			</ul>
		</li>	
		
	<!---->	<li><a href="./usuarios/mostrar_usuarios.php">USUARIOS-A</a>
		</li>
	<!---->	<li><a href="./comentarios/mostrar_comentario.php">COMENTARIOS-A</a>
			<ul><a href="../contacto.php">Comentarios</a></ul> 
		</li>	
			
			</ul>
</div>
</td>



<td width="450">
<?php
if(isset($_SESSION['nombre'])){
	if($_SESSION['privilegios']=='Administrador'){

?>
<?php
	if (isset($_SESSION['nombre'])) {
	
	
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="./pedidos/mostrar_pedido.php"><img src="../imagenes/pedidos.png" width="200" height="60"  /></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<!--<img src="./<?php echo $imagen; ?>" class="foto" alt="" width="70" height="60" border="3" />-->
	
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
<?php
}else{

	echo '<script type="text/javascript">
	window.location.href="../index.php";
	</script>';
	/*echo '<script type="text/javascript">
	alert("No tienes los suficientes privilegios para estar aquí");
	window.location.href="../index.php";
	</script>';*/

}


}else{
	echo '<script type="text/javascript">
	window.location.href="../index.php";
	</script>';

}
?>
</td>
</td>






</tr>
</table>

<center>
<br><br><br><br>
<section class="titulo">
<h1>Hola, Administrador</h1>
</section>


<div class="coments">
<br><br>
<center>

<h2>Selecciona un estado...</h2>

<form action="./lib/estado.php" method="post">
<?php
$db = new MySQL();
$consulta = $db->consulta("SELECT * FROM mantenimiento");
if($db->num_rows($consulta)>0){
 	?>
<select name="estado">
 <?php
  while($resultados = $db->fetch_array($consulta)){ 
  	//$decrypted = decryptIt( $resultados['password'], $pass);
    ?>
    <option value="<?php $resultados['estado'];?>"><?php echo $resultados['estado'];?></option>
   
   <?php
  // echo "ID: ".$resultados['id']." nombre: ".$resultados['nombre']." pass: ".$resultados['password']."<br />"; 
 }?>
<select/>
 <?php

}?>
<!--<?php/*
	$sql = "SELECT * FROM mantenimiento";
	$result = mysql_query($sql);*/
?>
<select name="estado">
<?php    
   /* while ($row = mysql_fetch_array($result))
    { //$lista= $row['estado']; 
		//echo $row['estado'];*/
    ?>             
             <option value="<?php// $lista?>"><?php// echo $lista;?></option>
    <?php
   /* }*/
?>
<select/>-->
		
	<input type="submit" value="Actualizar"/>
	</form>

</center>
<br><br><br><br>
</div>



<br><br><br><br>
</center>
</body>
</html>




