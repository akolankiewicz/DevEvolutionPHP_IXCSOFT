<?php
require dirname(__DIR__) . '/config.php';

//pegando as variaveis
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];

$sqlUpdate = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id='$id'";//comando preparatorio para dar update 
$result = $db->query($sqlUpdate);//executando update    

header('Location: ../index.php');//voltando para tela inicial
?>