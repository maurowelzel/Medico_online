<?php ob_start();
 include_once('clsConexion.php');

?>
<html>
<head>
<title>Gestion de Medicamento</title>

<!-- Llamada a la CSS -->


<br><div class="titulo1">
<CENTER><legend>GESTION DE MEDICAMENTO</legend></CENTER>
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

$sql= "SELECT * FROM medicamento";

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

      	<td><font color='white'> Nro medicamento</font></td>
     <td><font color='white'> Nombre</font></td>
    </thead>

      <?php
      while($row = mysqli_fetch_array($result)){
echo "<tr><td>".$row[0]."</td>
     <td>".$row[1]."</td>
     <td> <a href='frmRegistrarMedicamento.php?id_medicamento=".$row[0]."'><button type='button' class='btn btn-sucess'>Editar</button></a></td>
        <td> <a href='frmRegistrarMedicamento.php?id_medicamento=".$row[0]."'><button type='button' class='btn btn-danger'>Eliminar</button></a></td>
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
<button class="buttonReceta" onclick="location.href='frmRegistrarMedicamento.php'">Registrar medicamento</button>
</div>
