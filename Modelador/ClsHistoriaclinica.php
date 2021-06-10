<?php
include_once('clsConexion.php');
class historial_clinico extends Conexion
{
	//atributos
	private $id_clinico;
	private $id_paciente;
	private $fecha_del_historial;
	private $sintomas;
	private $peso;
	private $pulso;
	private $temperatura;
	private $enfermedad_base;
	private $alcohol;
	private $tabaco;
	private $droga;
	private $observaciones;
	private $id_doctor;

	//construtor

	public function historial_clinico()
	{   parent::Conexion();
		$this->id_clinico=0;
		$this->id_paciente=0;
		$this->fecha_del_historial="";
		$this->sintomas="";
		$this->peso=0;
		$this->pulso=0;
		$this->temperatura=0;
		$this->enfermedad_base="";
		$this->alcohol="";
		$this->tabaco="";
		$this->droga="";
		$this->observaciones="";
		$this->id_doctor=0;

	}
	//propiedades de acceso
	public function setIdclinico($valor)
	{
		$this->id_clinico=$valor;
	}

		public function getIdclinico($valor)
	{
		return $this->id_clinico;
	}

		public function setIdpaciente($valor)
	{
		$this->id_paciente=$valor;
	}
	

	public function getIdPaciente()
	{
		return $this->id_paciente;
	}



	public function setFechadelhistorial($valor)
	{
		$this->fecha_del_historial=$valor;
	}
	public function getFechadelhistorial()
	{
		return $this->fecha_del_historial;
	}

	public function setSintomas($valor)
	{
		$this->sintomas=$valor;
	}
	public function getSintomas()
	{
		return $this->sintomas;
	}

	public function setPeso($valor)
	{
		$this->peso=$valor;
	}
	public function getPeso()
	{
		return $this->peso;
	}

	public function setPulso($valor)
	{
		$this->pulso=$valor;
	}
	public function getPulso()
	{
		return $this->pulso;
	}

		public function setTemperatura($valor)
	{
		$this->temperatura=$valor;
	}
	public function getTemperatura()
	{
		return $this->temperatura;
	}

			public function setEnfermedadbase($valor)
	{
		$this->enfermedad_base=$valor;
	}
	public function getEnfermedadbase()
	{
		return $this->enfermedad_base;
	}
			public function setAlcohol($valor)
	{
		$this->alcohol=$valor;
	}
	public function getAlcohol()
	{
		return $this->alcohol;
	}
			public function setTabaco($valor)
	{
		$this->tabaco=$valor;
	}
	public function getTabaco()
	{
		return $this->tabaco;
	}
			public function setDroga($valor)
	{
		$this->droga=$valor;
	}
	public function getDroga()
	{
		return $this->droga;
	}

			public function setObservaciones($valor)
	{
		$this->observaciones=$valor;
	}
	public function getObservaciones()
	{
		return $this->observaciones;
	}
		public function setIddoctor($valor)
	{
		$this->id_doctor=$valor;
	}

	public function ultimo_codigo()	{
	  $s="select max(id_paciente) as maximo from paciente";	  
	  $reg = parent::ejecutar($s);	
	  $row =mysqli_fetch_array($reg);
	  $ultimo=$row['maximo'];
	  $ultimo=$ultimo;
      return $ultimo;
	}
	
	public function guardarhistorial()
	{
     $sql="insert into historial_clinico(id_paciente,fecha_del_historial,sintomas,peso,pulso,temperatura,enfermedad_base,alcohol,tabaco,droga,observaciones,id_doctor) 
	 values('$this->id_paciente','$this->fecha_del_historial','$this->sintomas','$this->peso','$this->pulso','$this->temperatura','$this->enfermedad_base','$this->alcohol','$this->tabaco','$this->droga','$this->observaciones','$this->id_doctor')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	public function modificar()	{
	$sql="update historial_clinico set id_paciente='$this->id_paciente',sintomas='$this->sintomas',peso='$this->peso',pulso='$this->pulso',
	temperatura='$this->temperatura',enfermedad_base='$this->enfermedad_base',alcohol='$this->alcohol',tabaco='$this->tabaco',droga='$this->droga',observaciones='$this->observaciones' where id_clinico=$this->id_clinico";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	public function eliminar()
	{
		$sql="delete from historial_clinico where id_clinico=$this->id_clinico";
		
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