<?php ob_start();
 include_once('clsConexion.php');
session_start();
?>
<html>
<head>
<title>Gestion de Receta</title>

<!-- Llamada a la CSS -->


<br>
<div class="titulo1">
<CENTER><legend>GESTION DE RECETA</legend></CENTER>
</div>
<br>

<link rel="stylesheet" href="css/Receta.css" href="">
<link rel="stylesheet" href="css/TablaReceta1.css" href="">
  <style>
    body{
      background-image: url('medico.jpg'); 
      background-size: cover;
      background-repeat: no-repeat;
      width: 900px; height:800px; 
    }

  </style>
<?php

$sql= "SELECT r.id_receta,d.nombre,p.nombre,m.nombre,r.dosis,r.presentacion,r.frecuencia,r.via,r.duracion,r.diagnostico FROM receta as r,paciente as p,medicamento as m, doctor as d  where r.id_medicamento=m.id_medicamento and r.id_paciente=p.id_paciente and r.id_doctor=d.id_doctor and d.id_usuario = '".$_SESSION['usud']."'";
$conexion=mysqli_connect("localhost","root", "", "bd_medico_online");

$result=mysqli_query($conexion,$sql);
 ?>
 <br>
  <br>
<center><table border='1' align='left' width='480'>
<div id="main-container">
     <tr bgcolor=#1A42F4 align='center'>
      <div id="main-conteiner">
         <thead>
      	<td><font color='white'> Receta nro</font></td>
     <td><font color='white'> Medico</font></td>
     <td><font color='white'> Paciente</font></td>
     <td><font color='white'> Medicamento</font></td>
     <td><font color='white'> Dosis</font></td>
     <td><font color='white'>  Presentacion</font></td>
     <td><font color='white'> Frecuencia</font></td>
     <td><font color='white'> Via</font></td>
     <td><font color='white'> Duracion</font></td>
      <td><font color='white'> Diagnostico</font></td>
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
  <td> <a href='frmRegistrarReceta.php?id_receta=".$row[0]."'><button type='button' class='btn btn-sucess'>Editar</button></a></td>
        <td> <a href='frmRegistrarReceta.php?id_receta=".$row[0]."'><button type='button' class='btn btn-danger'>Eliminar</button></a></td>
     </tr>";    


}
       ?>
     </div>
</div>
</tr>
</table>
</center>
</div>
     


<p></p>
</head>

<body>
  <button class="buttonReceta" onclick="location.href='frmMenuDoctor.php'">Volver</button>
<button class="buttonReceta" onclick="window.open('frmRegistrarReceta.php')">Registrar receta</button>
