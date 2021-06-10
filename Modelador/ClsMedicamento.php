<?php
include_once('clsConexion.php');
class medicamento extends Conexion
{
	//atributos
private $id_medicamento;
private $nombre;



	//construtor

	public function medicamento()
	{   parent::Conexion();
		$this->id_medicamento=0;
		$this->nombre="";
		
	}
	//propiedades de acceso
	public function setIdMedicamento($valor)
	{
		$this->id_medicamento=$valor;
	}
	public function getIdMedicamento()
	{
		return $this->id_medicamento;
	}

	public function setNombre($valor)
	{
		$this->nombre=$valor;
	}
	public function getNombre()
	{
		return $this->nombre;
	}

	
			

	public function ultimo_codigo()	{
	  $s="select max(id_paciente) as maximo from paciente";	  
	  $reg = parent::ejecutar($s);	
	  $row =mysqli_fetch_array($reg);
	  $ultimo=$row['maximo'];
	  $ultimo=$ultimo;
      return $ultimo;
	}
	
	public function guardar()
	{
     $sql="insert into medicamento(nombre) 
	 values('$this->nombre')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	public function modificar()	{
	$sql="update medicamento set nombre='$this->nombre' where id_medicamento=$this->id_medicamento";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	public function eliminar()
	{
		$sql="delete from medicamento where id_medicamento=$this->id_medicamento";
		
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