<?php

class Conexao {
	
	private $host 	    = '192.168.56.90';
	private $user 	    = 'usr_reguladora';
	private $password  = 'usr_reguladora';
	private $banco     = 'bd_reguladora';
	
	protected $conexao;
	protected $resultado;
	
	public function conectar()
	{
		$this->conexao = mysqli_connect($this->host, $this->user, $this->password);
		
		mysqli_select_db($this->conexao, $this->banco)
		or die('Erro ao selecionar banco de dados.');		
	}
	
	public function desconectar()
	{
		mysqli_close($this->conexao);
	}
	
	public function executar($sql)
	{
		$this->conectar();
		$this->resultado = mysqli_query($this->conexao, $sql);
		$this->desconectar();
		
		return $this->resultado;
	}	
	
	public function recuperarTodos($sql)
	{
		$this->conectar();
		
		$this->resultado = mysqli_query($this->conexao, $sql);
		
		$registros = array();
		while($dados = mysqli_fetch_assoc($this->resultado)){
			$registros[] = $dados;
		}
		
		$this->desconectar();
		return $registros;
	}
	
}