<?php 

function containsWord($word, $subword) {
    $word_length = count($word);
    $subword_length = count($subword);
    if($subword_length > $word_length) return false;
    $pos = strpos($word, $subword);
    
    if($pos == false) {
        echo "the word " . $word . " does not have " . $subword . " in it.";
    } else {
        echo "the word " . $word . " has " . $subword . " in it and is at position " . $pos;
    }    
    
    echo "<br/>" . str_replace("before", "after", "001_before.jpg");
}

containsWord("001_before.jpg", "before");