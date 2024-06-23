<?php 
include_once('config.php');

session_start();
if(!$_SESSION['auth']){
    header('Location: login.php?msg=Faça Login!!!');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body{
            text-align: center;
        }
        th, td, table{
            border: 1px solid black;
            margin: auto;
            padding: 10px;
            background-color: #E6E6FA;
        }
    </style>
</head>
<body>
    <header style="margin-top: 20px;">
    <?php 
    $nomeSessão = strtoupper($_SESSION['nome']);
    echo 'Seja bem vindo, '. $nomeSessão ."!".PHP_EOL;
    ?>
    <a href="login/logout.php" class="btn btn-danger">Sair</a>
    </header>

    <h1 style="margin-top: 50px">Formulário de cadastro</h1>

    <form action="usuarios/cadastrar_usuario.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required> <br>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" required> <br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required> <br><br>

        <button class="btn btn-success" type="submit">Enviar</button>
    </form><br><br>

    <!-- Listar usuarios -->
     <h1>Usuários Cadastrados</h1>

    <!-- printando primeira linha da tabela -->
     <table>
        <tr>
        <th>ID</th>
        <th>E-mail</th>
        <th>Nome</th>
        <th>Ações</th>
        </tr>
     
     <?php // pegando usuarios do banco
    $usuarios = $db->query("SELECT * FROM usuarios");

    //enquanto tiver o que printar ele printa
    while($UsuarioLinha = $usuarios->fetchArray(SQLITE3_ASSOC)){ 
        echo "<tr>";

        echo "<th>" . $UsuarioLinha['id'] . "</th>";
        echo "<th>" . $UsuarioLinha['email'] . "</th>";
        echo "<th>" . $UsuarioLinha['nome'] . "</th>";
        
        echo "<td>
        <a class='btn btn-sm btn-danger' href='usuarios/delete.php?id=$UsuarioLinha[id]'>
        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'> <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/></svg>
        </a>";
        echo "<a class='btn btn-sm btn-primary' href='usuarios/editar.php?id=$UsuarioLinha[id]'>
        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/></svg>
        </a>
        </td>";

        echo "</tr>";
    }
    ?>

</table>

</body>
</html>