<?php
// include_once 'professor.php';

// $cadastro = new cadastro();
// $cadastros = $cadastro->recuperarTodos();
?>
<?php  include_once '../cabecalho.php'; ?>

<div class="panel panel-primary">
	<div class="panel-heading">PORTAL DO PROFESSOR</div>
	<div class="panel-body">
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<td>CURSO</td>
				<td>TURNO</td>
			</tr>
				 	<?php //foreach($cadastros as $dado) { ?>
			<tr>
				<td><a class="btn btn-danger" title="OBSERVAÇÕES"
					href="processamento.php?acao=excluir&ID_ESTADOS=<?php //echo $dado['ID_ESTADOS']; ?>">
						<span class="glyphicon glyphicon-trash"></span>
				</a> <a class="btn btn-success" title="LANÇAR NOTAS"
					href="formulario.php?ID_ESTADOS=<?php //echo $dado['ID_ESTADOS']; ?>">
						<span class="glyphicon glyphicon-pencil"></span>
				</a></td>
				<td><?php //echo $dado['ID_ESTADOS']; ?></td>
				<td><?php //echo $dado['UF']; ?></td>
			</tr>		 
	 	<?php //} ?>	
				</table>
	</div>
</div>
<?php  include_once '../rodape.php'; ?>