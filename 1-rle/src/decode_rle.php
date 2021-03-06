<?php

function decode_rle(String $input_string) {

global $output_string, $length;

$i = 0;

for ($i=0; $i < $length; $i+=2) { 

    $count = 0;
    $times = 0;
    $letter = "";

    if (ctype_digit($input_string[$i])) {
        $times = (int)$input_string[$i];

        while (ctype_digit($input_string[$i + 1])) {
            $times .= (int)$input_string[$i + 1];
            $i++;
        }

        $letter = $input_string[$i + 1];

        if (ctype_alpha($letter) == false) {
            error_rle();
            return 0;
        }

        while ($count < $times) {
            $output_string .= $letter;
            $count++;
        }

    } else {
        error_rle();
        return 0;
    }
}

echo "$output_string\n";

}
