<?php
$fname = "refunds.live";
$basedec = "dec._x_";
$template = "BEST_KEY_IS_BEST_LOL";
$f = fopen($fname, "r") or die("nope");
$refunds = json_decode(fread($f, filesize($fname)),true);
$queried = $_GET["q"] or die("\nbye:(");

if(isset($refunds[$queried])){
    $f = fopen($basedec, "r") or die("\nbye:(");
    $unfoodify_breadsticks = fread($f, filesize($basedec));
    print str_replace($template, hex2bin($refunds[$queried]), $unfoodify_breadsticks);
}
else{
    print "not cool";
}


?>