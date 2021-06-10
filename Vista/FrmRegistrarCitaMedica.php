<?php
session_start();
include_once('C:\xampp\htdocs\MedicoF\Modelador\clsCitaMedica.php');
include_once('C:\xampp\htdocs\MedicoF\Modelador\ClsReceta.php');
$consulta=ConsultarCita($_GET['id_cita_medica']);	
function ConsultarCita($id_cita){
	$conn2 = mysqli_connect("localhost","root"  ,"",	"bd_medico_online" );
	$sentencia=mysqli_query($conn2, "SELECT * FROM cita_medica WHERE id_cita_medica = '".$id_cita."' ");

$val = mysqli_fetch_array($sentencia);
return [

$val['id_paciente'],
$val['fecha'],
$val['hora'],
$val['sintomas'],
$val['estado'],
$val['id_cita_medica']
];
}
?>

<html>
<head>
<title>Registro de Cita Medica</title>

<!-- Llamada a la CSS -->
<link rel="stylesheet" href="estilo.css" type="text/css"/>
<style>
    body{
      background-image: url('medico.jpg'); 
      background-size: cover;
      background-repeat: no-repeat;
      width: 900px; height:809px; 
    }

  </style>
</head>
<body>
 <button onclick="location.href='GestionarCitaMedica.php'">Volver</button>
<br>
<br>
<center><form id="form1" name="form1" method="post" action="FrmRegistrarCitaMedica.php">
<fieldset id="form">
<legend>REGISTRO DE CITA MEDICA</legend>

  <table width="325" border="0">
<tr>
  
      <td><label>
  	 
        <input name="txtId" type="hidden" value="<?php echo $consulta[5] ?>"  id="txtId" />
      </label></td>
    </tr>
    <tr>
      <td width="20"><label>Paciente</label></td>
     <td>
      <select name="txtPaciente"  value="<?php echo $consulta[0] ?>"input title="seleciona un elemento de la lista" >
             
                <?php
            $mysqli = new mysqli("localhost","root", "", "bd_medico_online");
  
$query = $mysqli -> query ("SELECT * FROM paciente");

while ($valores = mysqli_fetch_array($query)) {
                        
  echo '<option value="'.$valores[0].'">'.$valores[1].' '.$valores[2].'</option>';
}
                  ?>
    <label></label></td>
    </tr>

  

    <tr>
      <td><label>Fecha</label></td>
      <td><label>
  	 
        <input name="txtFecha" type="date" value="<?php echo $consulta[1] ?>"  id="txtFecha" />
      </label></td>
    </tr>

    <tr>
      <td><label>Hora</label></td>
      <td><label>
  	  
        <input name="txtHora" type="time" value="<?php echo $consulta[2] ?>" id="txtHora" />
      </label></td>
    </tr>

    <tr>
      <td width="20"><label>Sintoma</label></td>
      <td>
    <input name="txtSintoma" type="text" value="<?php echo $consulta[3] ?>" id="txtSintoma" />
    <label></label></td>
    </tr>

   <tr>
      <td><label>Estado</label></td>
      <td><label>
      
  
      <select name="txtEstado" value="<?php echo $consulta[4] ?>" input title="seleciona un elemento de la lista" >
              <option value=""></option>
              <option value="A">Aprobado</option>
              <option value="R">Rechazado</option>
               <option value="P">Pendiente</option>
      </label></td>
    </tr>
     <tr>
      <td>&nbsp;</td>
      <td><label></label></td>
    </tr>

    <tr>
      <td colspan="2">
	  <label>
	  <input type="submit" name="bot" class="buttonRegCita" value="Nuevo" />
      <input type="submit" name="bot" class="buttonRegCita" value="Guardar" />
      <input type="submit" name="bot" class="buttonRegCita" value="Modificar" />
      <input type="submit" name="bot" class="buttonRegCita" value="Eliminar" />
      <input type="submit" name="bot" class="buttonRegCita" value="Buscar" />
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
	$qr=mysqli_query($conn, "SELECT id_doctor from doctor where id_usuario='".$_SESSION['usud']."'");
	if($row = mysqli_fetch_array($qr)){
 	$idd=$row[0];
 }
	$d=date("Y-m-d ");      

	$obj= new cita_medica();
	$obj->setIdpaciente($_POST['txtPaciente']);
  	$obj->setIdDoctor($idd);
    $obj->setFecha($_POST['txtFecha']);
	$obj->setHora($_POST['txtHora']);
	$obj->setSintomas($_POST['txtSintoma']);
	$obj->setFechaCreacion($d);
	$obj->setEstado($_POST['txtEstado']);
       
		if ($obj->guardarcitamedica())

		    echo "Registro Cita Medica Guardado..!!!";
		else
		    echo "Error al guardar Cita Medica";

		/*if($_POST['txtEstado']='A'){
			$qrr=mysqli_query($conn, "SELECT MAX(id_cita_medica) FROM cita_medica");
  if($row = mysqli_fetch_array($qrr)){
  $idcita=$row[0];
 }
				$obj2= new receta();
				$obj2->setIdPaciente($_POST['txtPaciente']);
					$obj2->setIdcitaMedica($idcita);
					$obj2->setIddoctor($idd);
					if ($obj2->guardarreceta())

		    echo "Registro Receta Guardado..!!!";
    
		else
		    echo "Error al guardar receta";


		}
	}
*/
}
	function modificar()
{
	if($_POST['txtPaciente'])
	{
		$conn = mysqli_connect("localhost:33065","root"  ,"",	"bd_medico_online" );
	$qr=mysqli_query($conn, "SELECT id_doctor from doctor where id_usuario='".$_SESSION['usud']."'");
	if($row = mysqli_fetch_array($qr)){
 	$idd=$row[0];
 }
	$d=date("Y-m-d ");    

		$obj= new cita_medica();
$obj->setIdcitaMedica($_POST['txtId']);
		$obj->setIdPaciente($_POST['txtPaciente']);
  	$obj->setIdDoctor($idd);
    $obj->setFecha($_POST['txtFecha']);
	$obj->setHora($_POST['txtHora']);
	$obj->setSintomas($_POST['txtSintoma']);
	$obj->setFechaCreacion($d);
	$obj->setEstado($_POST['txtEstado']);

		if ($obj->modificarcita())
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
		$obj= new cita_medica();
		$obj->setIdcitaMedica($_POST['txtId']);
		$obj->setIdPaciente($_POST['txtPaciente']);



		if ($obj->eliminar())
			echo"Cita eliminada";
		else
			echo"Error al eliminar la cita";
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






























