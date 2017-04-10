<?php

class Conectar{
	
	public static function Conexion(){
		
		$server='localhost';
		$user='root';
		$password='';
		$db='tangotas';
		
		$con=mysql_connect('localhost','root','');
		mysql_select_db($db);
		
		return $con;
		
	
	}

}

?>