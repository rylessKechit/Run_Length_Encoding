<?php

function decode_advanced_rle(String $input_file, String $output_file) {

    global $length, $output_string;
    
    $i = 0;

    if ($input_file == "") {

        fopen($output_file, "r+");
        file_put_contents($output_file, $output_string);

        return 0;
    }
    
    for ($i=0; $i < $length; $i++) { 
    
        $count = 0;
        $times = 0;
        $letter = "";
    
        if (is_numeric(ord($input_file[$i]))) {
            $times = ord($input_file[$i]);
    
             if ($times == 0) {
    
                $i++;
    
                $times += ord($input_file[$i]);

                if (ctype_alpha(ord($input_file[$i + 1])) == false) {
                    return 1;
                }
    
                while (ctype_alpha($input_file[$i + 1])) {
                    $i++;
                    $letter = ord($input_file[$i]);
    
                    $output_string .= chr($letter);
                }
    
             } else {

                if (ctype_alpha(ord($input_file[$i + 1])) == false) {
                    return 1;
                }
    
                $i++;
                $letter = ord($input_file[$i]);
    
                while ($count < $times) {
                    $output_string .= chr($letter);
                    $count++;
                }
             }
    
        } else {
            return 1;
        }
    }

    fopen($output_file, "r+");
    file_put_contents($output_file, $output_string);
    
    return 0;
}    