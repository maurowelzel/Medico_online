<?php
include_once('clsCita.php');
function nuevo(){
	$_SESSION['nombrecit']="";
}
?>

<html>
<head>
<title>Registro de Cita</title>

<!-- Llamada a la CSS -->
<link rel="stylesheet" href="estilo.css" type="text/css"/>
</head>
<body>

<center><form id="form1" name="form1" method="post" action="frmCita.php">
	<fieldset id="form">
	<legend>REGISTRO DE CITAS</legend>
	///
<table width="325" border="0">
    <tr>
      <td width="20"><label>Id Cita</label></td>
      <td><?php $cod=$_GET['cod']; ?>
    <input name="txtIdCita" type="text" value="<?php echo $cod; ?>" id="txtIdCita" />
    <label></label></td>
    </tr>
    <tr>
      <td width="79"><label>nombre</label></td>
      <td width="227"><label>
	  <?php $but=$_GET['but']; ?>	  
        <input name="txtNombre" type="text"  value="<?php echo $but; ?>" id="txtNombre" />
      </label></td>
    </tr>
    <tr>
      <td width="79"><label>edad</label></td>
      <td width="227"><label>
	  <?php $but=$_GET['but']; ?>	  
        <input name="txtEdad" type="text"  value="<?php echo $but; ?>" id="txtEdad" />
      </label></td>
    </tr>
    <tr>
      <td width="79"><label>fechaentrega</label></td>
      <td width="227"><label>
	  <?php $but=$_GET['but']; ?>	  
        <input name="txtFechaentrega" type="text"  value="<?php echo $but; ?>" id="txtFechaentrega" />
      </label></td>
    </tr>
    <tr>
      <td><label>aprobar</label></td>
      <td><label>
  	  <?php $est=$_GET['est']; ?>	  
        <input name="txtAprobar" type="text" value="<?php echo $est; ?>" id="txtAprobar" />
      </label></td>
    </tr>
    <tr>
      <td><label>rechazar</label></td>
      <td><label>
  	  <?php $est=$_GET['est']; ?>	  
        <input name="txtRechazar" type="text" value="<?php echo $est; ?>" id="txtRechazar" />
      </label></td>
    </tr>
    <tr>
      <td><label>reprogramar</label></td>
      <td><label>
  	  <?php $est=$_GET['est']; ?>	  
        <input name="txtReprogramar" type="text" value="<?php echo $est; ?>" id="txtReprogramar" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label></label></td>
    </tr>
    <tr>