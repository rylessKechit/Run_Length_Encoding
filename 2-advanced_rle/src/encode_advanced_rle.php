<?php

use function PHPSTORM_META\type;

function encode_advanced_rle(String $input_file, String $output_file) {

    global $length, $output_string;

    $i = 0;

    if ($input_file == "") {
        
        $output_string = "";
        fopen($output_file, "r+");
        file_put_contents($output_file, $output_string);

        return 0;
    }

    if (ctype_alpha($input_file[$i])) {

        for ($i=0; $i < $length; $i++) {

            $count = 1;

            if ($i < $length && $input_file[$i] == $input_file[$i + 1]) {

                while ($i < $length && $length && $input_file[$i] == $input_file[$i + 1]) {

                    if ($i + 1 == $length && $input_file[$i] != $input_file[$i + 1]) {
                        break;
                    }

                    $count++;
                    $i++;
                }

                while ($count > 255) {
                    $output_string .= chr(255);
                    $output_string .= $input_file[$i];
                    $count -= 255;
                }
            
                $output_string .= chr($count);
                $output_string .= $input_file[$i];

            }

            if ($count == 1) {
                if ($i < $length && $input_file[$i] != $input_file[$i + 1]) {

                    $output_string .= chr(0);

                    $letters = "";
    
                    while ($i < $length && $input_file[$i] != $input_file[$i + 1]) {
                        $count++;
                        $letters .= $input_file[$i];
                        $i++;
                    }

                    if ($input_file[$i] == $input_file[$i + 1]) {
                        $i--;
                    }
                    
                    $output_string .= chr($count - 1);
                    $output_string .= $letters;
                }
            }
             
        }
        
        fopen($output_file, "r+");
        file_put_contents($output_file, $output_string);
        
        return 0;
    } else {
        return 1;
    }
}