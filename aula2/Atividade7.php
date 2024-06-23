 <?php 
$estudantes = [
    1=>['nome' => 'arthur', 'idade' => 25, 'nota' => 7.1 ],
    2=>['nome' => 'enzo', 'idade' => 25, 'nota' => 4 ],
    3=>['nome' => 'joao', 'idade' => 25, 'nota' => 6 ],
    4=>['nome' => 'marcos', 'idade' => 25, 'nota' => 10 ],
    5=>['nome' => 'andre', 'idade' => 25, 'nota' => 6 ],
];

$novosEstudantes = [];//onde entra os maiores que 7 na nota

foreach($estudantes as $aluno){ // percorrendo array e descobrindo as notas maiores que 7 
    if ($aluno['nota'] > 7){
        $novosEstudantes[] = $aluno;
    }
}
    
echo "Os alunos que obtiveram nota maior que 7 foram:" . PHP_EOL;
foreach($novosEstudantes as $aprovados){ //mostrando resultado
    $aprovados['nome'] = strtoupper($aprovados['nome']); //deixando nome todo maíusculo
    echo $aprovados['nome'] . ", nota: " . $aprovados['nota'] .PHP_EOL;
}

?> 