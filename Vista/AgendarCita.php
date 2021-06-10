<?php
session_start();
include_once('C:\xampp\htdocs\Medicof\Modelador\clsCitaMedica.php');

function nuevo(){
	
}

?>

<html>
<head>
<title>Agendar cita</title>

<!-- Llamada a la CSS -->
<link rel="stylesheet" href="estilo.css" type="text/css"/>
</head>
<body>
 <button onclick="location.href='FrmMenuPaciente.php'">Volver</button>
<br>
<br>
<h1>Escoja el medico con el que quiera registrar cita medica</h1>
<center><form id="form1" name="form1" method="post" action="AgendarCita.php">
<fieldset id="form">


  <table width="325" border="0">

    <tr>
      <td width="20"><label>Doctor</label></td>
      <td>
      <select name="txtDoctor" input title="seleciona un elemento de la lista" >
             
                <?php
               
  $mysqli = new mysqli("localhost","root", "", "bd_medico_online");            
$query = $mysqli -> query ("SELECT id_doctor,nombre,apellidos,especialidad FROM Doctor");

while ($valores = mysqli_fetch_array($query)) {
                        
  echo '<option value="'.$valores[0].'">'.$valores[1].' '.$valores[2].' '.$valores[3].' </option>';
}
                  
                  ?>
    <label></label></td>
    </tr>

  

    <tr>
      <td><label>Fecha</label></td>
      <td><label>
  	 
        <input name="txtFecha" type="date" value="<?php echo $fech; ?>" id="txtFecha" />
      </label></td>
    </tr>

    <tr>
      <td><label>Hora</label></td>
      <td><label>
  	 
        <input name="txtHora" type="time" value="<?php echo $hor; ?>" id="txtHora" />
      </label></td>
    </tr>

    <tr>
      <td width="20"><label>Sintomas</label></td>
      <td> 
    <input name="txtSintoma" type="text" value="<?php  ?>" id="txtSintoma" />
    <label></label></td>
    </tr>

   
     <tr>
      <td>&nbsp;</td>
      <td><label></label></td>
    </tr>

    <tr>
      <td colspan="2">
	  <label>
	
      <input type="submit" name="bot" class="btn" value="Guardar" />
      
      </label>
	  </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;<br>
      	

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
	$conn = mysqli_connect("localhost","root"  ,"",	"bd_medico_online" );
	$qr=mysqli_query($conn, "SELECT id_paciente from paciente where id_usuario='".$_SESSION['usu']."'");
	if($row = mysqli_fetch_array($qr)){
 	$idd=$row[0];
 }
	$d=date("Y-m-d ");      ;

	$obj= new cita_medica();

  	$obj->setIdDoctor($_POST['txtDoctor']);
  		$obj->setIdpaciente($idd);
    $obj->setFecha($_POST['txtFecha']);
	$obj->setHora($_POST['txtHora']);
	$obj->setSintomas($_POST['txtSintoma']);
	$obj->setFechaCreacion($d);
	$obj->setEstado("P");
       
		if ($obj->guardarcitamedica())
{
		    echo "La cita ha sido agendada el doctor tiene que aceptarla";
	
	}
		else{
		    echo "Error al agendar la cita"	;
		}

}

	function modificar()
{
	if($_POST['txtPaciente'])
	{

		$obj= new Registro();
		$obj->setPaciente($_POST['txtPaciente']);
		$obj->setTemperatura($_POST['txtTemperatura']);
		$obj->setPeso($_POST['txtPeso']);
		$obj->setPulso($_POST['txtPulso']);
		$obj->setEnfermedad($_POST['txtEnfermedad']);
		$obj->setAlcohol($_POST['txtAlcohol']);
        $obj->setTabaco($_POST['txtTabaco']);
        $obj->setDroga($_POST['txtDroga']);
        $obj->setObservaciones($_POST['txtObservaciones']);

		if ($obj->modificar())
			echo "Registro Clinico Modificado..!!!";
		else
			echo "Error al modificar el registro..!!!";
	}
	else
		echo "El nombre de el paciente es obligatorio..!!!";
}
function eliminar()
{
	if($_POST['txtPaciente'])
	{
		$obj= new Registro();
		$obj->setPaciente($_POST['txtPaciente']);
		if ($obj->eliminar())
			echo"Registro eliminada";
		else
			echo"Error al eliminar el registro";
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






























