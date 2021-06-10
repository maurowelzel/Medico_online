<?php
include_once('clsConexion.php');
class doctor extends Conexion
{
	//atributos
	private $id_doctor;
	private $nombre;
	private $apellidos;
	private $especialidad;
	private $celular;
private $id_usuario;

	//construtor
	
	public function paciente()
	{   parent::Conexion();
		$this->id_doctor=0;
		$this->nombre="";
		$this->apellidos="";
		$this->especialidad="";
		$this->celular="";
	$this->id_usuario=0;
	}
	//propiedades de acceso
	public function setIdPaciente($valor)
	{
		$this->id_doctor=$valor;
	}
	
	public function setNombre($valor)
	{
		$this->nombre=$valor;
	}
	
	public function setApellidos($valor)
	{
		$this->apellidos=$valor;
	}
	
public function setEspecialidad($valor)
	{
		$this->especialidad=$valor;
	}
	public function setCelular($valor)
	{
		$this->celular=$valor;
	}
	public function setIdusuario($valor)
	{
		$this->id_usuario=$valor;
	}
	
	public function guardardoctor()
	{
     $sql="insert into doctor(id_doctor,nombre,apellidos,especialidad,celular,id_usuario) 
	 values('$this->id_doctor','$this->nombre','$this->apellidos','$this->especialidad','$this->celular','$this->id_usuario')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
}