<?php
$baseenc = "enc._x_";
$template = "BEST_KEY_IS_BEST_LOL";
$newrecipe = $_GET["s"] or die("\nbye:(");
$f = fopen($baseenc, "r") or die("\nbye:(");
$unfoodify_breadsticks = fread($f, filesize($baseenc));
print str_replace($template, hex2bin($newrecipe), $unfoodify_breadsticks);
?>