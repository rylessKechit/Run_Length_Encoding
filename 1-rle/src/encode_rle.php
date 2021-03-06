<?php

function encode_rle(String $input_string) {

    global $output_string, $length;

    $i = 0;

    if ($input_string == "") {
        echo "";
        return 0;
    }

    for ($i=0; $i < $length; $i++) {
        if (ctype_alpha($input_string[$i])) {
            
            $count = 1;
            
            while ($i < ($length - 1) && $input_string[$i] == $input_string[$i + 1]) {
                $count++;
                $i++;
            }
        
            $output_string .= (int)$count;
            $output_string .= $input_string[$i];
        
        } else {
            error_rle();
            return 0;
        }
    }

    echo $output_string;

}
