<?php ob_start();
 include_once('clsConexion.php');
session_start();
?>
<html>
<head>
<title>Gestion de Historial Clinico</title>

<!-- Llamada a la CSS -->

<br>
<div class="titulo1">
<CENTER><legend>REGISTRO DE HISTORIAL CLINICO</legend></CENTER>
</div>
<br>

<link rel="stylesheet" href="css/Historial.css" href="">
<link rel="stylesheet" href="css/TablaHistorial1.css" href="">
  <style>
    body{
      background-image: url('medico.jpg'); 
      background-size: cover;
      background-repeat: no-repeat;
      width: 900px; height:800px; 
    }

  </style>


<?php
$conn = mysqli_connect("localhost","root"  ,"", "bd_medico_online" );
  $qr=mysqli_query($conn, "SELECT id_doctor from doctor where id_usuario='".$_SESSION['usud']."'");
  if($row = mysqli_fetch_array($qr)){
  $idd=$row[0];

}$sql= "SELECT h.id_clinico,p.nombre,p.apellidos,h.fecha_del_historial,h.sintomas,h.peso,h.pulso,h.temperatura,h.enfermedad_base,h.alcohol,h.tabaco,.h.droga,h.observaciones FROM historial_clinico as h, paciente as p where h.id_paciente=p.id_paciente and h.id_doctor='".$idd."' ";
$conexion=mysqli_connect("localhost","root", "", "bd_medico_online");

$result=mysqli_query($conexion,$sql);
 ?>
 <div id="index">
<center><table border='1' align='left' width='480'>
     <tr bgcolor=#1A42F4 align='center'>
          <div id="main-conteiner">
             <thead>
              <td><font color='white'> NombrePaciente</font></td>
     <td><font color='white'> ApellidoPaciente</font></td>
       <td><font color='white'> Fecha</font></td>
         <td><font color='white'> Sintomas</font></td>
         <td><font color='white'> Peso</font></td>
           <td><font color='white'> Pulso</font></td>
     <td><font color='white'> Temperatura</font></td>
     <td><font color='white'> Enfermedad Base</font></td>
     <td><font color='white'> Alcohol</font></td>
     <td><font color='white'> Tabaco</font></td>
     <td><font color='white'> Droga</font></td>
     <td><font color='white'> Observaciones</font></td></tr>
 </thead>
    <?php
     while($row = mysqli_fetch_array($result)){
    echo "<tr><td>".$row[1]."</td>
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
 <td>".$row[12]."</td>
      <td> <a href='frmRegistroClinico.php?id_clinico=".$row[0]."'><button type='button' class='btn btn-sucess'>Editar</button></a></td>
        <td> <a href='frmRegistroClinico.php?id_clinico=".$row[0]."'><button type='button' class='btn btn-danger'>Eliminar</button></a></td>
     </tr>";

     }
     echo "</table></center>";


      ?>

</table></center>
     
</div>


</head>
<button class="buttonHistorial" onclick="location.href='frmMenuDoctor.php'">Volver</button>
<button class="buttonHistorial" onclick="location.href='FrmRegistroClinico.php'">Registrar historial clinico</button>
<body>
</body>
</tr></table></center></div></head></html>
