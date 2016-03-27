<?php
//include_once 'aluno.php';
//$aluno = new aluno();
//$ordens = $aluno->recuperarTodos();

?>
<?php  include_once '../cabecalho.php'; ?>

<div class="panel panel-primary table-responsive">
	<div class="panel-heading">PORTAL DO ALUNO</div>
	<a class="btn btn-warning">MÉDIA ATUAL</a>
	<div class="panel-body">
		<div>

			<table class="table table-striped table-hover">
				<tr>
					<td>OBSERVAÇÕES</td>
				</tr>
    				 	<?php //foreach($ordens as $dado) { ?>
            			<tr>
					<td><?php //echo date('d/m/Y',  strtotime($dado['DATA'])); ?></td>
					<td><?php //echo $dado['PLACA']; ?></td>
				</tr>
            	 	<?php //} ?>
    				</table>
		</div>
	</div>
</div>
<?php  include_once '../rodape.php'; ?>