<?php
session_start();
//include('lib/conexion.php');
include('lib/sesion.php');
include("administrador/mysql.php");

$email=$_POST['email'];
$password=$_POST['password'];
$password = md5($password);
/*******************************\
* Conexion con la base de datos *
* llamada tangotas              *
\*******************************/
$con=mysql_connect('localhost','root','') or die('No se pudo conectar: ' . mysql_error());
//$b=mysql_select_db('tangotas') or die('No se pudo seleccionar la base de datos');
mysql_select_db('tangotas') or die('No se pudo seleccionar la base de datos');
$sql="SELECT * FROM usuarios WHERE email='".$email."' and password = '".$password."';";
$r=mysql_query($sql);

if(mysql_num_rows($r)>0){
	if ($r) {
		$reg=mysql_fetch_array($r);
				$_SESSION['id']=$reg['id'];
				$_SESSION['nombre']=$reg['nombre'];
				$_SESSION['email']=$reg['email'];
				$_SESSION['privilegios']=$reg['privilegios'];
				$_SESSION['imagen']=$reg['imagen'];
				//header("location:prueba2.php");
				header("location:administrador/index.php");
			}
	else{
		echo "El usuario o la contraseña no coinciden";
		}
	}else{
		echo "El usuario no existe";
		}



?>