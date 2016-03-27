<?php 

include_once 'aluno.php';

$aluno = new aluno();

switch($_GET['acao']){
	case 'salvar':
		
		if(empty($_POST['ID_ORDEM_DE_SERVICO'])){
			$resultado = $aluno->inserir($_POST);
		} else {
			$resultado = $aluno->alterar($_POST);
		}
		
		break;
	case 'excluir':
		$resultado = $aluno->excluir($_GET['id_os']);
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
