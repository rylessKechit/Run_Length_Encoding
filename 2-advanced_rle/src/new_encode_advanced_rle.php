<?php

function new_encode_advanced_rle(String $input_file, String $output_file) {

    global $length, $output_string;

    $i = 0;

    if (ctype_alpha($input_file[$i])) {
        for ($i=0; $i < $length; $i++) { 

            /*if ($i < ($length - 1) && $input_file[$i] == $input_file[$i + 1]) {
                $control_digit = true;
            } else {
                $control_digit = false;
            }*/

            $count = 1;
            
            while ($i < ($length - 1) && $input_file[$i] == $input_file[$i + 1]) {
                $count++;
                $i++;
            }
        
            $output_string .= chr($count);
            $output_string .= $input_file[$i];
        
        }
        
        fopen($output_file, "r+");

        /*if ($control_digit) {
            file_put_contents($output_file, chr(0));
        }*/

        file_put_contents($output_file, $output_string);
        return 0;
    } else {
        return 1;
    }
}
