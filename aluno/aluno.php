<?php

include_once '../conexao.php';

class aluno{
	
	protected $ID_ORDEM_DE_SERVICO;
    protected $ID_PESSOAS;
    protected $NOME;
    protected $NOME2;
    protected $FUNCIONARIO;
	protected $MATRICULA;
	protected $MATRICULA2;
	protected $ID_ITENS_SERVICO;
	protected $ID_ITENS_PRODUTOS;
	protected $DATA_ENTRADA;
	protected $DESCRICAO;
	protected $PLACA;
	protected $FABRICANTE;
	protected $MODELO;
	protected $TOTAL;
	
	public function getIdOs()
	{
		return $this->ID_ORDEM_DE_SERVICO; 
	}
	  
	public function setIdOs($ID_ORDEM_DE_SERVICO)
	{
		$this->ID_ORDEM_DE_SERVICO = $ID_ORDEM_DE_SERVICO; 
	}  
	
	public function getIdPessoas()
	{
		return $this->ID_PESSOAS;
	}
	 
	public function setIdPessoas($ID_PESSOAS)
	{
		$this->ID_PESSOAS = $ID_PESSOAS;
	}
	
	public function getFuncionario()
	{
	    return $this->FUNCIONARIO;
	}
	
	public function setFuncionario($FUNCIONARIO)
	{
	    $this->FUNCIONARIO = $FUNCIONARIO;
	}
	
	public function getNome()
	{
	    return $this->NOME;
	}
	
	public function setNome($NOME)
	{
	    $this->NOME = $NOME;
	}
	
	public function getNome2()
	{
	    return $this->NOME2;
	}
	
	public function setNome2($NOME2)
	{
	    $this->NOME2 = $NOME2;
	}

	public function getMatricula()
	{
		return $this->MATRICULA;
	}
	 
	public function setMatricula($MATRICULA)
	{
		$this->MATRICULA = $MATRICULA;
	}
	
	public function getMatricula2()
	{
	    return $this->MATRICULA2;
	}
	
	public function setMatricula2($MATRICULA2)
	{
	    $this->MATRICULA2 = $MATRICULA2;
	}

	public function getIdItensServico()
	{
		return $this->ID_ITENS_SERVICO;
	}
	 
	public function setIdItensServico($ID_ITENS_SERVICO)
	{
		$this->ID_ITENS_SERVICO = $ID_ITENS_SERVICO;
	}	

		public function getIdItensProdutos()
	{
		return $this->ID_ITENS_PRODUTOS;
	}
	 
	public function setIdItensProdutos($ID_ITENS_PRODUTOS)
	{
		$this->ID_ITENS_PRODUTOS = $ID_ITENS_PRODUTOS;
	}	

		public function getDataEntrada()
	{
		return $this->DATA_ENTRADA;
	}
	 
	public function setDataEntrada($DATA_ENTRADA)
	{
		$this->DATA_ENTRADA = $DATA_ENTRADA;
	}	

		public function getDescricao()
	{
		return $this->DESCRICAO;
	}
	 
	public function setDescricao($DESCRICAO)
	{
		$this->DESCRICAO = $DESCRICAO;
	}	

		public function getPlaca()
	{
		return $this->PLACA;
	}
	 
	public function setPlaca($PLACA)
	{
		$this->PLACA = $PLACA;
	}	

		public function getFabricante()
	{
		return $this->FABRICANTE;
	}
	 
	public function setFabricante($FABRICANTE)
	{
		$this->FABRICANTE = $FABRICANTE;
	}	

		public function getModelo()
	{
		return $this->MODELO;
	}
	 
	public function setModelo($MODELO)
	{
		$this->MODELO = $MODELO;
	}	

	
	public function inserir($dados)
	{
	    $ID_PESSOAS = $dados['ID_PESSOAS'];
       $MATRICULA = $dados['MATRICULA'];
       $ID_ITENS_SERVICO = $dados['ID_ITENS_SERVICO'];
       $ID_ITENS_PRODUTOS = $dados['ID_ITENS_PRODUTOS'];
       $DATA_ENTRADA = $dados['DATA_ENTRADA'];
       $DESCRICAO = $dados['DESCRICAO'];
       $PLACA = $dados['PLACA'];
       $FABRICANTE = $dados['FABRICANTE'];
       $MODELO = $dados['MODELO'];
		
		$sql = "INSERT INTO ORDEM_DE_SERVICO 
		(
      ID_PESSOAS,
      MATRICULA,
      ID_ITENS_SERVICO,
      ID_ITENS_PRODUTOS,
      DATA_ENTRADA,
      DESCRICAO,
      PLACA,
      FABRICANTE,
      MODELO
      ) VALUES
      (
      '$ID_PESSOAS',
      '$MATRICULA',
      '$ID_ITENS_SERVICO',
      '$ID_ITENS_PRODUTOS',
      '$DATA_ENTRADA',
      '$DESCRICAO',
      '$PLACA',
      '$FABRICANTE',
      '$MODELO',
      )";
		
		$conexao = new Conexao();
		return $conexao->executar($sql);
	}
	
	public function alterar($dados)
	{
		$ID_ORDEM_DE_SERVICO = $dados['ID_ORDEM_DE_SERVICO'];
	   $ID_PESSOAS = $dados['ID_PESSOAS'];
      $MATRICULA = $dados['MATRICULA'];
      $DATA = $dados['DATA_ENTRADA'];
      $DESCRICAO = $dados['DESCRICAO'];
      $PLACA = $dados['PLACA'];
      $FABRICANTE = $dados['FABRICANTE'];
      $MODELO = $dados['MODELO'];
      $DATA_ENTRADA = implode("-", array_reverse(explode("/", $DATA)));
		
		$sql =  "UPDATE ORDEM_DE_SERVICO
                SET
                ID_PESSOAS = '$ID_PESSOAS'
                	,MATRICULA = '$MATRICULA'
                	,DATA_ENTRADA = '$DATA_ENTRADA'
                	,DESCRICAO = '$DESCRICAO'
                	,PLACA = '$PLACA'
                	,FABRICANTE = '$FABRICANTE'
                	,MODELO = '$MODELO'
                WHERE ID_ORDEM_DE_SERVICO = '$ID_ORDEM_DE_SERVICO'";
		
		$conexao = new Conexao();
		//echo $sql; die;
		return $conexao->executar($sql);
	}
	
	public function excluir($ID_ORDEM_DE_SERVICO)
	{
		$sql = "DELETE FROM ORDEM_DE_SERVICO WHERE ID_ORDEM_DE_SERVICO = $ID_ORDEM_DE_SERVICO";
		
		$conexao = new Conexao();
		return $conexao->executar($sql);
	}
	
	public function recuperarTodos()
	{
		$conexao = new Conexao();
		
		$sql =    "SELECT OS.ID_ORDEM_DE_SERVICO AS ID_ORDEM_DE_SERVICO
                	,MATRICULA AS FUNCIONARIO
                	,COALESCE(FIS.NOME, JUR.NOME_FANTASIA) AS NOME
                	,DATA_ENTRADA AS DATA
                	,PLACA
                	,(
                		(
                			SELECT IFNULL(SUM(ITS.QUANTIDADE * SE.PRECO), 0)
                			FROM ITENS_SERVICO ITS
                			LEFT JOIN SERVICOS SE ON SE.ID_SERVICOS = ITS.ID_SERVICOS
                			WHERE ITS.ID_ORDEM_DE_SERVICO = OS.ID_ORDEM_DE_SERVICO
                			) + (
                			SELECT IFNULL(SUM(IP.QUANTIDADE * PR.PRECO), 0)
                			FROM ITENS_PRODUTOS IP
                			LEFT JOIN PRODUTOS PR ON PR.ID_PRODUTOS = IP.ID_PRODUTOS
                			WHERE IP.ID_ORDEM_DE_SERVICO = OS.ID_ORDEM_DE_SERVICO
                			)
                		) AS TOTAL
                FROM ORDEM_DE_SERVICO OS
                INNER JOIN PESSOAS PE ON PE.ID_PESSOAS = OS.ID_PESSOAS
                LEFT JOIN FISICA FIS ON FIS.ID_PESSOAS = PE.ID_PESSOAS
                LEFT JOIN JURIDICA JUR ON JUR.ID_PESSOAS = PE.ID_PESSOAS
                GROUP BY 1";
		return $conexao->recuperarTodos($sql);
	}

	public function carregarPorId($ID_ORDEM_DE_SERVICO)
	{
		$conexao = new Conexao();
	
		$sql = "SELECT ID_ORDEM_DE_SERVICO
            	,COALESCE(FIS.NOME, JUR.NOME_FANTASIA) AS NOME
            	,(
            		SELECT NOME
            		FROM FISICA FIS
            		JOIN FUNCIONARIOS FUN ON FIS.CPF = FUN.CPF
            		LEFT JOIN ORDEM_DE_SERVICO OS ON OS.MATRICULA = FUN.MATRICULA
            		WHERE OS.ID_ORDEM_DE_SERVICO = $ID_ORDEM_DE_SERVICO
            		) AS FUNCIONARIO
            	,DATA_ENTRADA
            	,DESCRICAO
            	,PLACA
            	,FABRICANTE
            	,MODELO
            	,MATRICULA
            	,OS.ID_PESSOAS
            FROM ORDEM_DE_SERVICO OS
            INNER JOIN PESSOAS PE ON PE.id_pessoas = OS.ID_PESSOAS
            LEFT JOIN FISICA FIS ON FIS.id_pessoas = PE.ID_PESSOAS
            LEFT JOIN JURIDICA JUR ON JUR.id_pessoas = PE.ID_PESSOAS
            WHERE OS.ID_ORDEM_DE_SERVICO = $ID_ORDEM_DE_SERVICO";
		$dados = $conexao->recuperarTodos($sql);
		
		$this->ID_ORDEM_DE_SERVICO = $dados[0]['ID_ORDEM_DE_SERVICO'];
		$this->NOME = $dados[0]['NOME'];
		$this->FUNCIONARIO = $dados[0]['FUNCIONARIO'];
		$this->DATA_ENTRADA = $dados[0]['DATA_ENTRADA'];
		$this->DESCRICAO = $dados[0]['DESCRICAO'];
		$this->PLACA = $dados[0]['PLACA'];
		$this->FABRICANTE = $dados[0]['FABRICANTE'];
		$this->MODELO = $dados[0]['MODELO'];
		$this->MATRICULA = $dados[0]['MATRICULA'];
		$this->ID_PESSOAS = $dados[0]['ID_PESSOAS'];
	}
	
	public function recuperarTodosFunc()
	{
	    $conexao = new Conexao();
	
	    $sql = "SELECT FIS.NOME AS NOME2
            	,FUN.MATRICULA AS MATRICULA2
            FROM FISICA FIS
            JOIN FUNCIONARIOS FUN ON FIS.CPF = FUN.CPF";
	    //echo $sql; die; --Para verificar qual SQL está sendo executado no banco.
	    return $conexao->recuperarTodos($sql);
	}
	
	public function recuperarTodosCliente()
	{
	    $conexao = new Conexao();
	
	    $sql = "SELECT ID_PESSOAS
                	,NOME
                FROM FISICA;";
	    return $conexao->recuperarTodos($sql);
	}
	
}

