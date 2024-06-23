<?php 
    function calcularMedia($m1, $m2, $m3){
        $media = ($m1 + $m2 + $m3) / 3;
        return $media;
    }

    $media = calcularMedia(10, 15, 20);

    echo $media . PHP_EOL; // php_eol quebra linha 