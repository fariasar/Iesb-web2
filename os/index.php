<?php 
	include_once 'os.php';
	
	$os = new os();
	$ordens = $os->recuperarTodos();

?>
<?php  include_once '../cabecalho.php'; ?>
    
    	<div class="panel panel-primary table-responsive">
	    	<div class="panel-heading">
	    		Ordens de Serviço
	    	</div>
	    	<a href="formulario.php" class="btn btn-warning">Nova OS</a>
	    	<div class="panel-body">	    		
	    		<div>	    	
	    				
    				<table class="table table-striped table-hover  ">
    					<tr>
    						<td>Ações</td>
    						<td>Ordem de Serviço</td>
    						<td>Cliente</td>
    						<td>Funcionário</td>
    						<td>Data</td>
    						<td>Placa</td>
    						<td>Total</td>
    				 	</tr>
    				 	<?php foreach($ordens as $dado) { ?>
            			<tr>
            				<td>
            					<a class="btn btn-danger" title="Excluir" href="processamento.php?acao=excluir&id_os=<?php echo $dado['ID_ORDEM_DE_SERVICO']; ?>">
            						<span class="glyphicon glyphicon-trash"></span>
            					</a>
            					
            					<a class="btn btn-success" title="Alterar" href="formulario.php?id_os=<?php echo $dado['ID_ORDEM_DE_SERVICO']; ?>">
            						<span class="glyphicon glyphicon-pencil"></span>
            					</a>
            				</td>
            				<td><?php echo $dado['ID_ORDEM_DE_SERVICO']; ?></td>
            				<td><?php echo $dado['NOME']; ?></td>
            				<td><?php echo $dado['FUNCIONARIO']; ?></td>
            				<td><?php echo date('d/m/Y',  strtotime($dado['DATA'])); ?></td>
            				<td><?php echo $dado['PLACA']; ?></td>
            				<td><?php echo 'R$ '. number_format($dado['TOTAL'], 2, ',', '.'); ?></td>

            		 	</tr>
            	 	<?php } ?>
    				</table>
    			</div>
	    	</div>
    	</div>
<?php  include_once '../rodape.php'; ?>