<?php

// Dificultad según Exercism: MEDIA         Dificultad según mi crierio: MEDIA
/*--------------------------------------------------------------------------------------------------------------------------------
ISOGRAM
----------------------------------------------------------------------------------------------------------------------------------
Determine if a word or phrase is an isogram.

An isogram (also known as a "non-pattern word") is a word or phrase without a repeating letter, however spaces and hyphens 
are allowed to appear multiple times.

Examples of isograms:
- lumberjacks
- background
- downstream
- six-year-old

The word isograms, however, is not an isogram, because the s repeats.
--------------------------------------------------------------------------------------------------------------------------------*/

declare(strict_types=1);

function isIsogram(string $palabra): bool {

    $palabraEnArray = str_split(strtolower(preg_replace('([^A-Za-z])', '', $palabra)));

    $palabraEnArraySinLetrasRepetidas = array_unique($palabraEnArray);

    if(count($palabraEnArray) == count($palabraEnArraySinLetrasRepetidas)){
        return true;
    }else{
        return false;
    }
}

//--------------------------------------------------------------------------------------------------------------------------------

//$palabra = "lumberjack"; PALABRA DE PRUEBA

echo "\n¡Bienvenido al ejercicio ISOGRAM!\n\n";

echo 'Introduzca la palabra que desee:';
fscanf(STDIN, "%s", $palabra);

if(isIsogram($palabra)){
    echo "$palabra ES un isograma.";
}else{
    echo "$palabra NO es un isograma.";
}
