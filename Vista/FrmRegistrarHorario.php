<?php
session_start();
include_once('C:\xampp\htdocs\MedicoF\Modelador\ClsHorario.php');

$consulta=ConsultarHorario($_GET['id_horario']);
function ConsultarHorario($id_horario1){
	$conn2 = mysqli_connect("localhost","root"  ,"",	"bd_medico_online" );
	$sentencia=mysqli_query($conn2, "SELECT * FROM horarios WHERE id_horario = '".$id_horario1."' ");

$val = mysqli_fetch_array($sentencia);
return [

$val['id_horario'],
$val['dia'],
$val['horario_comienzo'],
$val['horario_fin'],
];
}
?>
<html>
<head>
<title>Registro de Horario</title>

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
  <button class="buttonRegMedi" onclick="location.href='GestionarHorario.php'">Volver</button>
<center><form id="form1" name="form1" method="post" action="frmRegistrarHorario.php">
<fieldset id="form">
	 <div class="titulo1">
<legend><Strong>REGISTRO DE HORARIO</Strong></legend></div>
  <table width="325" border="0">
   <input name="txtId" type="hidden" value="<?php echo $consulta[0] ?>"  id="txtId" />
<tr>
      
      <td><label><Strong ><font color="white" size="5px">Dia</font></Strong></label></td>
      <td><label>
  	
       
<select name="txtDia" value="<?php echo $consulta[1] ?>" input title="seleciona un elemento de la lista" >
            
              <option value="Lunes">Lunes</option>
              <option value="Martes">Martes</option>
              <option value="Miercoles">Miercoles</option>
              <option value="Jueves">Jueves</option>
              <option value="Viernes">Viernes</option>
              <option value="Sabado">Sabado</option>
               <option value="Domingo">Domingo</option>
      </label></td>
    </tr>

    <tr>
      
      <td><label><Strong ><font color="white" size="5px">Hora a comenzar</font></Strong></label></td>
      <td><label>
  	
        <input name="txtHorainicio" class ="cajas" type="time" value="<?php echo $consulta[2] ?>" id="txtHorainicio" />

      </label></td>
    </tr>

    <tr>
      
      <td><label><Strong ><font color="white" size="5px">Hora a acabar</font></Strong></label></td>
      <td><label>
  	
        <input name="txtHorafin" class ="cajas" type="time"value="<?php echo $consulta[3] ?>" id="txtHorafin" />

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
	if($_POST['txtDia'] && $_POST['txtHorainicio'] && $_POST['txtHorafin'] && $_POST['txtHorafin'] )
	{
	$conn = mysqli_connect("localhost","root"  ,"",  "bd_medico_online" );
$qr=mysqli_query($conn, "SELECT id_doctor from doctor where id_usuario='".$_SESSION['usud']."'");
  if($row = mysqli_fetch_array($qr)){
  $idd=$row[0];
}
 

		$obj= new horario();
	
		    $obj->setDia($_POST['txtDia']);
            $obj->setHorarioComienzo($_POST['txtHorainicio']);
             $obj->setHorarioFin($_POST['txtHorafin']);
        $obj->setIddoctor($idd);
		if ($obj->guardarhorario())

		    echo "Horario Guardado..!!!";
		else
		    echo "Error al guardar regitro clinico";
	




}
else echo "Rellene todos los datos de manera valida";
}


function modificar()
{
	if($_POST['txtDia'])
	{

		$obj= new horario();
		$obj->setHorario($_POST['txtId']);
		    $obj->setDia($_POST['txtDia']);
            $obj->setHorarioComienzo($_POST['txtHorainicio']);
             $obj->setHorarioFin($_POST['txtHorafin']);
        $obj->setIddoctor($idd);

		if ($obj->modificarhorario())
			echo "Horario Modificado..!!!";
		else
			echo "Error al modificar el Horario..!!!";
	}
	else
		echo "El nombre de el paciente es obligatorio..!!!";
}

function eliminar()
{
	if($_POST['txtDia'])
	{
		$obj= new horario();
		$obj->setHorario($_POST['txtId']);
	
		if ($obj->eliminarhorario())
			echo"Horario eliminado";
		else
			echo"Error al eliminar el Horario";
	}
	else
		echo "para eliminar el registro debe introducir su codigo.!!!";
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
