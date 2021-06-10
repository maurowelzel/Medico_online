 <?php ob_start(); include_once('clsConexion.php'); session_start(); ?> <html>
<head> <title>Gestion de pacientes</title>

<!-- Llamada a la CSS -->

<br>
<div class="titulo1">
<CENTER><legend>GESTION PACIENTES</legend></CENTER>
</div>
<br>

<link rel="stylesheet" href="css/Paciente.css" href="">
<link rel="stylesheet" href="css/TablaPaciente.css" href="">
  <style>
    body{
      background-image: url('medico.jpg'); 
      background-size: cover;
      background-repeat: no-repeat;
      width: 900px; height:800px; 
    }

  </style>
<?php
$conexion=mysqli_connect("localhost","root", "", "bd_medico_online");
$qr=mysqli_query($conexion, "SELECT id_doctor from doctor where id_usuario='".$_SESSION['usud']."'");
  if($row = mysqli_fetch_array($qr)){
  $idd=$row[0];
}
$sql= "SELECT * FROM paciente where id_doctor='".$idd."'";



$result=mysqli_query($conexion,$sql);
 ?>
  <div id="main-container">
 <center><table border='1' align='left' width='480'>
  <thead>
      <tr bgcolor=#1A42F4 align='center'>
      <td><font color='white'> Nombre</font></td>
      <td><font color='white'> Apellido</font></td>
      <td><font color='white'> Fecha de nacimiento</font></td>
      <td><font color='white'> Sexo</font></td>
      <td><font color='white'> Celular</font></td>
      <td><font color='white'>Alergias</font></td>
      </head>
     
          <?php
      while($row = mysqli_fetch_array($result)){

     echo "<tr><td>".$row[1]."</td>
      <td>".$row[2]."</td>
      <td>".$row[3]."</td>
      <td>".$row[4]."</td>
      <td>".$row[5]."</td>
      <td>".$row[6]."</td>
    

      <td> <a href='FrmRegistrarpaciente.php?id_paciente=".$row[0]."'><button type='button' class='btn btn-sucess'>Editar</button></a></td>
        <td> <a href='FrmRegistrarpaciente.php?id_paciente=".$row[0]."'><button type='button' class='btn btn-danger'>Eliminar</button></a></td>
     </tr>";

      }
      echo "</table></center>";
    

       ?>
 
      
     <br>

   </table>
 </center>
</div>


<div class="botones">
<button class="buttonPaciente1"  onclick="location.href='frmMenuDoctor.php'">Volver</button>
<button class="buttonPaciente1"  onclick="location.href='FrmRegistrarpaciente.php'">Registrar paciente</button>
<button class="buttonPaciente1" >Buscar</button>
</div>
   
</head>
<body>