<?php

/*--------------------------------------------------------------------------------------------------------------------------------
ATBASH CIPHER
--------------------------------------------------------------------------------------------------------------------------------
For want of a horseshoe nail, a kingdom was lost, or so the saying goes.

Given a list of inputs, generate the relevant proverb. For example, given the list 
["nail", "shoe", "horse", "rider", "message", "battle", "kingdom"], you will output the full text of this proverbial rhyme:

For want of a nail the shoe was lost.
For want of a shoe the horse was lost.
For want of a horse the rider was lost.
For want of a rider the message was lost.
For want of a message the battle was lost.
For want of a battle the kingdom was lost.
And all for the want of a nail.

Note that the list of inputs may vary; your solution should be able to handle lists of arbitrary length and content. 
No line of the output text should be a static, unchanging string; all should vary according to the input given.
--------------------------------------------------------------------------------------------------------------------------------*/

declare(strict_types=1);

$arrayLetras = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];

function encode(string $text): string {
    $arrayLetras = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];

    $textDivided = explode(str_replace(' ', '', strtolower($text)));

    foreach($textDivided as $textLetter){
        $indice = array_search($textLetter, $arrayLetras);
        $arrayInverse = array_reverse($arrayLetras);

        $textLetter = $arrayInverse[$indice]; 
    }

    return var_dump($textDivided);

}

function decode(string $text): string {


}

$text = "The quick brown fox jumps over the lazy dog.";

encode($text);

