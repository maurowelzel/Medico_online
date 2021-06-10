	<?php
include_once('clsConexion.php');
class cita_medica extends Conexion
{
	//atributos
	private $id_cita_medica;
	private $id_doctor;
	private $id_paciente;
	private $fecha;
	private $hora;
	private $sintomas;
	private $fecha_creacion;
	private $estado;

	//construtor
	public function cita_medica()
	{   parent::Conexion();
		$this->id_cita_medica=0;
		$this->id_doctor=0;
		$this->id_paciente=0;
		$this->fecha="";
		$this->hora="";
		$this->sintomas="";
			$this->fecha_creacion="";
		$this->estado="";
	}
		//propiedades de acceso
	public function setIdcitaMedica($valor)
	{
		$this->id_cita_medica=$valor;
	}
	public function getIdcitaMedica()
	{
		return $this->id_cita_medica;
	}
	public function setIdPaciente($valor)
	{
		$this->id_paciente=$valor;
	}
	public function getIdPaciente()
	{
		return $this->id_paciente;
	}
	public function setIdDoctor($valor)
	{
		$this->id_doctor=$valor;
	}
	public function getIdDoctor()
	{
		return $this->id_doctor;
	}
	public function setFecha($valor)
	{
		$this->fecha=$valor;
	}
	public function getFecha()
	{
		return $this->fecha;
	}
	public function setHora($valor)
	{
		$this->hora=$valor;
	}
	public function getHora()
	{
		return $this->hora;
	}
	public function setSintomas($valor)
	{
		$this->sintomas=$valor;
	}
	public function getSintomas()
	{
		return $this->sintomas;
	}
	public function setFechaCreacion($valor)
	{
		$this->fecha_creacion=$valor;
	}
	public function getFechaCreacion()
	{
		return $this->fecha_creacion;
	}
	public function setEstado($valor)
	{
		$this->estado=$valor;
	}
	public function getEstado()
	{
		return $this->estado;
	}


	public function ultimo_codigo()	{
	  $s="select max(id_cita_medica) as maximo from cita_medica";	  
	  $reg = parent::ejecutar($s);	
	  $row =mysqli_fetch_array($reg);
	  $ultimo=$row['maximo'];
	  $ultimo=$ultimo;
      return $ultimo;
	}
	public function guardarCitaMedica()
	{
     $sql="insert into cita_medica(id_doctor,id_paciente,fecha,hora,sintomas,fecha_creacion_cita,estado) 
	 values('$this->id_doctor','$this->id_paciente','$this->fecha','$this->hora','$this->sintomas','$this->fecha_creacion','$this->estado')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	public function modificarcita()	{
	$sql="update cita_medica set id_paciente='$this->id_paciente',fecha='$this->fecha',hora='$this->hora',sintomas='$this->sintomas', estado='$this->estado' where id_cita_medica=$this->id_cita_medica";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function eliminar()
	{
		$sql="delete from cita_medica where id_cita_medica=$this->id_cita_medica";
		
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