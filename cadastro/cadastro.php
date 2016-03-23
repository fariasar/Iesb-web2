<?php

include_once '../conexao.php';

class cadastro{
	
	protected $ID_ESTADOS;
	protected $UF;
	
	public function getIdESTADOS()
	{
		return $this->ID_ESTADOS; 
	}
	  
	public function setIdESTADOS($ID_ESTADOS)
	{
		$this->ID_ESTADOS = $ID_ESTADOS; 
	}  
	
	public function getUF()
	{
		return $this->UF;
	}
	 
	public function setUF($UF)
	{
		$this->UF = $UF;
	}	
	
	public function inserir($dados)
	{
		$UF = $dados['UF'];
		
		$sql = "insert into ESTADOS (UF) 
						   values ('$UF')";
		
		$conexao = new Conexao();
		return $conexao->executar($sql);
	}
	
	public function alterar($dados)
	{
		$UF = $dados['UF'];
		$ID_ESTADOS = $dados['ID_ESTADOS'];
		
		$sql = "update ESTADOS set
					UF = '$UF'
				where ID_ESTADOS = $ID_ESTADOS ";
		
		$conexao = new Conexao();
		return $conexao->executar($sql);
	}
	
	public function excluir($ID_ESTADOS)
	{
		$sql = "delete from ESTADOS where ID_ESTADOS = $ID_ESTADOS";
		
		$conexao = new Conexao();
		return $conexao->executar($sql);
	}
	
	public function recuperarTodos()
	{
		$conexao = new Conexao();
		
		$sql = "select * from ESTADOS";
		return $conexao->recuperarTodos($sql);
	}


	public function carregarPorId($ID_ESTADOS)
	{
		$conexao = new Conexao();
	
		$sql = "select * from ESTADOS where ID_ESTADOS = $ID_ESTADOS";
		$dados = $conexao->recuperarTodos($sql);
		
		$this->ID_ESTADOS = $dados[0]['ID_ESTADOS'];
		$this->UF = $dados[0]['UF'];
	}	
}