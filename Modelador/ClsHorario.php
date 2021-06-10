<?php

include_once('clsConexion.php');
class horario extends Conexion
{
	//atributos
private $id_horario;
private $dia;
private $horario_comienzo;
private $horario_fin;
private $id_doctor;


	//construtor

	public function horario()
	{   parent::Conexion();
		$this->id_horario=0;
		$this->dia="";
$this->horario_comienzo=0;
$this->horario_fin=0;
$this->id_doctor=0;		
	}
	//propiedades de acceso

public function setHorario($valor)
	{
		$this->id_horario=$valor;
	}
	public function getHorario()
	{
		return $this->id_horario;
	}
	

	public function setDia($valor)
	{
		$this->dia=$valor;
	}
	public function getDia()
	{
		return $this->dia;
	}
	

		public function setHorarioComienzo($valor)
	{
		$this->horario_comienzo=$valor;
	}
	public function getHorarioComienzo()
	{
		return $this->horario_comienzo;
	}
	public function setHorarioFin($valor)
	{
		$this->horario_fin=$valor;
	}
	public function getHorarioFin()
	{
		return $this->horario_fin;
	}
public function setIddoctor($valor)
	{
		$this->id_doctor=$valor;
	}
	public function getIddoctor()
	{
		return $this->id_doctor;
	}
			

	public function ultimo_codigo()	{
	  $s="select max(id_paciente) as maximo from paciente";	  
	  $reg = parent::ejecutar($s);	
	  $row =mysqli_fetch_array($reg);
	  $ultimo=$row['maximo'];
	  $ultimo=$ultimo;
      return $ultimo;
	}
	
	public function guardarhorario()
	{
     $sql="insert into horarios(dia,horario_comienzo,horario_fin,id_doctor) 
	 values('$this->dia','$this->horario_comienzo','$this->horario_fin','$this->id_doctor')";

		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	public function modificarhorario()	{
	$sql="update horarios set dia='$this->dia',horario_comienzo='$this->horario_comienzo',horario_fin='$this->horario_fin' where id_horario=$this->id_horario";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	public function eliminarhorario()
	{
		$sql="delete from horarios where id_horario=$this->id_horario";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
		
	
	public function buscarPorApellidos($criterio)
	{
		$sql="select *from cliente where apellidos like '$criterio%'";
		return parent::ejecutar($sql);
	}										

	/*public function buscar()
	{
		$sql="select *from cliente";
		return parent::ejecutar($sql);
	}*/										

	public function buscarPorNombreApellidos($criterio)
	{
		$sql="select *from cliente where nombre like '%$criterio%' or apellidos like '%$criterio%'";
		return parent::ejecutar($sql);
	}					

	public function buscarPorEmpresa($criterio)
	{
		$sql="select *from cliente where empresa like '%$criterio%'";
		return parent::ejecutar($sql);
	}
	public function buscarPorCodigo($criterio)
	{
		$sql="select *from cliente where id_cliente='$criterio'";
		return parent::ejecutar($sql);
	}
}    
?>