<?php 
function verificaIntervalo($n){
    if($n>=10 && $n<=20){
        return "$n está no intervalo 10-20";
    } else {
        return "$n não pertence á 10-20";
    }
}

$a = verificaIntervalo(readline("Digite o valor: "));
echo "$a\n";
?>