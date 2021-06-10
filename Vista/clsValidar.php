<?php
session_start();

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "bd_medico_online";

	$conn = mysqli_connect($dbhost,$dbuser  ,$dbpass,	$dbname );

	if(!$conn){
		die("No hay conexion: ".mysqli_connect_error());
	}

	$nombre = $_POST["txtusuario"];
	$pass = $_POST["txtcontraseña"];

	$query=mysqli_query($conn, "SELECT * FROM login WHERE usuario = '".$nombre."' and contraseña = '".$pass."'");

	$nr = mysqli_num_rows($query);

	if($nr ==1 ){

			$sql=("SELECT tipo FROM login WHERE usuario = '".$nombre."' and contraseña = '".$pass."'");
			$query2=mysqli_query($conn,$sql);
 if($row = mysqli_fetch_array($query2)){
 	$r=$row[0];
}
if($r=="d"){
	$qr=mysqli_query($conn, "SELECT * FROM login WHERE usuario = '".$nombre."' and contraseña = '".$pass."'");
if($row2 = mysqli_fetch_array($qr)){
 	$usud=$row2[0];
 	$_SESSION['usud']=$usud;
header("Location:FrmMenuDoctor.php");
		echo "Bienvenido" .$nombre;
}	
}
if($r=="p"){
	$q=mysqli_query($conn, "SELECT * FROM login WHERE usuario = '".$nombre."' and contraseña = '".$pass."'");
if($row = mysqli_fetch_array($q)){
 	$usu=$row[0];
 	$_SESSION['usu']=$usu;

}
header("Location:FrmMenuPaciente.php");
		echo "Bienvenido" .$nombre;

		}
	}
		

	
	else if($nr ==0){
		?>
		<?php
			

			echo "La contraseña o usuarios son incorrectos";

		?>

			
	
		<?php

	}


/*
	$usuario=$_POST['usuario'];
	$contraseña=$_POST['contraseña'];
	session_start();
	$_SESSION['usuario'] = $usuario;

	

	$consulta = "SELECT*FROM login where usuario = '$usuario' and contraseña='$contraseña'";
	$resultado = mysql_query($consulta);

	$filas=mysqli_num_rows($resultado);

	if($filas){
		header("location:Home.php")

	}else{
		?>php
		include("frmLoginClinica.php");
		?>
		<h1>ERROR EN LA AUTENTIFICACION</h1>

		<?php
	}
	mysqli_free_result($resultado);
*/