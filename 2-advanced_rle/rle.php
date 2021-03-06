<?php

include 'src/encode_advanced_rle.php';
include 'src/new_encode_advanced_rle.php';
include 'src/decode_advanced_rle.php';
include 'src/clean&error.php';

$input_file = file_get_contents($argv[2], true);
$key_word = $argv[1];
$output_string = "";
$output_file = $argv[3];

$length = strlen($input_file);

switch ($key_word) {
    case "encode":
        $result = encode_advanced_rle($input_file, $output_file);
        if ($result == 0) {
            echo "OK";
        } else {
            echo "KO";
        }
        break;

    case "decode":
        $result = decode_advanced_rle($input_file, $output_file);
        if ($result == 0) {
            echo "OK";
        } else {
            echo "KO";
        }
        break;
    
    default:
        fopen($output_file, "r+");
        file_put_contents($output_file, "");
        break;
}