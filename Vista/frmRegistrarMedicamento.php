<?php
session_start();
include_once('C:\xampp\htdocs\MedicoF\Modelador\ClsMedicamento.php');

$consulta=ConsultaMedicamento($_GET['id_medicamento']);
function ConsultaMedicamento($id_medicamento1){
  $conn2 = mysqli_connect("localhost","root"  ,"",  "bd_medico_online" );
  $sentencia=mysqli_query($conn2, "SELECT * FROM medicamento WHERE id_medicamento = '".$id_medicamento1."' ");

$val = mysqli_fetch_array($sentencia);
return [


$val['id_medicamento'],
$val['nombre'],

];
}
?>

<html>
<head>
<title>Registro de Medicamento</title>

<!-- Llamada a la CSS -->
<link rel="stylesheet" href="css/frmRegMedi.css" href="">

  <style>
    body{
      background-image: url('medico.jpg'); 
      background-size: cover;
      background-repeat: no-repeat;
      width: 900px; height:800px; 
    }

  </style>
</head>
<body>
      <button class="buttonRegMedi" onclick="location.href='GestionarMedicamento.php'">Volver</button>
<center><form id="form1" name="form1" method="post" action="frmRegistrarMedicamento.php">
<fieldset id="form">
	 <div class="titulo1">
<legend><Strong>REGISTRO DE MEDICAMENTO</Strong></legend></div>
  <table width="325" border="0">
     <input name="txtId" type="hidden" value="<?php echo $consulta[0] ?>"  id="txtId" />
<tr>
      
      <td><label><Strong ><font color="white" size="5px">Medicamento</font></Strong></label></td>
      <td><label>
  	
        <input name="txtNombre" class ="cajas" type="text" value="<?php echo $consulta[1] ?>" id="txtDosis" />

      </label></td>
    </tr>

      

    <tr>
      <td>&nbsp;</td>
      <td><label></label></td>
    </tr>
    <tr>
      <td colspan="2">
	  <label>
	  <input type="submit" name="bot" class="buttonRegMedi"  value="Nuevo" />
      <input type="submit" name="bot" class="buttonRegMedi"  value="Guardar" />
      <input type="submit" name="bot" class="buttonRegMedi"  value="Modificar" />
      <input type="submit" name="bot" class="buttonRegMedi"  value="Eliminar" />
      <input type="submit" name="bot" class="buttonRegMedi"  value="Buscar" />

      </label>
	  </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;<br>
      	</td></tr></table></fieldset></form></center></body></html>

	  </td>
    </tr>

	<tr>
	<td></td>
	</tr>
  </table>
</form></center>

<?php

function guardar()
{
	$conn = mysqli_connect("localhost","root"  ,"",  "bd_medico_online" );

		$obj= new medicamento();
		    $obj->setNombre($_POST['txtNombre']);
 
       
		if ($obj->guardar())

		    echo "Medicamento guardado..!!!";
		else
		    echo "Error al guardar la receta";
	}



function modificar()
{
	if($_POST['txtNombre'])
	{

	$obj= new medicamento();
	$obj->setIdMedicamento($_POST['txtId']);
		    $obj->setNombre($_POST['txtNombre']);

		if ($obj->modificar())
			echo "Medicamento Modificado..!!!";
		else
			echo "Error al modificar el medicamento..!!!";
	}
	else
		echo "El nombre del medicamento es obligatorio..!!!";
}

function eliminar()
{
	if($_POST['txtNombre'])
	{
		$obj= new medicamento();
	$obj->setIdMedicamento($_POST['txtId']);
		if ($obj->eliminar())
			echo"Medicamento eliminado";
		else
			echo"Error al eliminar el medicamento";
	}
	else
		echo "para eliminar el medicamento debe introducir su codigo.!!!";
}

function buscar()
{
	$obj= new Registro();
	$resultado=$obj->buscar();
	mostrarRegistros($resultado);


}

function buscarPorCodigo()
{
	$obj= new Registro();
	$resultado=$obj->buscarPorPacciente($_POST['txtBuscar']);
	mostrarRegistros($resultado);


}

 function mostrarRegistros($registros)
 {
	echo "<center><table border='1' align='center'>";
	echo "<tr bgcolor='black' align='center'><td><font color='white'>Codigo</font></td>
	       <td><font color='white'> Paciente</font></td>
		   <td><font color='white'> Temperatura</font></td>
		   <td><font color='white'> Peso</font></td>
		   <td><font color='white'> Pulso</font></td>
		   <td><font color='white'> Enfermedad Base</font></td>
		   <td><font color='white'> Alcohol</font></td>
		   <td><font color='white'> Tabaco</font></td>
		   <td><font color='white'> Droga</font></td>
           <td><font color='white'> Observaciones</font></td>
		   <td><font color='white'>*</font></td></tr>";
	while($fila=mysqli_fetch_object($registros))
	{
		echo "<tr >";
		echo "<td>$fila->paciente</td>";
		echo "<td>$fila->temperatura</td>";
		echo "<td>$fila->peso</td>";
		echo "<td>$fila->pulso</td>";
		echo "<td>$fila->enfermedadbase</td>";
		echo "<td>$fila->alcohol</td>";
		echo "<td>$fila->tabaco</td>";
		echo "<td>$fila->droga</td>";
		echo "<td>$fila->observaciones</td>";
		echo "<td><a href='frmregistroClinico.php? cod=$fila->paciente&nom=$fila->temperatura&temp=$fila->peso&pes=$fila->pulso&pul=$fila->enfermedadbase&enf=$fila->alcohol&pat=$fila->tabaco&tab=$fila->droga&dro=$fila->observaciones&obs' > Editar </a> </td>";
		echo "</tr>";
	}
	echo "</table></center>";
 }

//hasta aqui el programa principal
  switch($_POST['bot'])
  {
	case "Nuevo":{
		
	}break;

	case "Guardar":{
    guardar();
	}break;

	case "Modificar":{
    modificar();
	}break;

	case "Eliminar":{
     eliminar();
	}break;

	case "Buscar":{
     buscar();
	}break;

	case "BuscarCodigo":{
     buscarPorCodigo();
	}break;

  }
?>

</body>
</html>
