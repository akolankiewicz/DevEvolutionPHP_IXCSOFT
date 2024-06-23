<?php 
function qtdDias(array $meses, int $valor){
    $qtd = $meses[$valor][1];//1 pega segunda fileira da array e entrega o valor equivalente ao numero de dias
    return $qtd;
}

$meses = [
    '1' => ['janeiro', 31],
    '2' => ['fevereiro', 28],
    '3' => ['março', 31],
    '4' => ['abril', 30],
    '5' => ['maio', 31],
    '6' => ['junho', 30],
    '7' => ['julho', 31],
    '8' => ['agosto', 31],
    '9' => ['setembro', 30],
    '10' => ['outubro', 31],
    '11' => ['novembro', 30],
    '12' => ['dexembro', 31], 
]; // array declarada

$valor = readline("Digite o número do mês: ");//lendo entrada do usuario
$qtdDiasMes = qtdDias($meses, $valor);//chamando função para ver quantos dias
$mes = $meses[$valor][0]; // declarando o nome do mes

echo "O mês é $mes, e tem $qtdDiasMes dias";
?>