<?php //conexao do banco
require dirname(__DIR__) . '/config.php';

$id = $_GET['id'];//pega id da linha do usuario que o botao foi clicado

$sqlDelete ="DELETE FROM usuarios WHERE id=$id"; // vai no banco e deleta
$resultDelete = $db->query($sqlDelete);//verifica se deletou ou nao para fazer verificação
if($resultDelete){
    echo "Excluído".PHP_EOL;
} else {
    echo  "Algo deu Errado! o Usuário não foi excluído do banco";
}


/*zerar tabela quando vazia pro id voltar a ser 1 */
$verificar = $db->querySingle("SELECT COUNT(*) as count from usuarios");
if($verificar==0){
    $sqlZerar = "DELETE FROM `sqlite_sequence`";
    $zerado = $db->query($sqlZerar);
}



header("Location: ../index.php")//retorna a pagina inicial atualizada
?>
