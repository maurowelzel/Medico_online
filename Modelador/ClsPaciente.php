<?php
include_once('clsConexion.php');
class paciente extends Conexion
{
	//atributos
	private $id_paciente;
	private $nombre;
	private $apellidos;
	private $fecha_nacimiento;
	private $sexo;
	private $alergias;
		private $id_doctor;
		private $id_usuario;

	//construtor
	private $celular;
	public function paciente()
	{   parent::Conexion();
		$this->id_paciente=0;
		$this->nombre="";
		$this->apellidos="";
		$this->fecha_nacimiento="";
		$this->sexo="";
		$this->celular="";
		$this->alergias="";
		$this->id_doctor=0;
		$this->id_usuario=0;
	}
	//propiedades de acceso
	public function setIdPaciente($valor)
	{
		$this->id_paciente=$valor;
	}
	public function getIdPaciente()
	{
		return $this->id_paciente;
	}

	public function setNombre($valor)
	{
		$this->nombre=$valor;
	}
	public function getNombre()
	{
		return $this->nombre;
	}

	public function setApellidos($valor)
	{
		$this->apellidos=$valor;
	}
	public function getApellidos()
	{
		return $this->apellidos;
	}

	public function setFecha_nacimiento($valor)
	{
		$this->fecha_nacimiento=$valor;
	}
	public function getFecha_nacimiento()
	{
		return $this->fecha_nacimiento;
	}

	public function setSexo($valor)
	{
		$this->sexo=$valor;
	}
	public function getSexo()
	{
		return $this->sexo;
	}

	public function setCelular($valor)
	{
		$this->celular=$valor;
	}
	public function getCelular()
	{
		return $this->celular;
	}

		public function setAlergias($valor)
	{
		$this->alergias=$valor;
	}
	public function getAlergias()
	{
		return $this->alergias;
	}
public function setIddoctor($valor)
	{
		$this->id_doctor=$valor;
	}
	public function setIdUsuario($valor)
	{
		$this->id_usuario=$valor;
	}

	public function ultimo_codigo()	{
	  $s="select max(id_paciente) as maximo from paciente";	  
	  $reg = parent::ejecutar($s);	
	  $row =mysqli_fetch_array($reg);
	  $ultimo=$row['maximo'];
	  $ultimo=$ultimo;
      return $ultimo;
	}
	
	public function guardarpaciente()
	{
     $sql="insert into paciente(nombre,apellidos,fecha_nacimiento,sexo,celular,alergias,id_doctor,id_usuario) 
	 values('$this->nombre','$this->apellidos','$this->fecha_nacimiento','$this->sexo','$this->celular','$this->alergias','$this->id_doctor','$this->id_usuario')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	public function modificar()	{
	$sql="update paciente set nombre='$this->nombre',apellidos='$this->apellidos',fecha_nacimiento='$this->fecha_nacimiento',sexo='$this->sexo',celular='$this->celular',
	alergias='$this->alergias' where id_paciente=$this->id_paciente";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	public function eliminar()
	{
		$sql="delete from paciente where id_paciente=$this->id_paciente";
		
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