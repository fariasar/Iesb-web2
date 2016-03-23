<?php 

include_once 'os.php';

$os = new os();

switch($_GET['acao']){
	case 'salvar':
		
		if(empty($_POST['ID_ORDEM_DE_SERVICO'])){
			$resultado = $os->inserir($_POST);
		} else {
			$resultado = $os->alterar($_POST);
		}
		
		break;
	case 'excluir':
		$resultado = $os->excluir($_GET['id_os']);
		break;
}

if($resultado){
	$mensagem = 'Sucesso';
} else {
	$mensagem = 'Ocorreu um erro!';
}

?>

<script>
	alert('<?php echo $mensagem; ?>');
	window.location.href = 'index.php';
</script>
