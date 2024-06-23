<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body{
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="login/autenticar.php" method="POST">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">
        <h1>LOGIN</h1><br>
        <label for="email">Email: </label>
        <input type="email" name="email" required><br><br>

        <label for="senha">Senha: </label>
        <input type="password" name="senha" required><br><br>


        <button class="btn btn-primary" type="submit">LOGAR</button>
        <br><br><br>
        <?php
        if(isset($_GET['msg'])){
            echo "<h2>".$_GET['msg']."</h2>";
        }
        ?>
        
        </div>
    </form>
    
</body>
</html>