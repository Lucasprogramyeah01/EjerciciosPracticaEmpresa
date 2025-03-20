<?php

/*--------------------------------------------------------------------------------------------------------------------------------
PROVERB
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

// $pieces = ['nail', 'shoe', 'horse', 'rider', 'message', 'battle', 'kingdom']; ARRAY DE PRUEBA.

$pieces = array();

class Proverb {

    public function recite(array $pieces): array {
        $expected = [];

        if(sizeof($pieces) > 1) {
            for ($i = 0; $i <= sizeof($pieces) -2; $i++) {
                array_push($expected, "For want of a ".$pieces[$i]." the ".$pieces[$i+1]." was lost.");
            }

            array_push($expected, "And all for the want of a ".$pieces[0].".");
            
        }elseif(sizeof($pieces) == 1){
            array_push($expected, "And all for the want of a ".$pieces[0].".");
        }

        return $expected;
    }

}

$proverb = new Proverb();

echo "¡Bienvenido al ejercicio PROVERB!\n";

$nombre = "nombre";

while($nombre != "0"){
    echo 'Introduzca las palabras que desee incluir en su probervio (PULSE "0" SI DESEA TERMINAR):';
    
    fscanf(STDIN, "%s", $nombre);

    if($nombre != "0"){
        array_push($pieces, $nombre);
    }
}

var_dump($proverb->recite($pieces));
