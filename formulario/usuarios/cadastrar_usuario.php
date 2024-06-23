<?php 
//conexao com banco de dados
require dirname(__DIR__) . '/config.php';

//pegando dados
$email = $_POST['email'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = '$emailPostado'";
$resultVerif = $db->query($sql);
//verificando se ja existe email



//enviando para o banco de dados
$stmt = $db->prepare('INSERT INTO usuarios (email, nome, senha) VALUES (:email, :nome, :senha)');
$stmt->bindValue(':email', $email);
$stmt->bindValue(':nome', $nome);
$stmt->bindValue(':senha', password_hash($senha, PASSWORD_DEFAULT));

$result = $stmt->execute(); //variavel retorna true/false
if($result){
    echo "Cadastro feito com sucesso!";
}else{
    echo  "Algo deu Errado! o Usuário não foi salvo no banco";
}


//no fim do processo, retorna a janela index.php
header('Location: ../index.php');





?>