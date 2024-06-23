<?php 
$banco = [];

function MostrarMenu(){
    echo "Opções:".PHP_EOL;
    echo "1 -> Cadastrar Usuário".PHP_EOL;
    echo "2 -> Listar Usuários".PHP_EOL;
    echo "3 -> Remover Usuário".PHP_EOL;
    echo "4 -> Procurar usuário específico.".PHP_EOL;
    echo "5 -> Update no nome.".PHP_EOL;
    echo "'sair' -> Encerrar sessão".PHP_EOL;
}

function CadastrarUsuario(array $banco){
    $nome = readline("Insira seu nome: ");
    $email = readline("Insira seu e-mail: ");
    if (filter_var($email, FILTER_VALIDATE_EMAIL)==false) {// validando email
        echo "Por favor, aperte 1 novamente e digite um e-mail válido!".PHP_EOL;
        return $banco;
    } else {
        $dataCadastro = Date('Y-m-d H:i:s'); // pega o momento atual
        if(array_key_exists($email, $banco)){ //validando existencia do email
            echo "Esse email já foi cadastrado." . PHP_EOL;
            return $banco;
        } else {
            $banco[$email] = ['nome' => $nome, 'data' => $dataCadastro, 'email'=>$email, 'dataUpdate' => NULL]; //formato da inserção    
                if(array_key_exists($email, $banco)){
                    echo "Usuario cadastrado com sucesso!" . PHP_EOL;   
            }
    }
  }
  return $banco;
}

function ListarUsuarios(array $banco){
    foreach ($banco as $usuarios){
        echo "Nome: " . $usuarios['nome'] . "   Data de cadastro: " . $usuarios['data'] . "   Email: " . $usuarios['email'].PHP_EOL;
        if($usuarios['dataUpdate']==TRUE){
            echo "Update: ".$usuarios['dataUpdate'].PHP_EOL;}
    }
    if(count($banco) < 1){
        echo "Ainda não há usuários cadastrados" . PHP_EOL;
    }
}

function RemoverUsuario(array $banco){
    echo "Cuidado! A conta será excluída para sempre.".PHP_EOL;
    $email_remove = readline("Digite o email que será removido: ");

    if(array_key_exists($email_remove, $banco)){
        unset($banco[$email_remove]);//formato de remoção do banco
        echo "Removido com sucesso!".PHP_EOL;
    } else {
        echo "Esse email não está presente no banco".PHP_EOL;
    }
    return $banco;
}

function ListarUsuarioUnico(array $banco){
            $emailBuscado = readline('Digite o E-mail do Usuário que deseja encontrar: ');
    if(array_key_exists($emailBuscado, $banco)){
        echo "email: " . $banco[$emailBuscado]['email'] . "   Nome: ". $banco[$emailBuscado]['nome'] . "   Data: " . $banco[$emailBuscado]['data'] . PHP_EOL;    
        } else {
        echo "Algo deu errado, este usuário não está presente no banco.".PHP_EOL;
    }
}

function UpdateNome($banco){
    echo "Digite o E-mail do cadastro que você deseja alterar:".PHP_EOL;
    $emailParaAlteracao = readline("E-mail: ");
    if(array_key_exists($emailParaAlteracao, $banco)){
        echo "E-mail encontrado!".PHP_EOL;
        $novoNome = readline('Digite o novo nome: ');
        $dataUpdate = Date('Y-m-d H:i:s'); // pega o momento do update
        $banco[$emailParaAlteracao]['nome'] = $novoNome;
        $banco[$emailParaAlteracao]['dataUpdate'] = $dataUpdate;
        echo "Update cadastrado no Banco!".PHP_EOL;
        return $banco;    
    } else {
        echo "Algo deu errado, este usuário não está presente no banco.".PHP_EOL;
    }

}

//Programa em execução
while(true){
    MostrarMenu();
    //pedindo ao usuario o que ele deseja
    $opcao= readline("Digite a opção que deseja: ".PHP_EOL);

    switch($opcao){
        case 1:
            $banco = CadastrarUsuario($banco);
            break;
        case 2:
            ListarUsuarios($banco);
            break;
        case 3:
            $banco = RemoverUsuario($banco);
            break;
        case 4:
            ListarUsuarioUnico($banco);
            break;
        case 5:
            $banco = UpdateNome($banco);
            break;
        case "sair":
            echo "Sessão finalizada...".PHP_EOL;
            exit;
    }
}

?>