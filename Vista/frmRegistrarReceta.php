
<?php
session_start();
include_once('C:\xampp\htdocs\MedicoF\Modelador\ClsReceta.php');

$consulta=ConsultaReceta($_GET['id_receta']);
function ConsultaReceta($id_receta1){
  $conn2 = mysqli_connect("localhost","root"  ,"",  "bd_medico_online" );
  $sentencia=mysqli_query($conn2, "SELECT * FROM receta WHERE id_receta = '".$id_receta1."' ");

$val = mysqli_fetch_array($sentencia);
return [
$val['id_receta'],
$val['id_paciente'],
$val['id_medicamento'],
$val['dosis'],
$val['presentacion'],
$val['frecuencia'],
$val['via'],
$val['duracion'],
$val['diagnostico'],
];
}
?>
<html>
<head>
<title>Registro de Recetas</title>
<link rel="stylesheet" href="css/frmReceta.css" href="">
<link rel="stylesheet" href="estilo.css" type="text/css"/>
  <style>
    body{
      background-image: url('medico.jpg'); 
      background-size: cover;
      background-repeat: no-repeat;
      width: 900px; height:800px; 
    }

  </style>
<!-- Llamada a la CSS -->


</head>
<body>
      <button class="buttonRegReceta"  onclick="location.href='gesReceta.php'">Volver</button>
<center><form id="form1" name="form1" method="post" action="frmRegistrarReceta.php">
<fieldset id="form">
  <div class="titulo1">
<legend><strong>REGISTRO DE RECETA</strong></legend>
</div>
<form class="form">

        <input name="txtId" type="hidden" value="<?php echo $consulta[0] ?>"  id="txtId" />
  <table width="325" border="0">
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
      <td width="79"><label><Strong ><font color="white" size="5px">Medicamento</font></Strong></label></td>
      <td width="227" ><label>

  <select name="txtMedicamento" input  title="seleciona un elemento de la lista" value="<?php echo $consulta[2] ?>">
             
                <?php
  $mysqli2 = new mysqli("localhost","root", "", "bd_medico_online");            
$query2 = $mysqli2 -> query ("SELECT * FROM medicamento");

while ($valores2 = mysqli_fetch_array($query2)) {
                        
  echo '<option value="'.$valores2[0].'">'.$valores2[1].' </option>';
}
                  ?>
              </select>
      </label></td>
    </tr>
     <tr>
      <td><label><Strong ><font color="white" size="5px">Dosis</font></Strong></label></td>
      <td><label>
  	
        <input name="txtDosis" class ="cajas" type="text" value="<?php echo $consulta[3] ?>" id="txtDosis" />

      </label></td>
    </tr>

      <tr>
      <td><label><Strong ><font color="white" size="5px">Presentacion</font></Strong></label></td>
      <td><label>

     <select name="txtPresentacion" input title="seleciona un elemento de la lista" value="<?php echo $consulta[4] ?>">
    
              <option value="capsulas">Capsulas</option>
              <option value="grajeas">Grajeas</option>
              <option value="jarabe">Jarabe</option>
              <option value="polvo">Polvo</option>
              <option value="liquida">Liquida</option>
       

      </label></td>
    </tr>

    <tr>
      <td width="79"><label><Strong ><font color="white" size="5px">Frecuencia</font></Strong></label></td>
      <td width="227"><label>
	
        <input name="txtFrecuencia" class ="cajas" type="text"  value="<?php echo $consulta[5] ?>" id="txtFrecuencia" />
      </label></td>
    </tr>
  
    <tr>
      <td><label><Strong ><font color="white" size="5px">Via</font></Strong></label></td>
      <td><label>
  	 <select name="txtVia" input title="seleciona un elemento de la lista" value="<?php echo $consulta[6] ?>">
              <option value="oral">Oral</option>
              <option value="inyectable">Inyectable</option>
              <option value="rectal">Rectal</option>
              <option value="ocular">Ocular</option>
              <option value="nasal">Nasal</option>
               <option value="cutanea">Cutanea</option>
      </label></td>
    </tr>

        <tr>
      <td><label><Strong ><font color="white" size="5px">Duracion</font></Strong></label></td>
      <td><label>
     
        <input name="txtDuracion" class ="cajas" type="text" value="<?php echo $consulta[7] ?>" id="txtDuracion" />
      </label></td>
    </tr>

        <tr>
      <td><label><Strong ><font color="white" size="5px">Diagnostico</font></Strong></label></td>
      <td><label>
     
        <input name="txtDiagnostico" class ="cajas" type="text" value="<?php echo $consulta[8] ?>" id="txtDiagnostico" />
             </select>
          </td>
        </tr>
          
    <tr>
      <td>&nbsp;</td>
      <td><label></label></td>
    </tr>
    <tr>
      <td colspan="2">
    <label>
      
	  <input class="buttonRegReceta"  type="submit" name="bot"  value="Nuevo" />
      <input class="buttonRegReceta"  type="submit" name="bot"  value="Guardar" />
      <input class="buttonRegReceta"  type="submit" name="bot" value="Modificar" />
      <input class="buttonRegReceta"  type="submit" name="bot" value="Eliminar" />
      <input class="buttonRegReceta"  type="submit" name="bot" value="Buscar" />

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
 
$conn = mysqli_connect("localhost","root"  ,"",  "bd_medico_online" );
  $qr=mysqli_query($conn, "SELECT id_doctor from doctor where id_usuario='".$_SESSION['usud']."'");
  if($row = mysqli_fetch_array($qr)){
  $idd=$row[0];
  }

		$obj= new receta();

        
		    $obj->setIdPaciente($_POST['txtPaciente']);
  $obj->setIddoctor($idd);
      $obj->setMedicamento($_POST['txtMedicamento']);
      $obj->setDosis($_POST['txtDosis']);
		$obj->setPresentacion($_POST['txtPresentacion']);
		$obj->setFrecuencia($_POST['txtFrecuencia']);
		$obj->setVia($_POST['txtVia']);
        $obj->setDuracion($_POST['txtDuracion']);
            $obj->setDiagnostico($_POST['txtDiagnostico']);
       
		if ($obj->guardarreceta())

		    echo "Registro Receta Guardado..!!!";
    
		else
		    echo "Error al guardar receta";

	}



function modificar()
{
	if($_POST['txtPaciente'])
	{
$conn = mysqli_connect("localhost","root"  ,"",  "bd_medico_online" );
  $qr=mysqli_query($conn, "SELECT id_doctor from doctor where id_usuario='".$_SESSION['usud']."'");
  if($row = mysqli_fetch_array($qr)){
  $idd=$row[0];
  }
		$obj= new receta();

   $obj->setIdreceta($_POST['txtId']);
$obj->setIdPaciente($_POST['txtPaciente']);
  $obj->setIddoctor($idd);
      $obj->setMedicamento($_POST['txtMedicamento']);
      $obj->setDosis($_POST['txtDosis']);
    $obj->setPresentacion($_POST['txtPresentacion']);
    $obj->setFrecuencia($_POST['txtFrecuencia']);
    $obj->setVia($_POST['txtVia']);
        $obj->setDuracion($_POST['txtDuracion']);
            $obj->setDiagnostico($_POST['txtDiagnostico']);
       

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
		$obj= new receta();
      $obj->setIdreceta($_POST['txtId']);
		$obj->setIdPaciente($_POST['txtPaciente']);
		if ($obj->eliminar())
			echo"Receta eliminada";
		else
			echo"Error al eliminar la receta";
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
