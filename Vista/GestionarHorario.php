<?php ob_start();
 include_once('clsConexion.php');
session_start();
?>
<html>
<head>
<title>Gestion de horarios</title>

<!-- Llamada a la CSS -->


<br><div class="titulo1">
<CENTER><legend>GESTION DE HORARIOS</legend></CENTER>
</div>
<br>
<link rel="stylesheet" href="css/Medicamento2.css" href="">
<link rel="stylesheet" href="css/TablaMedicamento2.css" href="">
  <style>
    body{
      background-image: url('medico.jpg'); 
      background-size: cover;
      background-repeat: no-repeat;
      width: 900px; height:800px; 
    }

  </style>

<?php

$sql= "select h.id_horario,h.dia,h.horario_comienzo,h.horario_fin from horarios as h,doctor as d where d.id_usuario='".$_SESSION['usud']."' and h.id_doctor=d.id_doctor ";
$conexion=mysqli_connect("localhost","root", "", "bd_medico_online");

$result=mysqli_query($conexion,$sql);
 ?>
 <br>
  <br>
  <div class="content">
<center><table border='1' align='left' width='480'>

     <tr bgcolor='#1A42F4' align='center'>
      <div id="main-conteiner">
        <thead>

  
     <td><font color='white'> Dia</font></td>
      <td><font color='white'> Comienzo de hora</font></td>
       <td><font color='white'> Fin de hora</font></td>
    </thead>

      <?php
      while($row = mysqli_fetch_array($result)){
echo "
     <td>".$row[1]."</td>
       <td>".$row[2]."</td>
         <td>".$row[3]."</td>
     <td> <a href='frmRegistrarHorario.php?id_horario=".$row[0]."'><button type='button' class='btn btn-sucess'>Editar</button></a></td>
        <td> <a href='frmRegistrarHorario.php?id_horario=".$row[0]."'><button type='button' class='btn btn-danger'>Eliminar</button></a></td>
     </tr>";

}
       ?>
   

</div>
<div>
     


<p></p>
</head>
</tr></table></center></head>
<body></body></div></tr></table></center></div></head>
  <div id="boto">
  <button class="buttonReceta" onclick="location.href='frmMenuDoctor.php'">Volver</button>
<button class="buttonReceta" onclick="location.href='frmRegistrarHorario.php'">Registrar horario</button>
</div>
