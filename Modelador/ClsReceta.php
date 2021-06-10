<?php
include_once('clsConexion.php');
class receta extends Conexion
{
	//atributos
private $id_receta;
private $id_doctor;
private $id_paciente;
private $medicamento;
private $dosis;
private $presentacion;
private $frecuencia;
private $via;
private $duracion;
private $setDiagnostico;
private $id_cita_medica;

	//construtor

	public function receta()
	{   parent::Conexion();
		$this->id_receta=0;
		$this->id_doctor=0;
		$this->id_paciente=0;
		$this->medicamento="";
		$this->dosis="";
		$this->presentacion="";
		$this->frecuencia="";
		$this->via="";
		$this->duracion="";
			$this->diagnostico="";
$this->id_cita_medica=0;
	}
	//propiedades de acceso
	public function setIdreceta($valor)
	{
		$this->id_receta=$valor;
	}
	public function getIdreceta()
	{
		return $this->id_receta;
	}

	public function setIddoctor($valor)
	{
		$this->id_doctor=$valor;
	}

		public function getIddoctor()
	{
		return $this->id_doctor;
	}
	

	public function setIdpaciente($valor)
	{
		$this->id_paciente=$valor;
	}
	public function getIdpaciente()
	{
		return $this->id_paciente;
	}

	public function setMedicamento($valor)
	{
		$this->medicamento=$valor;
	}
	public function getMedicamento()
	{
		return $this->medicamento;
	}

	public function setDosis($valor)
	{
		$this->dosis=$valor;
	}
	public function getDosis()
	{
		return $this->dosis;
	}

	public function setPresentacion($valor)
	{
		$this->presentacion=$valor;
	}
	public function getPresentacion()
	{
		return $this->presentacion;
	}

		public function setFrecuencia($valor)
	{
		$this->frecuencia=$valor;
	}
	public function getFrecuencia()
	{
		return $this->frecuencia;
	}

			public function setVia($valor)
	{
		$this->via=$valor;
	}
	public function getVia()
	{
		return $this->via;
	}
			public function setDuracion($valor)
	{
		$this->duracion=$valor;
	}
	public function getDuracion()
	{
		return $this->duracion;
	}
			public function setDiagnostico($valor)
	{
		$this->diagnostico=$valor;
	}
	public function getDiagnostico()
	{
		return $this->diagnostico;
	}
			
	public function setIdCitamedica($valor)
	{
		$this->id_cita_medica=$valor;
	}
	public function ultimo_codigo()	{
	  $s="select max(id_paciente) as maximo from paciente";	  
	  $reg = parent::ejecutar($s);	
	  $row =mysqli_fetch_array($reg);
	  $ultimo=$row['maximo'];
	  $ultimo=$ultimo;
      return $ultimo;
	}
	
	public function guardarreceta()
	{
     $sql="insert into receta(id_doctor,id_paciente,id_medicamento,dosis,presentacion,frecuencia,via,duracion,diagnostico,id_cita_medica) 
	 values('$this->id_doctor','$this->id_paciente','$this->medicamento','$this->dosis','$this->presentacion','$this->frecuencia','$this->via','$this->duracion','$this->diagnostico','$this->id_cita_medica')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	public function modificar()	{
	$sql="update receta set id_doctor='$this->id_doctor',id_paciente='$this->id_paciente',id_medicamento='$this->medicamento',dosis='$this->dosis',presentacion='$this->presentacion',frecuencia='$this->frecuencia',via='$this->via',duracion='$this->duracion',diagnostico='$this->diagnostico' where id_receta=$this->id_receta";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	public function eliminar()
	{
		$sql="delete from receta where id_receta=$this->id_receta";
		
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