
<?php
session_start();
include_once('C:\xampp\htdocs\MedicoF\Modelador\ClsPaciente.php');
include_once('C:\xampp\htdocs\MedicoF\Modelador\Clslogin.php');
$consulta=ConsultaPaciente($_GET['id_paciente']);
function ConsultaPaciente($id_paciente1){
  $conn2 = mysqli_connect("localhost","root"  ,"",  "bd_medico_online" );
  $sentencia=mysqli_query($conn2, "SELECT * FROM paciente WHERE id_paciente = '".$id_paciente1."' ");

$val = mysqli_fetch_array($sentencia);
return [

$val['id_paciente'],
$val['nombre'],
$val['apellidos'],
$val['fecha_nacimiento'],
$val['sexo'],
$val['celular'],
$val['alergias'],

];
}
?>

<html>
<head>
<title>Registro de Paciente</title>

<!-- Llamada a la CSS -->
<link rel="stylesheet" href="css/frmRegPaci.css" href="">
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
       <button class="buttonRegPaci" onclick="location.href='GestionarPaciente.php'">Volver</button>
<br>
<br>
<center><form id="form1" name="form1" method="post" action="FrmRegistrarpaciente.php">
<fieldset id="form">
   <div class="titulo1">
<legend><strong>REGISTRO DE PACIENTE</strong></legend>
</div>
  <table width="325" border="0">
  <input name="txtId" type="hidden" value="<?php echo $consulta[0] ?>"  id="txtId" />
    <tr>
      <td width="20"><label><Strong ><font color="white" size="5px">Nombre</font></Strong></label></td>
      <td> 
    <input name="txtNombre"  class ="cajas" type="text"  value="<?php echo $consulta[1] ?>" id="txtNombre" />
    <label></label></td>
    </tr>
    <tr>
      <td width="79"><label><Strong ><font color="white" size="5px">Apellidos</font></Strong></label></td>
      <td width="227"><label>
	  
        <input name="txtApellidos"  class ="cajas" type="text"   value="<?php echo $consulta[2] ?>" id="txtApellidos" />
      </label></td>
    </tr>
    <tr>
      <td><label><Strong ><font color="white" size="5px">Fecha de nacimiento</font></Strong></label></td>
      <td><label>
  	  
        <input name="txtFecha_nacimiento"  class ="cajas" type="date"  value="<?php echo $consulta[3] ?>" id="txtFecha_nacimiento" />
      </label></td>
    </tr>
    <tr>
      <td><label><Strong ><font color="white" size="5px"  >Sexo</font></Strong></label></td>
      <td><label>
      
  
      <select name="txtSexo" value="<?php echo $consulta[4] ?>" input title="seleciona un elemento de la lista" >
              <option value=""></option>
              <option value="M">Masculino</option>
              <option value="F">Femenino</option>
      </label></td>
    </tr>
    <tr>
      <td><label><Strong ><font color="white" size="5px">Celular</font></Strong></label></td>
      <td><label>

        <input name="txtCelular"  class ="cajas" type="text" value="<?php echo $consulta[5] ?>"" id="txtCelular"/>
      </label></td>
    </tr>
          <tr>
        	<td><label><Strong ><font color="white" size="5px">Alergias</font></Strong></label></td>
          <td>
         
<input name="txtAlergia"  class ="cajas" type="text" value="<?php echo $consulta[6] ?>" id="txtAlergia" />
            
           </select>
          </td>
        </tr>
            <tr>
      <td><label><Strong ><font color="white" size="5px">Usuario</font></Strong></label></td>
      <td><label>

        <input name="txtUsuario"  class ="cajas" type="text" value="" id="txtUsuario"/>
      </label></td>
    </tr>
          <tr>
          <td><label><Strong ><font color="white" size="5px">Contraseña</font></Strong></label></td>
          <td>
            <input name="txtContraseña"  class ="cajas" type="text" value="" id="txtContraseña"/>
         </tr>
          
    <tr>
      <td>&nbsp;</td>
      <td><label></label></td>
    </tr>
    <tr>
      <td colspan="2">
    <label>
	  <input type="submit" name="bot" class="buttonRegPaci" value="Nuevo" />
      <input type="submit" name="bot" class="buttonRegPaci" value="Guardar" />
      <input type="submit" name="bot" class="buttonRegPaci" value="Modificar" />
      <input type="submit" name="bot" class="buttonRegPaci" value="Eliminar" />
      <input type="submit" name="bot" class="buttonRegPaci" value="Buscar" />

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
          <input name="bot" class="buttonRegPaci" type="submit" id="botones" class="btn" value="BuscarCodigo" />
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
</form></center></label></td></tr></select></label>

<?php
function guardar()
{/*
  $conn = mysqli_connect("localhost","root"  ,"", "bd_medico_online" );
  $qr=mysqli_query($conn, "SELECT id_paciente from paciente where id_usuario='".$_SESSION['usud']."'");
  if($row = mysqli_fetch_array($qr)){
  $idd=$row[0];*/
  $conn = mysqli_connect("localhost","root"  ,"", "bd_medico_online" );
  $qr=mysqli_query($conn, "SELECT id_doctor from doctor where id_usuario='".$_SESSION['usud']."'");
  if($row = mysqli_fetch_array($qr)){
  $idd=$row[0];
}

    $obj2= new login();
    $obj2->setUsuario($_POST['txtUsuario']);
    $obj2->setContraseña($_POST['txtContraseña']);
    $obj2->setTipo("p");
  

   
    if ($obj2->guardarlogin())

  {
        echo "Usuario Clinico Guardado..!!!";
  
    echo "      ";
}
    else
        echo "Error al guardar usuario clinico";
      $qrr=mysqli_query($conn, "SELECT MAX(id_usuario) FROM login");
  if($row = mysqli_fetch_array($qrr)){
  $idlogin=$row[0];
 }
    $obj= new paciente();
    $obj->setNombre($_POST['txtNombre']);
    $obj->setApellidos($_POST['txtApellidos']);
    $obj->setFecha_nacimiento($_POST['txtFecha_nacimiento']);
    $obj->setSexo($_POST['txtSexo']);
    $obj->setCelular($_POST['txtCelular']);
        $obj->setAlergias($_POST['txtAlergia']);
          $obj->setIddoctor($idd);
 $obj->setIdUsuario($idlogin);
   
    if ($obj->guardarpaciente())

  
        echo "Paciente Guardado..!!!   ";
    else
        echo "Error al guardar Paciente ";
  
  

}

function modificar()
{
  if($_POST['txtNombre'])
  {
    $conn = mysqli_connect("localhost","root"  ,"", "bd_medico_online" );
  $qr=mysqli_query($conn, "SELECT id_paciente from paciente where id_usuario='".$_SESSION['usud']."'");
  if($row = mysqli_fetch_array($qr)){
  $idd=$row[0];
 }
  

    $obj= new paciente();
    $obj->setIdPaciente($_POST['txtId']);
    $obj->setNombre($_POST['txtNombre']);
    $obj->setApellidos($_POST['txtApellidos']);
    $obj->setFecha_nacimiento($_POST['txtFecha_nacimiento']);
    $obj->setSexo($_POST['txtSexo']);
    $obj->setCelular($_POST['txtCelular']);
        $obj->setAlergias($_POST['txtAlergia']);

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
  if($_POST['txtNombre'])
  {
    $obj= new paciente();
        $obj->setIdPaciente($_POST['txtId']);
    if ($obj->eliminar())
      echo"Registro eliminada";
    else
      echo"Error al eliminar el registro";
  }
  else
    echo "para eliminar el registro debe introducir su codigo.!!!";
}

$p=new paciente();
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
    print $_POST['txtNombre'];
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
