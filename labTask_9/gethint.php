<?php
require "model.php";
$a = ajUser();
$l = count($a);


$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    for ($i = 0; $i < $l; $i++) {
        foreach ($a[$i] as $name) {
            $substring = substr($name, 0, $len); // Use substr() on individual strings
            if (stristr($q, $substring)) {
                if ($hint === "") {
                    $hint = $name;
                } else {
                    $hint .= ", $name";
                }
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
