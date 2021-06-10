 <?php
include_once('C:\xampp\htdocs\MedicoF\Modelador\ClsDoctor.php');
include_once('C:\xampp\htdocs\MedicoF\Modelador\Clslogin.php');
?>
<!DOCTYPE html>


<head>
	<title>Clinica Online</title>
</head>

<body style="background: url('medico.jpg') no-repeat; background-size: cover;">
	<button class="buttonCuenta" onclick="location.href='home.php'">Inicia Sesion</button>



	<link rel="stylesheet" href="css/style2.css" href="">
	
		<center><form id="form2" name="form2" method="post" action="FrmCrearCuenta.php">
<fieldset id="form">
   <div class="titulo1">
<legend><strong>REGISTRO DE DOCTOR</strong></legend>
</div>
  <table width="2" border="0">
  
    <tr>
      <td width="20"><label><Strong ><font color="white" size="5px">Nombre</font></Strong></label></td>
      <td> 
    <input name="txtNombre"  class ="cajas" type="text"  value="" id="txtNombre" />
    <label></label></td>
    </tr>
    <tr>
      <td width="79"><label><Strong ><font color="white" size="5px">Apellidos</font></Strong></label></td>
      <td width="227"><label>
	  
        <input name="txtApellidos"  class ="cajas" type="text"   value="" id="txtApellidos" />
      </label></td>
    </tr>
     <tr>
        	<td><label><Strong ><font color="white" size="5px">Especialidad</font></Strong></label></td>
          <td>
<input name="txtEspecialidad"  class ="cajas" type="text" value="" id="txtEspecialidad" />
</tr>
    
    <tr>
      <td><label><Strong ><font color="white" size="5px">Celular</font></Strong></label></td>
      <td><label>

        <input name="txtCelular"  class ="cajas" type="text" value="" id="txtCelular"/>
      </label></td>
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
        	<td><label><Strong ><font color="white" size="5px">Codigo</font></Strong></label></td>
          <td>
          	<input name="txtCodigo"  class ="cajas" type="text" value="" id="txtCodigo" />
         </tr>


            
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
	  <input type="submit" name="bot"  value="Crear Cuenta" />
		</form> 
			</section>
	<div style="width: 800px; height:180px;"></div>
			
</body>

</html>

	 <?php

	 function guardar()
{/*

  $conn = mysqli_connect("localhost","root"  ,"", "bd_medico_online" );
  $qr=mysqli_query($conn, "SELECT id_paciente from paciente where id_usuario='".$_SESSION['usud']."'");
  if($row = mysqli_fetch_array($qr)){
  $idd=$row[0];*/
$conn = mysqli_connect("localhost","root"  ,"", "bd_medico_online" );
$query=mysqli_query($conn, "SELECT codigo FROM codigo WHERE codigo = '".$_POST['txtCodigo']."'and activacion=1 ");

$nr = mysqli_num_rows($query);
if($nr ==1 ){

		$sq=mysqli_query($conn, "update codigo set activacion = '0' where codigo= '".$_POST['txtCodigo']."'");
			
 
    $obj= new login();
    $obj->setUsuario($_POST['txtUsuario']);
    $obj->setContraseña($_POST['txtContraseña']);
    $obj->setTipo("d");
  

   
    if ($obj->guardarlogin())

  {
        echo "Usuario Clinico Guardado..!!!";
  
    echo "      ";
}
    else
        echo "Error al guardar usuario clinico";
  
    
  $qr=mysqli_query($conn, "SELECT MAX(id_usuario) FROM login");
  if($row = mysqli_fetch_array($qr)){
  $idlogin=$row[0];
}
   $obj2= new doctor();
    $obj2->setNombre($_POST['txtNombre']);
    $obj2->setApellidos($_POST['txtApellidos']);
    $obj2->setEspecialidad($_POST['txtEspecialidad']);
        $obj2->setCelular($_POST['txtCelular']);
$obj2->setIdusuario($idlogin);
  if ($obj2->guardardoctor())

  
        echo "Doctor Guardado..!!!";
    else
        echo "Error al guardar doctor";
}
else echo "El codigo que coloco no existe";
}
switch($_POST['bot'])
  {
	case "Crear Cuenta":{
   guardar();
	}break;
}