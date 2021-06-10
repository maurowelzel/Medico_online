<?php ob_start();
session_start();
 include_once('clsConexion.php');

?>
<html>
<head>
<title>Recetas</title>

<!-- Llamada a la CSS -->


<br><div class="titulo1">
<CENTER><legend>Tus Recetas</legend></CENTER>
</div>
<link rel="stylesheet" href="css/VerReceta.css" href="">
<link rel="stylesheet" href="css/TablaVerReceta1.css" href="">
  <style>
    body{
      background-image: url('medico.jpg'); 
      background-size: cover;
      background-repeat: no-repeat;
      width: 900px; height:800px; 
    }

  </style>
<br>

<?php


$sql= "SELECT r.id_receta,d.nombre,d.apellidos,p.nombre,p.apellidos,m.nombre,r.dosis,r.presentacion,r.frecuencia,r.via,r.duracion,r.diagnostico from doctor as d, receta as r , login as l,paciente as p,medicamento as m WHERE l.id_usuario='".$_SESSION['usu']."' and p.id_paciente = r.id_paciente and l.id_usuario=p.id_usuario and m.id_medicamento=r.id_medicamento and d.id_doctor=r.id_doctor";
$conexion=mysqli_connect("localhost","root", "", "bd_medico_online");

$result=mysqli_query($conexion,$sql);
 ?>
 <br>
  <br>
  <div ind="index">
<center><table border='1' align='left' width='480'>

     <tr bgcolor='#1A42F4' align='center'>
      <div id="main-conteiner">
        <td><font color='white'> Receta nro</font></td>
     <td><font color='white'> NombreMedico</font></td>
          <td><font color='white'> ApellidoMedico</font></td>
     <td><font color='white'> NombrePaciente</font></td>
     <td><font color='white'> ApellidoPaciente</font></td>
     <td><font color='white'> Medicamento</font></td>
     <td><font color='white'> Dosis</font></td>
     <td><font color='white'>  Presentacion</font></td>
     <td><font color='white'> Frecuencia</font></td>
     <td><font color='white'> Via</font></td>
     <td><font color='white'> Duracion</font></td>
      <td><font color='white'> Diagnostico</font></td>

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
      <td>".$row[10]."</td>
      <td>".$row[11]."</td>
     </tr>";

}
       ?>
   



     

</tr></table></center></head>
<p></p>
</head>

<body>
<button class="buttonReceta1" onclick="location.href='frmMenuPaciente.php'">Volver</button></div></div>