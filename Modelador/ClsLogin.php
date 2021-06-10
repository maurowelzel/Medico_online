<?php
include_once('clsConexion.php');
class login extends Conexion
{
	//atributos
	private $id_usuario;
	private $usuario;
	private $contraseña;
	private $tipo;
    private $codigo;


	//construtor

	public function paciente()
	{   parent::Conexion();
		$this->id_usuario=0;
		$this->usuario="";
		$this->contraseña="";
		$this->tipo="";
		
	}
	//propiedades de acceso
	public function setIdusuario($valor)
	{
		$this->id_usuario=$valor;
	}
	
	public function setUsuario($valor)
	{
		$this->usuario=$valor;
	}
	
	public function setContraseña($valor)
	{
		$this->contraseña=$valor;
	}
	
public function setTipo($valor)
	{
		$this->tipo=$valor;
	}
	
	public function guardarlogin()
	{
     $sql="insert into login(id_usuario,usuario,contraseña,tipo) 
	 values('$this->id_usuario','$this->usuario','$this->contraseña','$this->tipo')";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}

	public function Desactivar()
	{
     $sql="update codigo set activacion = '0' where codigo= ";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
}