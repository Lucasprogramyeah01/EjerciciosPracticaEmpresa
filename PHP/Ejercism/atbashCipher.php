<?php

// Dificultad según Exercism: FÁCIL         Dificultad según mi crierio: MEDIA
/*--------------------------------------------------------------------------------------------------------------------------------
ATBASH CIPHER
--------------------------------------------------------------------------------------------------------------------------------
Create an implementation of the Atbash cipher, an ancient encryption system created in the Middle East.

The Atbash cipher is a simple substitution cipher that relies on transposing all the letters in the alphabet such that the 
resulting alphabet is backwards. The first letter is replaced with the last letter, the second with the second-last, and so on.

An Atbash cipher for the Latin alphabet would be as follows:

- Plain:  abcdefghijklmnopqrstuvwxyz
- Cipher: zyxwvutsrqponmlkjihgfedcba

It is a very weak cipher because it only has one possible key, and it is a simple mono-alphabetic substitution cipher. 
However, this may not have been an issue in the cipher's time.

Ciphertext is written out in groups of fixed length, the traditional group size being 5 letters, leaving numbers unchanged, 
and punctuation is excluded. This is to make it harder to guess things based on word boundaries. All text will be encoded as 
lowercase letters.

Examples:
- Encoding test gives gvhg
- Encoding x123 yes gives c123b vh
- Decoding gvhg gives test
- Decoding gsvjf rxpyi ldmul cqfnk hlevi gsvoz abwlt gives thequickbrownfoxjumpsoverthelazydog
--------------------------------------------------------------------------------------------------------------------------------*/

declare(strict_types=1);

function encode(string $text): string {
    $contador = 0;
    $arrayLetras = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
    $arrayNumeros = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];

    //En esta línea lo que se hace es:
    // Convierte la cadena en array en el que cada caracter es un elemento (Pasa la cadena a lowercase (Borra de $text todos aquellos caracteres distintos a letras y números)).
    $textDivided = str_split(strtolower(preg_replace('([^A-Za-z0-9])', '', $text)));

    foreach($textDivided as $textElement){
        if(!in_array($textElement, $arrayNumeros)){
            $indice = array_search($textElement, $arrayLetras);
            $arrayLetrasInverso = array_reverse($arrayLetras);

            $textDivided[$contador] = $arrayLetrasInverso[$indice];
        }else{
            $textDivided[$contador] = $textElement;
        }
        $contador++;
    }

    $textInGroupesOf5 = str_split(implode($textDivided), 5);

    return implode(" ", $textInGroupesOf5);
}

function decode(string $text): string {
    $contador = 0;
    $arrayLetrasInverso = ["z", "y", "x", "w", "v", "u", "t", "s", "r", "q", "p", "o", "n", "m", "l", "k", "j", "i", "h", "g", "f", "e", "d", "c", "b", "a"];
    $arrayNumeros = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];

    $textDivided = str_split(strtolower(preg_replace('([^A-Za-z0-9])', '', $text)));

    foreach($textDivided as $textElement){
        if(!in_array($textElement, $arrayNumeros)){
            $indice = array_search($textElement, $arrayLetrasInverso);
            $arrayLetras = array_reverse($arrayLetrasInverso);

            $textDivided[$contador] = $arrayLetras[$indice];
        }else{
            $textDivided[$contador] = $textElement;
        }
        $contador++;
    }

    return implode($textDivided);
}

//------------------------------------------------------------------------------------------------------------------------------------------

//$textForEncode = "The quick brown fox jumps over the lazy dog."; MENSAJE DE PREUBA
//$textForDecode = "gsvjf rxpyi ldmul cqfnk hlevi gsvoz abwlt"; MENSAJE DE PRUEBA

$salir = false;

echo "\n¡Bienvenido al ejercicio ATBASH CIPHER!\n\n";

while($salir == false){
    echo "-------------------------------------------\n";
    echo "Escoja la opción que desee:\n";
    echo "-------------------------------------------\n";
    echo "  1 - ENCRIPTAR MENSAJE.\n";
    echo "  2 - DESCODIFICAR MENSAJE.\n";
    echo "  Cualquier otra tecla - SALIR.\n";
    echo "-------------------------------------------\n";

    fscanf(STDIN, "%s", $opcion);

    switch($opcion){
        case 1:
            echo 'Introduzca un mensaje que desee encriptar:';
            $textForEncode = fgets(STDIN);
            var_dump(encode($textForEncode));
            break;
        
        case 2:
            echo 'Introduzca un mensaje que desee descodificar:';
            $textForDecode = fgets(STDIN);
            var_dump(decode($textForDecode));
            break;
        
        default:
            $salir = true;
            echo "\nEspero que lo hayas disfrutado. ;)\n\n";
    }
}
