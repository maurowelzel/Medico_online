<?php ob_start();
session_start();
 include_once('clsConexion.php');

?>
<html>
<head>
<title>Gestion de Cita Medica</title>

<!-- Llamada a la CSS -->

<br>
<div class="titulo1">
<CENTER><legend>GESTION DE CITA MEDICA</legend></CENTER>
</div>
<br>


<link rel="stylesheet" href="css/Cita.css" href="">
<link rel="stylesheet" href="css/TablaCita.css" href="">
  <style>
    body{
      background-image: url('medico.jpg'); 
      background-size: cover;
      background-repeat: no-repeat;
      width: 900px; height:800px; 
    }

  </style>

<?php

$sql= "SELECT c.id_cita_medica,d.nombre as nombreDoctor,d.apellidos as apellidoDoctor,p.nombre as nombrePaciente,p.apellidos as apellidoPaciente,c.fecha , c.hora ,c.sintomas,c.fecha_creacion_cita,c.estado FROM cita_medica as c, doctor as d , paciente as p WHERE  c.id_doctor = d.id_doctor and d.id_usuario = '".$_SESSION['usud']."' and c.id_paciente=p.id_paciente";

$conexion=mysqli_connect("localhost","root", "", "bd_medico_online");

$result=mysqli_query($conexion,$sql);
 ?>
 <br>
  <br>
  <div id="index">
<center><table border='1' align='left' width='480'>

     <tr bgcolor=#1A42F4 
align='center'>
      <div id="main-conteiner">
         <thead>
      	<td><font color='white'> Cita Medica nro</font></td>
         <td><font color='white'> NombreDoctor</font></td>
         <td><font color='white'> ApellidoDoctor</font></td>
     <td><font color='white'> NombrePaciente</font></td>
      <td><font color='white'> ApellidoPaciente</font></td>
     <td><font color='white'> Fecha</font></td>
     <td><font color='white'>  Hora</font></td>
     <td><font color='white'> Sintomas</font></td>
       <td><font color='white'> Fecha de creacion</font></td>
     <td><font color='white'> Estado</font></td>
</thead>
      <?php
        while($row = mysqli_fetch_array($result)){

     echo "<tr><td>".$row[0]."</td>
      <td>".$row[1]."</td>
      <td>".$row[2]."</td>
      <td>".$row[3]."</td>
      <td>".$row[4]."</td>
      <td>".$row[5]."</td>
      <td>".$row[6]."</td>
      <td>".$row[7]."</td>
        <td>".$row[8]."</td>
      <td>".$row[9]."</td>

      
       <td> <a href='frmRegistrarCitaMedica.php?id_cita_medica=".$row[0]."'><button type='button' class='btn btn-sucess'>Editar</button></a></td>
        <td> <a href='frmRegistrarCitaMedica.php?id_cita_medica=".$row[0]."'><button type='button' class='btn btn-danger'>Eliminar</button></a></td>
     </tr>";

      }
      echo "</table></center>";
    

       ?>
   

</div></tr></table></center>
</div>
     <button class="buttonCita" onclick="location.href='frmMenuDoctor.php'">Volver</button>
<button class="buttonCita" onclick="window.open('frmRegistrarCitaMedica.php')">Registrar cita medica</button>


<p></p>
</head>

<body>
