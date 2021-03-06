<?php

include 'src/encode_rle.php';
include 'src/decode_rle.php';
include 'src/error_rle.php';

$input_string = $argv[2];
$key_word = $argv[1];
$output_string = "";

$length = strlen($input_string);

if ($input_string != "") {
    switch ($key_word) {
        case "encode":
            encode_rle($input_string);
            break;
    
        case "decode":
            decode_rle($input_string);
            break;
        
        default:
            error_rle();
            break;
    }
} else {
    echo "";
}
