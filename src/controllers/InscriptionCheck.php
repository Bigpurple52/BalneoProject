<?php

$filteredPost = [];
$postedValues = filter_input_array(INPUT_POST);
foreach ($postedValues as $key => $value) {
    if (is_array($value)) {
        $filteredPost[$key] = filter_input_array(INPUT_POST, $key);
    } else {
        $filteredPost[$key] = filter_input(INPUT_POST, $key);
    }
}