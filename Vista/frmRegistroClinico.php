
<?php
session_start();
include_once('C:\xampp\htdocs\MedicoF\Modelador\ClsHistoriaclinica.php');

$consulta=ConsultaClinico($_GET['id_clinico']);
function ConsultaClinico($id_clinico1){
  $conn2 = mysqli_connect("localhost","root"  ,"",  "bd_medico_online" );
  $sentencia=mysqli_query($conn2, "SELECT * FROM historial_clinico WHERE id_clinico = '".$id_clinico1."' ");

$val = mysqli_fetch_array($sentencia);
return [
$val['id_clinico'],
$val['id_paciente'],
$val['sintomas'],
$val['peso'],
$val['pulso'],
$val['temperatura'],
$val['enfermedad_base'],
$val['alcohol'],
$val['tabaco'],
$val['droga'],
$val['observaciones'],
];
}
?>

<html>
<head>
<title>Registro de Historial Clinico</title>

<!-- Llamada a la CSS -->
<link rel="stylesheet" href="css/frmRegClinico.css" href="">
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
    <button class="buttonRegClini" onclick="location.href='gesHistorialClinico.php'">Volver</button>
<center><form id="form1" name="form1" method="post" action="frmregistroClinico.php">
<fieldset id="form">
  <div class="titulo1">
<legend><strong>REGISTRO DE HISTORIAL CLINICO</strong></legend></div>
  <table width="325" border="0">
      <input name="txtId" type="hidden" value="<?php echo $consulta[0] ?>"  id="txtId" />
    <tr>
          <td width="20"><label><Strong ><font color="white" size="5px">Paciente</font></Strong></label></td>
<div class="paciente">
      <select name="txtPaciente" input title="seleciona un elemento de la lista" value="<?php echo $consulta[1] ?>">
             
                <?php
  $mysqli = new mysqli("localhost","root", "", "bd_medico_online");            
$query = $mysqli -> query ("SELECT * FROM paciente");

while ($valores = mysqli_fetch_array($query)) {
                        
  echo '<option value="'.$valores[0].'">'.$valores[1].' '.$valores[2].'</option>';
}
                  ?>
              </select>
            </div>
    <label></label></td>
    
    </tr>
<tr>
      <td width="79"><label><Strong ><font color="white" size="5px">Sintomas</font></Strong></label></td>
      <td width="227"><label>
	  
        <input name="txtSintomas" class ="cajas" type="text"  value="<?php echo $consulta[2] ?>" id="txtSintomas" />
      </label></td>
    </tr>
     <tr>
      <td><label><Strong ><font color="white" size="5px">Peso</font></Strong></label></td>
      <td><label>
  	  
        <input name="txtPeso" class ="cajas" type="text"value="<?php echo $consulta[3] ?>" id="txtPeso" />
      </label></td>
    </tr>
      <tr>
      <td><label><Strong ><font color="white" size="5px">Pulso</font></Strong></label></td>
      <td><label>
     
      <input name="txtPulso" class ="cajas" type="text" value="<?php echo $consulta[4] ?>" id="txtPulso" />
      </label></td>
    </tr>
    <tr>
      <td width="79"><label><Strong ><font color="white" size="5px">Temperatura</font></Strong></label></td>
      <td width="227"><label>
	 
        <input name="txtTemperatura" class ="cajas" type="text"  value="<?php echo $consulta[5] ?>" id="txtTemperatura" />
      </label></td>
    </tr>
   
  
    <tr>
      <td><label><Strong ><font color="white" size="4px">Enfermedad base</font></Strong></label></td>
      <td><label>
  	  
        <input name="txtEnfermedad" class ="cajas" type="text" value="<?php echo $consulta[6] ?>" id="txtEnfermedad" />
      </label></td>
    </tr>
          <tr>
        <td><label><Strong ><font color="white" size="5px">Alcohol</font></Strong></label></td>
          <td>

            <select name="txtAlcohol" value="<?php echo $consulta[7] ?>" input title="seleciona un elemento de la lista" >
            	<option value=""></option>
            	<option value="Consume">Consume</option>
            	<option value="NoConsume">No Consume</option>
            </select>
          </td>
        </tr>
                  <tr>
        	<td><label><Strong ><font color="white" size="5px">Tabaco</font></Strong></label></td>
          <td>
            

            <select name="txtTabaco" value="<?php echo $consulta[8] ?>" input title="seleciona un elemento de la lista" >
            	<option value=""></option>
            	<option value="Consume">Consume</option>
            	<option value="NoConsume">No Consume</option>
            </select>
          </td>
        </tr>
                  <tr>
        	<td><label><Strong ><font color="white" size="5px">Droga</font></Strong></label></td>
          <td>
            
            <select name="txtDroga" value="<?php echo $consulta[9] ?>" input title="seleciona un elemento de la lista" >
            	<option value=""></option>
            	<option value="Consume">Consume</option>
            	<option value="NoConsume">No Consume</option>
            </select>
          </td>
        </tr>
    <tr>
      <td><label><Strong ><font color="white" size="5px">Observaciones</font></Strong></label></td>
      <td><label>

        <input name="txtObservaciones" class ="cajas" type="text" value="<?php echo $consulta[10] ?>" id="txtObservaciones" />
      </label></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td><label></label></td>
    </tr>
    <tr>
      <td colspan="2">
      </td></tr></table>
	  <label>
	  <input type="submit" name="bot" class="buttonRegClini" value="Nuevo" />
      <input type="submit" name="bot" class="buttonRegClini" value="Guardar" />
      <input type="submit" name="bot" class="buttonRegClini" value="Modificar" />
      <input type="submit" name="bot" class="buttonRegClini" value="Eliminar" />
      <input type="submit" name="bot" class="buttonRegClini" value="Buscar" />
  
      </label>
	  </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;<br>
	 <?php
	 if(!isset($_SESSION['historialClin']))
	  {
		echo" <label><Strong ><font color=white size=5px>Buscar por Codigo</font></Strong></label>";
	  ?>
        <label>
          <label>
          <input name="txtBuscar" type="text" id="txtBuscar" value="<?php echo $valor; ?>" size="10" />
          </label>
          <label></label>
          <input name="bot" class="buttonRegClini"  type="submit" id="botones" class="btn" value="BuscarCodigo" />
          <br />
      </p>
	  <?php
	  	}
		else
		{
		echo "<center><a href='frmBuscarHistorial.php'> Volver </a></center>";
		}
	  ?>

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
  $d=date("Y-m-d "); 
	if($_POST['txtPaciente'])
    $conn = mysqli_connect("localhost","root"  ,"", "bd_medico_online" );
  $qr=mysqli_query($conn, "SELECT id_doctor from doctor where id_usuario='".$_SESSION['usud']."'");
  if($row = mysqli_fetch_array($qr)){
  $idd=$row[0];
}
	{

		$obj= new historial_clinico();
    $obj->setIddoctor($idd);
		$obj->setIdpaciente($_POST['txtPaciente']);
  $obj->setFechadelhistorial($d);
    $obj->setSintomas($_POST['txtSintomas']);
      $obj->setPeso($_POST['txtPeso']);
      $obj->setPulso($_POST['txtPulso']);
		$obj->setTemperatura($_POST['txtTemperatura']);
		$obj->setEnfermedadbase($_POST['txtEnfermedad']);
		$obj->setAlcohol($_POST['txtAlcohol']);
        $obj->setTabaco($_POST['txtTabaco']);
        $obj->setDroga($_POST['txtDroga']);
		$obj->setObservaciones($_POST['txtObservaciones']);
		if ($obj->guardarhistorial())

		    echo "Registro Clinico Guardado..!!!";
		else
		    echo "Error al guardar regitro clinico";
	}

}

function modificar()
{
	if($_POST['txtPaciente'])
	{

    $obj= new historial_clinico();
    $obj->setIdClinico($_POST['txtId']);
    $obj->setIdpaciente($_POST['txtPaciente']);
    $obj->setSintomas($_POST['txtSintomas']);
      $obj->setPeso($_POST['txtPeso']);
      $obj->setPulso($_POST['txtPulso']);
    $obj->setTemperatura($_POST['txtTemperatura']);
    $obj->setEnfermedadbase($_POST['txtEnfermedad']);
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
		$obj= new historial_clinico();
    $obj->setIdClinico($_POST['txtId']);
   $obj->setIdpaciente($_POST['txtPaciente']);
		if ($obj->eliminar())
			echo"Registro Clinico eliminada";
		else
			echo"Error al eliminar el Registro Clinico";
	}
	else
		echo "para eliminar el Registro Clinico debe introducir su codigo.!!!";
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
		$hoy1= date("Y-m-d");
	print $hoy1;

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
