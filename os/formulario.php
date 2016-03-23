<?php
include_once 'os.php';

$os = new os();
$func = $os->recuperarTodosFunc();
$client = $os->recuperarTodosCliente();

if (! empty($_GET['id_os'])) {
    $os->carregarPorId($_GET['id_os']);
    }
?>

<?php  include_once '../cabecalho.php'; ?>

<div class="panel panel-primary">
	<div class="panel-heading">ordens</div>
	<div class="panel-body">
		<form action="processamento.php?acao=salvar" method="post"
			name="formulario" class="form-horizontal">
			<input type="hidden" name="ID_ORDEM_DE_SERVICO"
				id="ID_ORDEM_DE_SERVICO" value="<?php echo $os->getIdOs(); ?>" />
			<div>
				<a class="btn btn-warning" title="Alterar Produtos" href="#"> <span
					class="glyphicon glyphicon-trash"></span>
				</a> 
				<a class="btn btn-warning" title="Alterar Serviços" href="#"> <span
					class="glyphicon glyphicon-pencil"></span>
				</a>
			</div>

			<div class="form-group">
				<label for="ID_PESSOAS" class="col-sm-2 control-label">Cliente: </label>
				<div class="col-sm-10">
					<select name="ID_PESSOAS" id="ID_PESSOAS" class="form-control">
						<option value="<?php echo $os->getIdPessoas(); ?>"><?php echo $os->getNome(); ?></option>
						<?php foreach($client as $dados) { ?>
							<option value="<?php echo $dados['ID_PESSOAS'] ?>"><?php echo $dados['NOME'] ?></option>
						<?php } ?>
					</select>
				</div>
				
				<label for="DATA_ENTRADA" class="col-sm-2 control-label">Data: </label>
				<div class="col-sm-10">
					<input type="text"
						class="form-control" name="DATA_ENTRADA" id="DATA_ENTRADA"
						value="<?php  echo date('d/m/Y',  strtotime($os->getDataEntrada())); ?>" />
				</div>
				
				<label for="DESCRICAO" class="col-sm-2 control-label">Descrição: </label>
				<div class="col-sm-10">
					<input type="text"
						class="form-control" name="DESCRICAO" id="DESCRICAO"
						value="<?php echo $os->getDescricao(); ?>" /> 
				</div>
				
				<label for="PLACA" class="col-sm-2 control-label">Placa: </label>
				<div class="col-sm-10">
					<input type="text"
						class="form-control" name="PLACA" id="PLACA"
						value="<?php echo $os->getPlaca(); ?>" /> 
				</div>
				
				<label for="FABRICANTE" class="col-sm-2 control-label">Fabricante: </label>
				<div class="col-sm-10">
					<input type="text"
						class="form-control" name="FABRICANTE" id="FABRICANTE"
						value="<?php echo $os->getFabricante(); ?>" /> 
				</div>
				
				<label for="MODELO" class="col-sm-2 control-label">Modelo: </label>
				<div class="col-sm-10">
				<input type="text"
						class="form-control" name="MODELO" id="MODELO"
						value="<?php echo $os->getModelo(); ?>" />
				</div>
												
				<label for="MATRICULA" class="col-sm-2 control-label">Funcionário: </label>
				<div class="col-sm-10">
					<select name="MATRICULA" id="MATRICULA" class="form-control">
						<option value="<?php echo $os->getMatricula(); ?>"><?php echo $os->getFuncionario(); ?></option>
						<?php foreach($func as $dados) { ?>
							<option value="<?php echo $dados['MATRICULA2'] ?>"><?php echo $dados['NOME2'] ?></option>
						<?php } ?>
					</select>
				</div>
				
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-success">Salvar</button>
					<a href="index.php" class="btn btn-danger">Voltar</a>
				</div>
			</div>

		</form>
	</div>
					
</div>
<?php include_once '../rodape.php'; ?>