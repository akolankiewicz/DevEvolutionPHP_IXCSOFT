<?php 
function verificador($n){
    if($n>0){
        return "$n é positivo";
    } else if($n<0){
        return "$n é negativo";
    } else {
        return "$n è igual a 0";
    }
}

$a = verificador(readline("Digite valor: " . PHP_EOL));
echo $a . PHP_EOL; // php_eol quebra linha
?>