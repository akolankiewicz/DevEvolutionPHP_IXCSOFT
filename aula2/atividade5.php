<?php 

function listarCidades(array $cidades){
    foreach($cidades as $cidade){
        echo $cidade . PHP_EOL;
    }
}

$cidades = [];
    while(True){
        $cidades[] = readline("Escreva o nome de uma cidade: "); // [] no fim da variável insere dentro do array
        //array_push($cidades, $cidade) //array_unshift adiciona o elemento no começo
        listarCidades($cidades); // imprimi todos os elementos do array 

        
    }


?>