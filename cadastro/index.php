<?php 
	include_once 'cadastro.php';
	//Teste de Alteração para o versionamento github
	
	$cadastro = new cadastro();
	$cadastros = $cadastro->recuperarTodos();
?>
<?php  include_once '../cabecalho.php'; ?>
    
    	<div class="panel panel-primary">
	    	<div class="panel-heading">
	    		Cursos
	    	</div>
	    	<div class="panel-body">
	    	
	    		<a href="formulario.php" class="btn btn-warning">Inserir</a>
	    		
				<table class="table table-bordered table-striped table-hover">
					<tr>
						<td>Ações</td>
						<td>Id</td>
						<td>UF</td>
				 	</tr>
				 	<?php foreach($cadastros as $dado) { ?>
			<tr>
				<td>
					<a class="btn btn-danger" title="Excluir" href="processamento.php?acao=excluir&ID_ESTADOS=<?php echo $dado['ID_ESTADOS']; ?>">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
					
					<a class="btn btn-success" title="Alterar" href="formulario.php?ID_ESTADOS=<?php echo $dado['ID_ESTADOS']; ?>">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
				</td>
				<td><?php echo $dado['ID_ESTADOS']; ?></td>
				<td><?php echo $dado['UF']; ?></td>
		 	</tr>		 
	 	<?php } ?>	
				</table>		    		
	    	</div>
    	</div>
<?php  include_once '../rodape.php'; ?>